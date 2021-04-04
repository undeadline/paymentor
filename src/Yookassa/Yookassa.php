<?php

namespace Undeadline\Paymentor\Yookassa;

use YooKassa\Client;
use Ramsey\Uuid\Uuid;
use Undeadline\Paymentor\Payment;
use Undeadline\Paymentor\Acceptable;

class Yookassa extends Payment implements Acceptable
{
    /**
     * Create payment
     * 
     * @param array $info
     */
    public function create(array $info)
    {
        return $this->client->createPayment($info, $info['idempotence_key'] ?? Uuid::uuid4());
    }

    /**
     * Use when payment needs to accepting(capturing)
     * 
     * @param array $payment
     */
    public function accept(array $payment)
    {
        return $this->client->capturePayment($payment, $payment['id'], $payment['idempotence_key'] ?? Uuid::uuid4());
    }

    /**
     * Create client
     */
    protected function client()
    {
        if (!isset($this->credentials['shop_id']) || !isset($this->credentials['secret_key'])) {
            throw new \Exception("Client should be get shop_id and secret_key");
        }

        $this->client = new Client();
        $this->client->setAuth($this->credentials['shop_id'], $this->credentials['secret_key']);
    }
}