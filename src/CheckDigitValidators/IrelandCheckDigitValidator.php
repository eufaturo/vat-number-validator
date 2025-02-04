<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class IrelandCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [8, 7, 6, 5, 4, 3, 2];

        $total = 0;

        if (preg_match('/^\d[A-Z\*\+]/', $vatNumber) !== 0) {
            $vatNumber = '0'.mb_substr($vatNumber, 2, 5).mb_substr($vatNumber, 0, 1).mb_substr($vatNumber, 7, 1);
        }

        for ($i = 0; $i < 7; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        if (preg_match('/^\d{7}[A-Z][AH]$/', $vatNumber) !== 0) {
            if ($vatNumber[8] === 'H') {
                $total += 72;
            } else {
                $total += 9;
            }
        }

        $total = $total % 23;

        if ($total === 0) {
            $total = 'W';
        } else {
            $total = chr($total + 64);
        }

        return $vatNumber[7] === $total;
    }
}
