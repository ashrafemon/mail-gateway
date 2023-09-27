### Send Message

```bash
// Success
{
    "messageId": "<202309271659.54918152014@smtp-relay.mailin.fr>"
}

// Error
{
  "code": "missing_parameter",
  "message": "Only one of Sender ID or Sender Email can be passed for the same request"
}
```

### Retrieve Message By ID

```bash
// Success
{
  "count": 2,
  "transactionalEmails": [
    {
      "email": "kideco3872@apxby.com",
      "subject": "Login Email confirmation",
      "messageId": "<202309271659.54918152014@smtp-relay.mailin.fr>",
      "uuid": "b592ae82-a3bb-41b4-b3d0-3cf8ed38e6b1",
      "date": "2023-09-27T22:59:48.711+06:00",
      "from": "ashraf.emon143@gmail.com",
      "tags": []
    },
    {
      "email": "ashraf.emon143@gmail.com",
      "subject": "Login Email confirmation",
      "messageId": "<202309271659.54918152014@smtp-relay.mailin.fr>",
      "uuid": "23e007ae-743c-4649-8991-de7b8331ec01",
      "date": "2023-09-27T22:59:48.711+06:00",
      "from": "ashraf.emon143@gmail.com",
      "tags": []
    }
  ]
}

// Error
{} //Empty Object
```

### Retrieve Message By UUID

```bash
// Success
{
  "email": "kideco3872@apxby.com",
  "subject": "Login Email confirmation",
  "date": "2023-09-27T18:59:48.711+02:00",
  "events": [
    {
      "name": "sent",
      "time": "2023-09-27T18:59:48.711+02:00"
    },
    {
      "name": "delivered",
      "time": "2023-09-27T18:59:49.823+02:00"
    },
    {
      "name": "open",
      "time": "2023-09-27T19:00:44.02+02:00"
    }
  ],
  "body": "<!DOCTYPE html><html><head></head><body> <h1>Confirm you email</h1> <p>Please confirm your email address by clicking on the link below</p></body></html>",
  "attachmentCount": 0
}

// Error
{
  "code": "document_not_found",
  "message": "Unique id does not exist"
}
```

```bash
// For All Api
{
  "message": "Key not found",
  "code": "unauthorized"
}
```
