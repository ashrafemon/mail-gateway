<?php

namespace Leafwrap\MailGateways\Providers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Leafwrap\MailGateways\Contracts\ProviderContract;

class Sparkpost extends BaseProvider implements ProviderContract
{
    public function __construct($credentials)
    {
        $this->urlGen();
        $this->tokenizer($credentials);
    }

    public function urlGen(): void
    {
        $this->baseUrl = 'https://api.sparkpost.com/api/v1';
        $this->urls = ['retrieve' => $this->baseUrl . '/transmissions/:id', 'send' => $this->baseUrl . '/transmissions'];
    }

    public function tokenizer($data): void
    {
        $this->credentials = ['appKey' => trim($data['appKey'])];
        $this->defaultHeaders = array_merge($this->defaultHeaders, ['Authorization' => $this->credentials['appKey']]);
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
            $payload = ['content' => ['from' => $data['from'], 'subject' => $data['subject'], 'text' => $data['content']['text'], 'html' => $data['content']['html']], 'recipients' => $data['to'], "options" => ["open_tracking" => false, "click_tracking" => false, "transactional" => true, "sandbox" => false, "inline_css" => false,]];
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
