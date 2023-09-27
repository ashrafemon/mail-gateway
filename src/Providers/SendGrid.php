<?php

namespace Leafwrap\MailGateways\Providers;

use Exception;
use Illuminate\Support\Facades\Http;
use Leafwrap\MailGateways\Contracts\ProviderContract;

class SendGrid extends BaseProvider implements ProviderContract
{
    public function __construct($credentials)
    {
        $this->urlGen();
        $this->tokenizer($credentials);
    }

    public function urlGen(): void
    {
        $this->baseUrl = 'https://api.sendgrid.com/v3';
        $this->urls = ['retrieve' => $this->baseUrl . '/messages/:id', 'send' => $this->baseUrl . '/mail/send'];
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
            $payload = ['personalizations' => [['to' => $data['to'], 'subject' => $data['subject']]], 'from' => $data['from'], 'reply_to' => ['email' => $data['reply_to'], 'name' => $data['from']['name']], 'content' => [['type' => 'text/html', 'value' => $data['content']['html']]], "mail_settings" => ["bypass_list_management" => ["enable" => false], "footer" => ["enable" => false], "sandbox_mode" => ["enable" => true]], "tracking_settings" => ["click_tracking" => ["enable" => true, "enable_text" => false], "open_tracking" => ["enable" => true, "substitution_tag" => "%open-track%",], "subscription_tracking" => ["enable" => true]]];
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
