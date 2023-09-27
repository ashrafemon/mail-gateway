### Send Message

```bash
// Success
[
  {
    "ErrorCode": 0,
    "Message": "OK",
    "MessageID": "b7bc2f4a-e38e-4336-af7d-e6c392c2f817",
    "SubmittedAt": "2010-11-26T12:01:05.1794748-05:00",
    "To": "receiver1@example.com"
  },
  {
    "ErrorCode": 406,
    "Message": "You tried to send to a recipient that has been marked as inactive. Found inactive addresses: example@example.com. Inactive recipients are ones that have generated a hard bounce, a spam complaint, or a manual suppression. "
  }
]

// Error
{
    "ErrorCode": 406,
    "Message": "You tried to send to a recipient that has been marked as inactive. Found inactive addresses: example@example.com. Inactive recipients are ones that have generated a hard bounce, a spam complaint, or a manual suppression. "
}
```

### Retrieve Message By ID

```bash
// Success
{
  "TextBody": "Thank you for your order...",
  "HtmlBody": "<p>Thank you for your order...</p>",
  "Body": "SMTP dump data",
  "Tag": "product-orders",
  "MessageID": "07311c54-0687-4ab9-b034-b54b5bad88ba",
  "MessageStream": "outbound",
  "To": [
    {
      "Email": "john.doe@yahoo.com",
      "Name": null
    }
  ],
  "Cc": [],
  "Bcc": [],
  "Recipients": [
    "john.doe@yahoo.com"
  ],
  "ReceivedAt": "2014-02-14T11:12:54.8054242-05:00",
  "From": "\"Joe\" <joe@domain.com>",
  "Subject": "Parts Order #5454",
  "Attachments": [
      "myimage.png",
      "mypaper.doc"
  ],
  "Status": "Sent",
  "TrackOpens" : true,
  "TrackLinks" : "HtmlOnly",
  "Metadata": {
    "color": "blue",
    "client-id": "12345"
  },
  "Sandboxed": false,
  "MessageEvents": [
    {
      "Recipient": "john.doe@yahoo.com",
      "Type": "Delivered",
      "ReceivedAt": "2014-02-14T11:13:10.8054242-05:00",
      "Details": {
        "DeliveryMessage": "smtp;250 2.0.0 OK l10si21599969igu.63 - gsmtp",
        "DestinationServer": "yahoo-smtp-in.l.yahoo.com (433.899.888.26)",
        "DestinationIP": "173.194.74.256"
      }
    },
    {
      "Recipient": "john.doe@yahoo.com",
      "Type": "Transient",
      "ReceivedAt": "2014-02-14T11:12:10.8054242-05:00",
      "Details": {
        "DeliveryMessage": "smtp;400 Server cannot accept messages at this time, please try again later",
        "DestinationServer": "yahoo-smtp-in.l.yahoo.com (433.899.888.26)",
        "DestinationIP": "173.194.74.256"
      }
    },
    {
      "Recipient": "john.doe@yahoo.com",
      "Type": "Opened",
      "ReceivedAt": "2014-02-14T11:20:10.8054242-05:00",
      "Details": {
        "Summary": "Email opened with Mozilla/5.0 (Windows NT 5.1; rv:11.0) Gecko Firefox/11.0 (via ggpht.com GoogleImageProxy)"
      }
    },
    {
      "Recipient": "badrecipient@example.com",
      "Type": "Bounced",
      "ReceivedAt": "2014-02-14T11:20:15.8054242-05:00",
      "Details": {
        "Summary": "smtp;550 5.1.1 The email account that you tried to reach does not exist. Please try double-checking the recipient's email address for typos or unnecessary spaces.",
        "BounceID": "374814878"
      }
    },
    {
      "Recipient": "badrecipient@example.com",
      "Type": "SubscriptionChanged",
      "ReceivedAt": "2014-02-14T11:21:15.8054242-05:00",
      "Details": {
        "Origin": "Recipient",
        "SuppressSending": "True"
      }
    },
    {
      "Recipient":"click-tracked@example.com",
      "Type":"LinkClicked",
      "ReceivedAt":"2016-10-05T16:03:56.0000000-04:00",
      "Details":{
        "Summary":"Tracked Link 'https://example.com/a/path/to/the/future?queryValue=1&queryValue=2' was clicked from the HTMLBody.",
        "Link":"https://example.com/a/path/to/the/future?queryValue=1&queryValue=2",
        "ClickLocation":"HTML"
      }
    }
  ]
}

// Error
{
    "errors": [
        {
            "message": "Unconfigured Sending Domain <example.sink sparkpostmail.com>",
            "code": "7001"
        }
    ]
}
```
