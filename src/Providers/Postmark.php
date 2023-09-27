<?php

namespace Leafwrap\MailGateways\Providers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Leafwrap\MailGateways\Contracts\ProviderContract;

class Postmark extends BaseProvider implements ProviderContract
{
    public function __construct($credentials)
    {
        $this->urlGen();
        $this->tokenizer($credentials);
    }

    public function urlGen(): void
    {
        $this->baseUrl = 'https://api.postmarkapp.com';
        $this->urls = ['retrieve' => $this->baseUrl . '/messages/outbound/:id/details', 'send' => $this->baseUrl . '/email/batch'];
    }

    public function tokenizer($data): void
    {
        $this->credentials = ['appKey' => trim($data['appKey'])];
        $this->defaultHeaders = array_merge($this->defaultHeaders, ['X-Postmark-Server-Token' => $this->credentials['appKey']]);
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
            $payload = [['From' => $data['from']['email'], 'To' => $data['to'], 'Subject' => $data['subject'], 'TextBody' => $data['content']['text'], 'HtmlBody' => $data['content']['html'], 'MessageStream' => 'outbound',]];
        }
        return $payload;
    }

    public function retrieve($id)
    {
        try {
            $client = Http::withHeaders($this->defaultHeaders)->get(str_replace(':id', $id, $this->urls['retrieve']));
            if (!$client->successful()) {
            }
            return $client->json();
        } catch (Exception $e) {

        }
    }
}
