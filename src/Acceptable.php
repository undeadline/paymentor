<?php

namespace Undeadline\Paymentor;

interface Acceptable
{
    /**
     * Use when payment needs to accepting(capturing)
     * 
     * @param array $payment
     */
    public function accept(array $payment);
}