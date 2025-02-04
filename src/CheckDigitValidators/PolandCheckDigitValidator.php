<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class PolandCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [6, 5, 7, 2, 3, 4, 5, 6, 7];

        $total = 0;

        for ($i = 0; $i < 9; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $total = $total % 11;

        if (9 < $total) {
            $total = 0;
        }

        return (int) $vatNumber[9] === $total;
    }
}
