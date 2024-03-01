# Email verificator

Верификатор электронных адресов

## Требования

- PHP 8.2

## Установка

```bash
composer require shtorm/email-verificator
```

##  Использование

```php
<?php

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

/*
Проверка test@test.com - Ошибка, Описание: Указан несуществующий домен электронной почты
Проверка test@testcom - Ошибка, Описание: Неверный формат адреса электронной почты
Проверка tes2test.com - Ошибка, Описание: Неверный формат адреса электронной почты
Проверка test222@gmail.com - Oк, Описание: 
*/
