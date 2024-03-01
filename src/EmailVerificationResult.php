<?php

namespace Shtorm\EmailVerificator;

readonly class EmailVerificationResult
{
    public function __construct(
        public string $emil,
        public bool $is_verified,
        public string $message = ''
    ){
    }
}