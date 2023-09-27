### Send Message

```bash
// Success
{
    "id": "<20230927182145.54f36ad8f6dd4ddf@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org>",
    "message": "Queued. Thank you."
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
{
    "items": [
        {
            "recipient": "ashraf.emon143@gmail.com",
            "log-level": "info",
            "campaigns": [],
            "flags": {
                "is-routed": false,
                "is-test-mode": false,
                "is-system-test": false,
                "is-authenticated": true
            },
            "user-variables": {},
            "delivery-status": {
                "description": "",
                "utf8": true,
                "attempt-no": 1,
                "enhanced-code": "",
                "code": 250,
                "message": "OK",
                "session-seconds": 1.091,
                "certificate-verified": true,
                "tls": true,
                "mx-host": "gmail-smtp-in.l.google.com"
            },
            "envelope": {
                "sending-ip": "69.72.42.10",
                "sender": "postmaster@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                "transport": "smtp",
                "targets": "ashraf.emon143@gmail.com"
            },
            "storage": {
                "env": "production",
                "key": "BAABAQWgkxlRSUmjO9JAqpCL0uYLNasEZA",
                "region": "us-west1",
                "url": "https://storage-us-west1.api.mailgun.net/v3/domains/sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org/messages/BAABAQWgkxlRSUmjO9JAqpCL0uYLNasEZA"
            },
            "id": "HmhH_JlURGSuHdlMI_hBzQ",
            "tags": [],
            "timestamp": 1695838906.6885545,
            "recipient-domain": "gmail.com",
            "event": "delivered",
            "message": {
                "headers": {
                    "message-id": "20230927182145.54f36ad8f6dd4ddf@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                    "to": "rupomehsan34@gmail.com, ashraf.emon143@gmail.com",
                    "from": "rupomehsan34@gmail.com",
                    "subject": "Test Mail"
                },
                "size": 716,
                "attachments": []
            }
        },
        {
            "campaigns": [],
            "recipient": "rupomehsan34@gmail.com",
            "user-variables": {},
            "recipient-domain": "gmail.com",
            "delivery-status": {
                "tls": true,
                "enhanced-code": "",
                "description": "",
                "session-seconds": 1.074,
                "attempt-no": 1,
                "certificate-verified": true,
                "code": 250,
                "message": "OK",
                "utf8": true,
                "mx-host": "gmail-smtp-in.l.google.com"
            },
            "storage": {
                "region": "us-west1",
                "key": "BAABAQWgkxlRSUmjO9JAqpCL0uYLNasEZA",
                "env": "production",
                "url": "https://storage-us-west1.api.mailgun.net/v3/domains/sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org/messages/BAABAQWgkxlRSUmjO9JAqpCL0uYLNasEZA"
            },
            "log-level": "info",
            "flags": {
                "is-authenticated": true,
                "is-test-mode": false,
                "is-routed": false,
                "is-system-test": false
            },
            "envelope": {
                "sending-ip": "69.72.42.10",
                "sender": "postmaster@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                "targets": "rupomehsan34@gmail.com",
                "transport": "smtp"
            },
            "tags": [],
            "event": "delivered",
            "message": {
                "size": 716,
                "headers": {
                    "message-id": "20230927182145.54f36ad8f6dd4ddf@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                    "to": "rupomehsan34@gmail.com, ashraf.emon143@gmail.com",
                    "subject": "Test Mail",
                    "from": "rupomehsan34@gmail.com"
                },
                "attachments": []
            },
            "id": "lTlH8672RSuhiKpFej-gXA",
            "timestamp": 1695838906.6694696
        },
        {
            "method": "HTTP",
            "recipient": "rupomehsan34@gmail.com",
            "recipient-domain": "gmail.com",
            "storage": {
                "region": "us-west1",
                "env": "production",
                "key": "BAABAQWgkxlRSUmjO9JAqpCL0uYLNasEZA",
                "url": "https://storage-us-west1.api.mailgun.net/v3/domains/sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org/messages/BAABAQWgkxlRSUmjO9JAqpCL0uYLNasEZA"
            },
            "log-level": "info",
            "envelope": {
                "transport": "smtp",
                "sender": "postmaster@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                "targets": "rupomehsan34@gmail.com"
            },
            "id": "S0VQJcMBT9S9DV4qAMiBFw",
            "originating-ip": "103.130.74.154",
            "event": "accepted",
            "user-variables": {},
            "tags": null,
            "api-key-id": "413e373c-f0ae1e8b",
            "message": {
                "headers": {
                    "message-id": "20230927182145.54f36ad8f6dd4ddf@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                    "to": "rupomehsan34@gmail.com, ashraf.emon143@gmail.com",
                    "subject": "Test Mail",
                    "from": "rupomehsan34@gmail.com"
                },
                "size": 716
            },
            "timestamp": 1695838905.5782878,
            "flags": {
                "is-authenticated": true,
                "is-test-mode": false
            }
        },
        {
            "storage": {
                "region": "us-west1",
                "key": "BAABAQWgkxlRSUmjO9JAqpCL0uYLNasEZA",
                "env": "production",
                "url": "https://storage-us-west1.api.mailgun.net/v3/domains/sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org/messages/BAABAQWgkxlRSUmjO9JAqpCL0uYLNasEZA"
            },
            "originating-ip": "103.130.74.154",
            "method": "HTTP",
            "tags": null,
            "recipient": "ashraf.emon143@gmail.com",
            "id": "1haDO8PPSOCWfZvOkSZ_xw",
            "recipient-domain": "gmail.com",
            "envelope": {
                "sender": "postmaster@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                "targets": "ashraf.emon143@gmail.com",
                "transport": "smtp"
            },
            "flags": {
                "is-authenticated": true,
                "is-test-mode": false
            },
            "timestamp": 1695838905.5788622,
            "log-level": "info",
            "user-variables": {},
            "api-key-id": "413e373c-f0ae1e8b",
            "message": {
                "headers": {
                    "from": "rupomehsan34@gmail.com",
                    "message-id": "20230927182145.54f36ad8f6dd4ddf@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                    "to": "rupomehsan34@gmail.com, ashraf.emon143@gmail.com",
                    "subject": "Test Mail"
                },
                "size": 716
            },
            "event": "accepted"
        },
        {
            "campaigns": [],
            "storage": {
                "key": "BAABAAWswy7HPQnUM0RKiJi2w1hwm7PiYQ",
                "region": "us-east4",
                "env": "production",
                "url": "https://storage-us-east4.api.mailgun.net/v3/domains/sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org/messages/BAABAAWswy7HPQnUM0RKiJi2w1hwm7PiYQ"
            },
            "timestamp": 1695814040.197696,
            "flags": {
                "is-authenticated": true,
                "is-system-test": false,
                "is-test-mode": false,
                "is-routed": false
            },
            "delivery-status": {
                "mx-host": "gmail-smtp-in.l.google.com",
                "code": 250,
                "attempt-no": 1,
                "enhanced-code": "",
                "description": "",
                "message": "OK",
                "tls": true,
                "utf8": true,
                "certificate-verified": true,
                "session-seconds": 1.193
            },
            "id": "BfqBc6pxQsW16FnAAeYAQA",
            "log-level": "info",
            "envelope": {
                "sender": "postmaster@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                "sending-ip": "198.61.254.59",
                "targets": "rupomehsan34@gmail.com",
                "transport": "smtp"
            },
            "recipient-domain": "gmail.com",
            "tags": [],
            "event": "delivered",
            "message": {
                "attachments": [],
                "size": 713,
                "headers": {
                    "subject": "test campaign",
                    "message-id": "20230927112718.bcb3778477d346a1@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                    "to": "rupomehsan34@gmail.com",
                    "from": "info@ccninfotech.com"
                }
            },
            "recipient": "rupomehsan34@gmail.com",
            "user-variables": {}
        },
        {
            "originating-ip": "103.73.227.212",
            "recipient": "rupomehsan34@gmail.com",
            "method": "HTTP",
            "timestamp": 1695814038.9978473,
            "storage": {
                "key": "BAABAAWswy7HPQnUM0RKiJi2w1hwm7PiYQ",
                "env": "production",
                "region": "us-east4",
                "url": "https://storage-us-east4.api.mailgun.net/v3/domains/sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org/messages/BAABAAWswy7HPQnUM0RKiJi2w1hwm7PiYQ"
            },
            "envelope": {
                "targets": "rupomehsan34@gmail.com",
                "sender": "postmaster@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                "transport": "smtp"
            },
            "log-level": "info",
            "recipient-domain": "gmail.com",
            "api-key-id": "413e373c-f0ae1e8b",
            "flags": {
                "is-authenticated": true,
                "is-test-mode": false
            },
            "tags": null,
            "user-variables": {},
            "message": {
                "headers": {
                    "subject": "test campaign",
                    "from": "info@ccninfotech.com",
                    "message-id": "20230927112718.bcb3778477d346a1@sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org",
                    "to": "rupomehsan34@gmail.com"
                },
                "size": 713
            },
            "event": "accepted",
            "id": "JurZ788OSOa-e1EvFKSXKQ"
        }
    ],
    "paging": {
        "previous": "https://api.mailgun.net/v3/sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org/events/WzMseyJiIjoiMjAyMy0wOS0yN1QxODozOToyNC4yNDgrMDA6MDAiLCJlIjoiMjAyMy0wOS0yNlQxODozOToyNC4yNTYrMDA6MDAifSx7ImIiOiIyMDIzLTA5LTI3VDE4OjIxOjQ2LjY4OCswMDowMCIsImUiOiIyMDIzLTA5LTI3VDE4OjM5OjI0LjI0OCswMDowMCJ9LCJfZG9jI0htaEhfSmxVUkdTdUhkbE1JX2hCelEiLFsicCIsImYiXSxudWxsLFtbImFjY291bnQuaWQiLCI2NGIyNjU4OGIxMjJlZGM4ODE0ZTY0NDciXSxbImRvbWFpbi5uYW1lIiwic2FuZGJveGUwODg5NDRlY2RjODQzMTNhZTljNjhhZmI4MWUzNjNiLm1haWxndW4ub3JnIl1dLDI1XQ==",
        "next": "https://api.mailgun.net/v3/sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org/events/WzMseyJiIjoiMjAyMy0wOS0yN1QxODozOToyNC4yNDgrMDA6MDAiLCJlIjoiMjAyMy0wOS0yNlQxODozOToyNC4yNTYrMDA6MDAifSx7ImIiOiIyMDIzLTA5LTI3VDExOjI3OjE4Ljk5NyswMDowMCIsImUiOiIyMDIzLTA5LTI2VDE4OjM5OjI0LjI1NiswMDowMCJ9LCJfZG9jI0p1clo3ODhPU09hLWUxRXZGS1NYS1EiLFsiZiJdLG51bGwsW1siYWNjb3VudC5pZCIsIjY0YjI2NTg4YjEyMmVkYzg4MTRlNjQ0NyJdLFsiZG9tYWluLm5hbWUiLCJzYW5kYm94ZTA4ODk0NGVjZGM4NDMxM2FlOWM2OGFmYjgxZTM2M2IubWFpbGd1bi5vcmciXV0sMjVd",
        "first": "https://api.mailgun.net/v3/sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org/events/WzMseyJiIjoiMjAyMy0wOS0yN1QxODozOToyNC4yNDgrMDA6MDAiLCJlIjoiMjAyMy0wOS0yNlQxODozOToyNC4yNTYrMDA6MDAifSx7ImIiOiIyMDIzLTA5LTI3VDE4OjM5OjI0LjI0OCswMDowMCIsImUiOiIyMDIzLTA5LTI2VDE4OjM5OjI0LjI1NiswMDowMCJ9LG51bGwsWyJmIl0sbnVsbCxbWyJhY2NvdW50LmlkIiwiNjRiMjY1ODhiMTIyZWRjODgxNGU2NDQ3Il0sWyJkb21haW4ubmFtZSIsInNhbmRib3hlMDg4OTQ0ZWNkYzg0MzEzYWU5YzY4YWZiODFlMzYzYi5tYWlsZ3VuLm9yZyJdXSwyNV0=",
        "last": "https://api.mailgun.net/v3/sandboxe088944ecdc84313ae9c68afb81e363b.mailgun.org/events/WzMseyJiIjoiMjAyMy0wOS0yN1QxODozOToyNC4yNDgrMDA6MDAiLCJlIjoiMjAyMy0wOS0yNlQxODozOToyNC4yNTYrMDA6MDAifSx7ImIiOiIyMDIzLTA5LTI2VDE4OjM5OjI0LjI1NiswMDowMCIsImUiOiIyMDIzLTA5LTI3VDE4OjM5OjI0LjI0OCswMDowMCJ9LG51bGwsWyJwIiwiZiJdLG51bGwsW1siYWNjb3VudC5pZCIsIjY0YjI2NTg4YjEyMmVkYzg4MTRlNjQ0NyJdLFsiZG9tYWluLm5hbWUiLCJzYW5kYm94ZTA4ODk0NGVjZGM4NDMxM2FlOWM2OGFmYjgxZTM2M2IubWFpbGd1bi5vcmciXV0sMjVd"
    }
}

// Error
{
    "ErrorInfo": "",
    "ErrorMessage": "Object not found",
    "StatusCode": 404
}
```
