<?php

namespace Shtorm\EmailVerificator\Rules;

class DnsMxVereficationRule implements VerificationRuleInterface
{

    public function verify(string $email): bool
    {
        $params = explode('@', $email);
        if (empty($params[1])) {
            return false;
        }
        return checkdnsrr($params[1]);
    }

    public function getFailVerifyMessage(): string
    {
        return 'Указан несуществующий домен электронной почты';
    }
}