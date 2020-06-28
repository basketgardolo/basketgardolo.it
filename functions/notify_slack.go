package main

import (
	"context"
	"encoding/json"
	"log"

	"github.com/aws/aws-lambda-go/events"
	"github.com/aws/aws-lambda-go/lambda"
)

type Notification struct {
	Name string `json:"text"`
}

func HandleRequest(ctx context.Context, event events.SQSEvent) (string, error) {
	eventJSON, _ := json.MarshalIndent(event, "", "  ")
	log.Printf("EVENT: %s", eventJSON)
	return "ok", nil
}

func main() {
	lambda.Start(HandleRequest)
}
