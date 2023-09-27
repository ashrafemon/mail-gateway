<?php

namespace Leafwrap\MailGateways\Services;

use Leafwrap\MailGateways\Contracts\ServiceContract;
use Leafwrap\MailGateways\Providers\Mailjet;

class MailjetService extends BaseService implements ServiceContract
{
    public function send()
    {
        if (!$service = $this->init()) {
            return;
        }

        $this->setFeedback($service->send([
            'currency' => BaseService::$currency,
            'amount' => BaseService::$amount,
            'transaction_id' => BaseService::$transactionId
        ]));
        if ($this->feedback()['isError']) {
            return;
        }
    }

    public function init()
    {
        $service = new Mailjet(BaseService::$mailGateway->credentials['app_key'] ?? '', BaseService::$mailGateway->credentials['secret_key'] ?? '');

        $this->setFeedback($service->tokenizer());
        if ($this->feedback()['isError']) {
            return null;
        }

        return $service;
    }

    public function retrieve()
    {
        if (!$service = $this->init()) {
            return;
        }

        $this->setFeedback($service->orderQuery(BaseService::$orderId));
    }
}