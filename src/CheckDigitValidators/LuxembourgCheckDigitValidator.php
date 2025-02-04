<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class LuxembourgCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        return (int) mb_substr($vatNumber, 0, 6) % 89 === (int) mb_substr($vatNumber, 6, 2);
    }
}
