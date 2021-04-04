<?php

namespace Undeadline\Paymentor;

abstract class Payment
{
    /**
     * Credentials from payment system
     */
    protected $credentials;

    /**
     * Instance of payment system client
     */
    protected $client;
    
    /**
     * Set credentials and create client
     */
    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;

        $this->client();
    }

    /**
     * Create payment
     * 
     * @param array $info
     */
    abstract public function create(array $info);

    /**
     * Create client
     */
    abstract protected function client();
}