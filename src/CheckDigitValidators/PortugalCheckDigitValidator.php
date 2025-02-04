<?php

declare(strict_types=1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class PortugalCheckDigitValidator implements CheckDigitValidatorInterface
{
    public static function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $total = 0;

        $multipliers = [9, 8, 7, 6, 5, 4, 3, 2];

        for ($i = 0; $i < 8; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $total = 11 - $total % 11;

        if ($total < 9) {
            $total = 0;
        }

        return (int) $vatNumber[8] === $total;
    }
}
