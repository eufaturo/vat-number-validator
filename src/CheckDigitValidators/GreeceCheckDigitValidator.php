<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class GreeceCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $total = 0;
        $multipliers = [256, 128, 64, 32, 16, 8, 4, 2];

        //eight character numbers should be prefixed with an 0.
        if (8 === mb_strlen($vatNumber)) {
            $vatNumber = '0'.$vatNumber;
        }

        // Extract the next digit and multiply by the counter.
        for ($i = 0; $i < 8; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        // Establish check digit.
        $total = $total % 11;

        if (9 < $total) {
            $total = 0;
        }

        // Compare it with the last character of the VAT number. If it's the same, then it's valid.
        return (int) $vatNumber[8] === $total;
    }
}
