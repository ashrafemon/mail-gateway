<?php

namespace Leafwrap\MailGateways\Providers;

use Exception;
use Illuminate\Support\Facades\Http;
use Leafwrap\MailGateways\Contracts\ProviderContract;

class Mailgun extends BaseProvider implements ProviderContract
{
    public function __construct($credentials)
    {
        $this->tokenizer($credentials);
        $this->urlGen();
    }

    public function tokenizer($data): void
    {
        $this->credentials = ['appKey' => trim($data['appKey']), 'senderDomain' => trim($data['senderDomain'])];
    }

    public function urlGen(): void
    {
        $this->baseUrl = 'https://api.mailgun.net/v3/' . $this->credentials['senderDomain'];
        $this->urls = ['retrieve' => $this->baseUrl . '/events', 'send' => $this->baseUrl . '/messages'];
    }

    public function send($data)
    {
        try {
            $client = Http::withBasicAuth('api', $this->credentials['appKey'])->withHeaders($this->defaultHeaders)->asForm()->post($this->urls['send'], $this->dataGen($data));
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
            $payload = ['from' => $data['from']['email'], 'to' => $data['to'], 'subject' => $data['subject'], 'text' => $data['content']['text'], 'html' => $data['content']['html']];
        }
        return $payload;
    }

    public function retrieve($id)
    {
        try {
            $client = Http::withBasicAuth('api', $this->credentials['appKey'])->withHeaders($this->defaultHeaders)->get($this->urls['retrieve']);
            if (!$client->successful()) {
            }
            return $client->json();
        } catch (Exception $e) {
        }
    }
}
