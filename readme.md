```php
<?php

use Undeadline\Paymentor\Paymentor;

require_once 'vendor/autoload.php';

$paymentor = new Paymentor();
$actor = $paymentor->make('yookassa', ['shop_id' => 1, 'secret_key' => 'test']);

$payment = $actor->create([
    'amount' => array(
        'value' => '2.00',
        'currency' => 'RUB',
    ),
    'payment_method_data' => array(
        'type' => 'bank_card',
    ),
    'confirmation' => array(
        'type' => 'redirect',
        'return_url' => 'https://www.merchant-website.com/return_url',
    ),
    'description' => 'Заказ №72',
]);
```