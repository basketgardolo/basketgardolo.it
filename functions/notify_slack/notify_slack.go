package main

import (
	"bytes"
	"encoding/json"
	"io/ioutil"
	"log"
	"net/http"
	"os"

	"github.com/aws/aws-lambda-go/events"
	"github.com/aws/aws-lambda-go/lambda"
)

func handler(request events.APIGatewayProxyRequest) (*events.APIGatewayProxyResponse, error) {
	log.Printf("EVENT: %s", request.Body)
	requestBody, err := json.Marshal(map[string]string{
		"text": "Tutto ok",
	})
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
