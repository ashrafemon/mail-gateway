### Send Message

```bash
// Success
{
  "results": {
    "total_rejected_recipients": 0,
    "total_accepted_recipients": 1,
    "id": "11668787484950529"
  }
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

### Retrieve Message By ID

```bash
// Success
{
  "results": [
    {
      "type": "click",
      "campaign_id": "Example Campaign Name",
      "customer_id": "1",
      "delv_method": "esmtp",
      "event_id": "92356927693813856",
      "friendly_from": "sender@example.com",
      "geo_ip": {
        "country": "US",
        "region": "MD",
        "city": "Columbia",
        "latitude": "39.1749",
        "longitude": "-76.8375"
      },
      "injection_time": "2016-04-18T14:25:07.000+00:00",
      "ip_address": "127.0.0.1",
      "ip_pool": "Example-Ip-Pool",
      "message_id": "000443ee14578172be22",
      "msg_from": "sender@example.com",
      "msg_size": "1337",
      "num_retries": "2",
      "queue_time": "12",
      "rcpt_meta": {
        "customKey": "customValue",
        "anotherKey": [
          "value1",
          "value2",
          "value3"
        ]
      },
      "rcpt_tags": [
        "male",
        "US"
      ],
      "rcpt_to": "recipient@example.com",
      "raw_rcpt_to": "recipient@example.com",
      "rcpt_type": "cc",
      "recipient_domain": "example.com",
      "routing_domain": "example.com",
      "sending_domain": "example.com",
      "sending_ip": "127.0.0.1",
      "subaccount_id": "101",
      "subject": "Summer deals are here!",
      "target_link_name": "Example Link Name",
      "target_link_url": "http://example.com",
      "template_id": "my-template",
      "template_version": "1",
      "timestamp": "2016-04-18T14:25:07.000+00:00",
      "transmission_id": "65832150921904138",
      "user_agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36",
      "mailbox_provider": "Gmail",
      "mailbox_provider_region": "Europe"
    }
  ],
  "total_count": 1,
  "links": {}
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
