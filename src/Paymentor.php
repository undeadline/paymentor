<?php

namespace Undeadline\Paymentor;

use Undeadline\Paymentor\Yookassa\Yookassa;

class Paymentor
{
    /**
     * Create payment system intstance
     * 
     * @param string $system
     * @param array $credentials
     * @throws \Exception
     */
    public function make(string $system, array $credentials)
    {
        if (\method_exists($this, $system)) {
            return $this->{$system}($credentials);
        }

        throw new \Exception("This is system not exists");
    }

    /**
     * Create instance of yookassa
     * 
     * @param array $credentials
     */
    private function yookassa($credentials)
    {
        return new Yookassa($credentials);
    }
}