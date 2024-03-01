<?php

namespace Shtorm\EmailVerificator;

use Shtorm\EmailVerificator\Rules\DnsMxVereficationRule;
use Shtorm\EmailVerificator\Rules\RegexVerificationRule;
use Shtorm\EmailVerificator\Rules\VerificationRuleInterface;

class EmailVerificationService
{
    /**
     * @var VerificationRuleInterface[]
     */
    private array $rules = [];

    public function __construct()
    {
        $this->rules[] = new RegexVerificationRule();
        $this->rules[] = new DnsMxVereficationRule();
    }


    /**
     * @param string[] $emails
     * @return EmailVerificationResult[]
     */
    public function verification(array $emails): array
    {
        $results = [];
        foreach ($emails as $email) {
            foreach ($this->rules as $rule) {
                if (!$rule->verify($email)) {
                    $results[] = new EmailVerificationResult($email, false, $rule->getFailVerifyMessage());
                    continue 2;
                }
            }
            $results[] = new EmailVerificationResult($email, true);
        }
        return $results;
    }
}