<?php

namespace Leafwrap\MailGateways\Providers;

use Exception;
use Illuminate\Support\Facades\Http;
use Leafwrap\MailGateways\Contracts\ProviderContract;
use Leafwrap\MailGateways\Traits\Helper;

class _Mailjet implements ProviderContract
{
    use Helper;

    private string $baseUrl = 'https://api.mailjet.com';
    private array $tokens;
    private array $urls = [
        'send' => '/v3.1/send'
    ];

    public function __construct(private string $appKey, private string $secretKey)
    {
    }

    public function tokenizer(): array
    {
        try {
            if (!$this->appKey || !$this->secretKey) {
                return $this->leafwrapResponse(true, false, 'error', 400, 'Please provide a valid credentials');
            }
            $this->tokens = [$this->appKey, $this->secretKey];

            return $this->leafwrapResponse(false, true, 'success', 200, 'Authorization token setup successfully', $this->tokens);
        } catch (Exception $e) {
            return $this->leafwrapResponse(true, false, 'serverError', 500, $e->getMessage());
        }
    }

    public function send($data): array
    {
        try {
            $headers = ['Content-Type' => 'application/json'];
            $url = $this->baseUrl . $this->urls['send'];

            $client = Http::withBasicAuth($this->tokens[0], $this->tokens[1])->withHeaders($headers)
                ->post($url, [
                    'Messages' => [
                        [
                            'From' => $data['from'],
                            'To' => $data['recipients'],
                            'Subject' => $data['subject'],
                            'TextPart' => $data['content']['text'],
                            'HTMLPart' => $data['content']['html'],
                        ],
                    ],
                ]);

            if (!$client->successful()) {
                return $this->leafwrapResponse(true, false, 'error', 400, 'Mailjet send mail problem...', $client->json());
            }

            return $this->leafwrapResponse(false, true, 'success', 201, 'Mailjet send mail queue successfully...', $client->json());
        } catch (Exception $e) {
            return $this->leafwrapResponse(true, false, 'serverError', 500, $e->getMessage());
        }
    }

    public function retrieve($id)
    {

    }
}