<?php

namespace Leafwrap\MailGateways\Providers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Leafwrap\MailGateways\Contracts\ProviderContract;

class SendInBlue extends BaseProvider implements ProviderContract
{
    public function __construct($credentials)
    {
        $this->urlGen();
        $this->tokenizer($credentials);
    }

    public function urlGen(): void
    {
        $this->baseUrl = 'https://api.brevo.com/v3';
        $this->urls = ['retrieve' => $this->baseUrl . '/messages/:id', 'send' => $this->baseUrl . '/smtp/email'];
    }

    public function tokenizer($data): void
    {
        $this->credentials = ['appKey' => trim($data['appKey'])];
        $this->defaultHeaders = array_merge($this->defaultHeaders, ['Api-Key' => $this->credentials['appKey']]);
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
            $payload = ['sender' => $data['from'], 'to' => $data['to'], "subject" => $data['subject'], 'htmlContent' => $data['content']['html'], "textContent" => $data['content']['text'], "batchId" => (string)Str::uuid()];
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
