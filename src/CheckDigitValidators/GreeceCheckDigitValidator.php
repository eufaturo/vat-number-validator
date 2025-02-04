<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class GreeceCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [256, 128, 64, 32, 16, 8, 4, 2];

        $total = 0;

        if (mb_strlen($vatNumber) === 8) {
            $vatNumber = '0'.$vatNumber;
        }

        for ($i = 0; $i < 8; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $total = $total % 11;

        if ($total > 9) {
            $total = 0;
        }

        return (int) $vatNumber[8] === $total;
    }
}
