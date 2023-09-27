<?php

namespace Leafwrap\MailGateways\Providers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Leafwrap\MailGateways\Contracts\ProviderContract;

class Mailchimp extends BaseProvider implements ProviderContract
{
    public function __construct($credentials)
    {
        $this->urlGen();
        $this->tokenizer($credentials);
    }

    public function urlGen(): void
    {
        $this->baseUrl = 'https://mandrillapp.com/api/1.0';
        $this->urls = ['retrieve' => $this->baseUrl . '/messages/info', 'send' => $this->baseUrl . '/messages/send'];
    }

    public function tokenizer($data): void
    {
        $this->credentials = ['appKey' => trim($data['appKey'])];
    }

    public function send($data)
    {
        try {
            $client = Http::withHeaders($this->defaultHeaders)->post($this->urls['send'], $this->dataGen($data));
            if (!$client->successful()) {
            }
            return $client->json();
        } catch (Exception $e) {

        }
    }

    public function dataGen($data, $type = 'send'): array
    {
        $payload = [];
        if ($type === 'send') {
            $payload = ['key' => $this->credentials['appKey'], 'message' => ['from_email' => $data['from']['email'], 'subject' => $data['subject'], 'text' => $data['content']['text'], 'html' => $data['content']['html'], 'to' => $data['to']]];
        } elseif ($type === 'retrieve') {
            $payload = ['key' => $this->credentials['appKey'], 'id' => $data['id']];
        }
        return $payload;
    }

    public function retrieve($id)
    {
        try {
            $client = Http::withHeaders($this->defaultHeaders)->post($this->urls['retrieve'], $this->dataGen(['id' => $id], 'retrieve'));
            if (!$client->successful()) {
            }
            return $client->json();
        } catch (Exception $e) {

        }
    }
}
