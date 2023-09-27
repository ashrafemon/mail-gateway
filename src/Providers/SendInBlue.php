<?php

namespace Leafwrap\MailGateways\Providers;

use Exception;
use Illuminate\Support\Facades\Http;
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
        $this->urls = ['retrieve' => $this->baseUrl . '/smtp/emails', 'send' => $this->baseUrl . '/smtp/email'];
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
            $client = Http::withHeaders($this->defaultHeaders)->get($this->urls['retrieve'] . "?messageId={$id}");
            if (!$client->successful()) {
            }

            $res = $client->json();
            if ($res['count']) {
                foreach ($res['transactionalEmails'] as $item) {
                    $this->statusRetrieve($item['uuid']);
                }
            }

            return $client->json();
        } catch (Exception $e) {
        }
    }

    private function statusRetrieve($id)
    {
        try {
            $client = Http::withHeaders($this->defaultHeaders)->get($this->urls['retrieve'] . "/{$id}");
            if (!$client->successful()) {
            }
            return $client->json();
        } catch (Exception $e) {
        }
    }
}
