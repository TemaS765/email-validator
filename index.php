<?php

require __DIR__ . '/vendor/autoload.php';

$emails = [
    'test@test.com',
    'test@testcom',
    'tes2test.com',
    'test222@gmail.com'
];

$results = (new \Shtorm\EmailVerificator\EmailVerificationService())->verification($emails);
foreach ($results as $result) {
    echo "Проверка {$result->emil} - " . ($result->is_verified ? 'Oк' : 'Ошибка') . ", Описание: {$result->message}\n";
}