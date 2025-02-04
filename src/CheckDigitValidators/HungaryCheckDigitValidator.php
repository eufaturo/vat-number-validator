<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class HungaryCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $total = 0;
        $multipliers = [9, 7, 3, 1, 9, 7, 3];

        // Extract the next digit and multiply by the counter
        for ($i = 0; $i < 7; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        // Establish check digit
        $total = 10 - ($total % 10);

        if ($total === 10) {
            $total = 0;
        }

        // Compare it with the last character of the VAT number. If it's the
        // same, then it's valid
        return $total === (int) $vatNumber[7];
    }
}
