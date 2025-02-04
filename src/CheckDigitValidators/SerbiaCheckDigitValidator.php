<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class SerbiaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $product = 10;

        for ($i = 0; $i < 8; $i++) {
            // Extract the next digit and implement the algorithm
            $sum = ((int) $vatNumber[$i] + $product) % 10;

            if (0 === $sum) {
                $sum = 10;
            }
            $product = (2 * $sum) % 11;
        }

        // Now check that we have the right check digit
        return 1 === ($product + (int) $vatNumber[8]) % 10;
    }
}
