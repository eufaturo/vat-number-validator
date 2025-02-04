<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class RomaniaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [7, 5, 3, 2, 1, 7, 5, 3, 2];

        $vatLength = mb_strlen($vatNumber);

        $total = 0;

        $multipliers = array_slice($multipliers, 1 - $vatLength);

        for ($i = 0; $i < $vatLength - 1; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $total = (10 * $total) % 11;

        if ($total === 10) {
            $total = 0;
        }

        return (int) mb_substr($vatNumber, -1) === $total;
    }
}
