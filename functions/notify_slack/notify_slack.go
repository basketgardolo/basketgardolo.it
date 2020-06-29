package main

import (
	"bytes"
	"context"
	"encoding/json"
	"io/ioutil"
	"log"
	"net/http"

	"github.com/aws/aws-lambda-go/events"
	"github.com/aws/aws-lambda-go/lambda"
	"github.com/aws/aws-lambda-go/lambdacontext"
)

func handler(ctx context.Context, request events.APIGatewayProxyRequest) (*events.APIGatewayProxyResponse, error) {
	log.Printf("EVENT: %s", request.Body)
	lc, ok := lambdacontext.FromContext(ctx)
	if ok {
		cc := lc.ClientContext
		requestBody, err := json.Marshal(map[string]string{
			"text": "Tutto ok",
		})
		if err != nil {
			log.Fatalln(err)
		}

		resp, err := http.Post(cc.Env["SLACK_ENDPOINT"], "application/json", bytes.NewBuffer(requestBody))

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
	return &events.APIGatewayProxyResponse{
		StatusCode: 500,
		Body:       "Hello world",
	}, nil
}

func main() {
	lambda.Start(handler)
}
