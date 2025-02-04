<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class BelgiumCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        if (mb_strlen($vatNumber) === 9) {
            $vatNumber = '0'.$vatNumber;
        }

        if ($vatNumber[1] === '0') {
            return false;
        }

        return (97 - (int) mb_substr($vatNumber, 0, 8) % 97) === ((int) mb_substr($vatNumber, 8, 2));
    }
}
