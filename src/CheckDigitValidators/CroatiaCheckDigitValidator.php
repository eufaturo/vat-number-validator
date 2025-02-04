<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class CroatiaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $product = 10;

        for ($i = 0; $i < 10; $i++) {
            $sum = ((int) $vatNumber[$i] + $product) % 10;

            if ($sum === 0) {
                $sum = 10;
            }

            $product = (2 * $sum) % 11;
        }

        return ($product + (int) $vatNumber[10]) % 10 === 1;
    }
}
