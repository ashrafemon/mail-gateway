<?php

namespace Leafwrap\MailGateways\Providers;

use Exception;
use Illuminate\Support\Facades\Http;
use Leafwrap\MailGateways\Contracts\ProviderContract;

class Mailjet extends BaseProvider implements ProviderContract
{
    public function __construct($credentials)
    {
        $this->urlGen();
        $this->tokenizer($credentials);
    }

    public function urlGen(): void
    {
        $this->baseUrl = 'https://api.mailjet.com/v3';
        $this->urls = ['retrieve' => $this->baseUrl . '/REST/message/:id', 'send' => $this->baseUrl . '.1/send'];
    }

    public function tokenizer($data): void
    {
        $this->credentials = ['appKey' => trim($data['appKey']), 'secretKey' => trim($data['secretKey'])];
    }

    public function send($data)
    {
        try {
            $client = Http::withBasicAuth($this->credentials['appKey'], $this->credentials['secretKey'])->withHeaders($this->defaultHeaders)->post($this->urls['send'], $this->dataGen($data));
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
            $payload = ['Messages' => [['From' => $data['from'], 'To' => $data['to'], 'Subject' => $data['subject'], 'TextPart' => $data['content']['text'], 'HTMLPart' => $data['content']['html']]], 'SandboxMode' => true];
        }
        return $payload;
    }

    public function retrieve($id)
    {
        try {
            $client = Http::withBasicAuth($this->credentials['appKey'], $this->credentials['secretKey'])->get(str_replace(':id', $id, $this->urls['retrieve']));
            if (!$client->successful()) {
            }
            return $client->json();
        } catch (Exception $e) {
        }
    }
}
