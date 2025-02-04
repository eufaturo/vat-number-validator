<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class LatviaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        if (preg_match('/^[0-3]/', $vatNumber) !== 0) {
            return preg_match('/^[0-3][0-9][0-1][0-9]/', $vatNumber) !== 0;
        }

        $multipliers = [9, 1, 4, 8, 3, 10, 2, 5, 7, 6];

        $total = 0;

        for ($i = 0; $i < 10; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        if ($total % 11 === 4 && $vatNumber[0] === '9') {
            $total = $total - 45;
        }

        if ($total % 11 === 4) {
            $total = 4 - $total % 11;
        } elseif (4 > $total % 11) {
            $total = 3 - $total % 11;
        } elseif (4 < $total % 11) {
            $total = 14 - $total % 11;
        }

        return (int) $vatNumber[10] === $total;
    }
}
