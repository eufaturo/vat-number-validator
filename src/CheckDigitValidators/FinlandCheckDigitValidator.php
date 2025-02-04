<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class FinlandCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        // Checks the check digits of a Finnish VAT number.

        $total = 0;
        $multipliers = [7, 9, 10, 5, 8, 4, 2];

        // Extract the next digit and multiply by the counter.
        for ($i = 0; $i < 7; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        // Establish check digit.
        $total = 11 - $total % 11;

        if (9 < $total) {
            $total = 0;
        }

        // Compare it with the last character of the VAT number. If it's the same, then it's valid.
        return (int) $vatNumber[7] === $total;
    }
}
