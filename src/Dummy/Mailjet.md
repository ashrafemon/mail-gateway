### Send Message

```bash
// Success
{
    "Messages": [
        {
            "Status": "success",
            "CustomID": "1234566666666666",
            "To": [
                {
                    "Email": "passenger@mailjet.com",
                    "MessageUUID": "3d3beefe-7eb8-42d8-b85e-52819764dd11",
                    "MessageID": 576460772022727316,
                    "MessageHref": "https://api.mailjet.com/v3/REST/message/576460772022727316"
                },
                {
                    "Email": "rupomehsan34@gmail.com",
                    "MessageUUID": "5873a6c5-a525-406c-91c6-c8bfa66f9af4",
                    "MessageID": 576460772022727317,
                    "MessageHref": "https://api.mailjet.com/v3/REST/message/576460772022727317"
                }
            ],
            "Cc": [],
            "Bcc": []
        }
    ]
}

// Error
{
    "ErrorIdentifier": "ee25f1a5-ac17-457f-8deb-e8bce14a2cc7",
    "StatusCode": 401,
    "ErrorMessage": "API key authentication/authorization failure. You may be unauthorized to access the API or your API key may be expired. Visit API keys management section to check your keys."
}
```

### Retrieve Message By ID

```bash
// Success


// Error
{
    "ErrorInfo": "",
    "ErrorMessage": "Object not found",
    "StatusCode": 404
}
```
