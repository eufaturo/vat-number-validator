<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class GermanyCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $product = 10;

        for ($i = 0; $i < 8; $i++) {
            $sum = ((int) $vatNumber[$i] + $product) % 10;

            if ($sum === 0) {
                $sum = 10;
            }

            $product = (2 * $sum) % 11;
        }

        if ($product === 1) {
            $checkDigit = 0;
        } else {
            $checkDigit = 11 - $product;
        }

        return (int) mb_substr($vatNumber, 8, 2) === $checkDigit;
    }
}
