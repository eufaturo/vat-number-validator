<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class MaltaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [3, 4, 6, 7, 8, 9];

        $total = 0;

        for ($i = 0; $i < 6; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $total = 37 - $total % 37;

        return (int) mb_substr($vatNumber, 6, 2) === $total;
    }
}
