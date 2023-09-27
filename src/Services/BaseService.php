<?php

namespace Leafwrap\MailGateways\Services;

use Leafwrap\MailGateways\Models\MailGateway;
use Leafwrap\MailGateways\Traits\Helper;
use Exception;

class BaseService
{
    use Helper;

    static string $transactionId;
    static string $gateway;
    static mixed $mailGateway;
    static array $mailFeedback;

    public function feedback(): array
    {
        return BaseService::$mailFeedback;
    }

    protected function setFeedback($data): void
    {
        BaseService::$mailFeedback = $data;
    }

//    protected function verifyTransaction($transactionId): void
//    {
//        try {
//            if (!$exist = PaymentTransaction::query()->where(['transaction_id' => $transactionId, 'status' => 'request'])->first()) {
//                $this->setFeedback($this->leafwrapResponse(true, false, 'error', 404, 'Payment transaction not found'));
//                return;
//            }
//
//            BaseService::$transactionId = $exist->transaction_id;
//
//            if (!in_array($exist->gateway, ['paypal', 'stripe', 'razorpay', 'bkash'])) {
//                $this->setFeedback($this->leafwrapResponse(true, false, 'error', 404, 'Payment transaction invalid gateway'));
//                return;
//            }
//
//            BaseService::$gateway = $exist->gateway;
//            BaseService::$orderId = match ($exist->gateway) {
//                'bkash' => $exist->request_payload['response']['paymentID'] ?? '',
//                default => $exist->request_payload['response']['id'] ?? ''
//            };
//
//            $this->setFeedback($this->verifyCredentials());
//            if ($this->feedback()['isError']) {
//                return;
//            }
//
//            $this->setFeedback($this->leafwrapResponse(false, true, 'success', 200, 'Transaction validated successfully'));
//        } catch (Exception $e) {
//            $this->setFeedback($this->leafwrapResponse(true, false, 'serverError', 500, $e->getMessage()));
//            return;
//        }
//    }

    protected function verifyCredentials(): array
    {
        try {
            if (!BaseService::$mailGateway = MailGateway::query()->where(['gateway' => BaseService::$gateway])->first()) {
                return $this->leafwrapResponse(true, false, 'error', 404, 'Mail gateway not found');
            }

            return $this->leafwrapResponse(false, true, 'success', 200, 'Mail gateway found');
        } catch (Exception $e) {
            return $this->leafwrapResponse(true, false, 'serverError', 500, $e->getMessage());
        }
    }
}