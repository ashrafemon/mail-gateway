<?php

namespace Leafwrap\MailGateways\Services;

use Leafwrap\MailGateways\Contracts\ServiceContract;
use Leafwrap\MailGateways\Providers\Twilio;

class TwilioService implements ServiceContract
{
    public function init()
    {
        $service = new Twilio(BaseService::$paymentGateway->credentials['app_key'] ?? '', BaseService::$paymentGateway->credentials['secret_key'] ?? '', BaseService::$paymentGateway->credentials['username'] ?? '', BaseService::$paymentGateway->credentials['password'] ?? '', BaseService::$paymentGateway->credentials['sandbox'] ?? true);

        $this->setFeedback($service->tokenizer());
        if ($this->feedback()['isError']) {
            return null;
        }

        return $service;
    }

    public function send()
    {
        // TODO: Implement send() method.
    }

    public function retrieve()
    {
        // TODO: Implement retrieve() method.
    }
}