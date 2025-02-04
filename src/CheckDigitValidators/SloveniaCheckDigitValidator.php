<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class SloveniaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [8, 7, 6, 5, 4, 3, 2];

        $total = 0;

        for ($i = 0; $i < 7; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $total = 11 - $total % 11;

        if ($total === 10) {
            $total = 0;
        }

        return 11 !== $total && (int) $vatNumber[7] === $total;
    }
}
