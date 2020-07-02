package main

import (
	"bytes"
	"encoding/json"
	"fmt"
	"io/ioutil"
	"log"
	"net/http"
	"os"

	"github.com/aws/aws-lambda-go/events"
	"github.com/aws/aws-lambda-go/lambda"
)

func handler(request events.APIGatewayProxyRequest) (*events.APIGatewayProxyResponse, error) {
	log.Printf("EVENT: %s", request.Body)
	var reqBody interface{}
	json.Unmarshal([]byte(request.Body), &reqBody)

	msg := map[string]interface{}{
		"blocks": []map[string]interface{}{
			{
				"type": "divider",
			},
			{
				"type": "section",
				"text": map[string]string{
					"type": "mrkdwn",
					"text": ":tada:*Nuova build del sito Basket Gardolo*",
				},
			},
			{
				"type": "context",
				"elements": []map[string]string{
					{
						"type": "mrkdwn",
						"text": fmt.Sprintf(":gear: %s", reqBody.(map[string]interface{})["branch"]),
					}, {
						"type": "mrkdwn",
						"text": fmt.Sprintf("🦸 %s", reqBody.(map[string]interface{})["committer"]),
					},
				},
			}, {
				"type": "section",
				"text": map[string]string{
					"type": "mrkdwn",
					"text": fmt.Sprintf(":pencil2: _%s_\n\n\n:basketball: <%s|Vai al sito>", reqBody.(map[string]interface{})["title"], reqBody.(map[string]interface{})["ssl_url"]),
				},
				"accessory": map[string]string{
					"type":      "image",
					"image_url": "https://www.basketgardolo.it/wp-content/uploads/2014/09/logo_basket_gardolo.png",
					"alt_text":  "logo BC Gardolo",
				},
			}, {
				"type": "divider",
			},
		},
	}
	requestBody, err := json.Marshal(msg)
	if err != nil {
		log.Fatalln(err)
	}
	log.Printf("Environment: %s", os.Getenv("SLACK_ENDPOINT"))
	resp, err := http.Post(os.Getenv("SLACK_ENDPOINT"), "application/json", bytes.NewBuffer(requestBody))

	if err != nil {
		log.Fatalln(err)
	}

	defer resp.Body.Close()
	body, err := ioutil.ReadAll(resp.Body)

	if err != nil {
		log.Fatalln(err)
	}

	log.Println((string(body)))

	return &events.APIGatewayProxyResponse{
		StatusCode: resp.StatusCode,
		Body:       string(body),
	}, nil
}

func main() {
	lambda.Start(handler)
}
