<?php

namespace Shtorm\EmailVerificator\Rules;

class RegexVerificationRule implements VerificationRuleInterface
{
    public function verify(string $email): bool
    {
        return (bool) preg_match('~([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)~', $email);
    }

    public function getFailVerifyMessage(): string
    {
        return 'Неверный формат адреса электронной почты';
    }
}