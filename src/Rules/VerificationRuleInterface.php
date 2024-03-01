<?php

namespace Shtorm\EmailVerificator\Rules;

interface VerificationRuleInterface
{
    public function verify(string $email): bool;

    public function getFailVerifyMessage(): string;
}