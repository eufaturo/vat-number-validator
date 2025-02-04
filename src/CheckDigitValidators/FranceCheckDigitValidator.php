<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class FranceCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        if (preg_match('/^\d{11}$/', $vatNumber) === 0) {
            return true;
        }

        $total = (int) mb_substr($vatNumber, -9);

        $total = (100 * $total + 12) % 97;

        return (int) mb_substr($vatNumber, 0, 2) === $total;
    }
}
