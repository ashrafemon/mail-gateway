<?php

namespace Leafwrap\MailGateways\Providers;

class BaseProvider
{
    protected string $baseUrl;
    protected array $urls = [];
    protected array $defaultHeaders = ['Accept' => 'application/json', 'Content-Type' => 'application/json'];
    protected array $credentials = [];
}
