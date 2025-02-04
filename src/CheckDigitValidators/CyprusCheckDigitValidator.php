<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class CyprusCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        if (mb_substr($vatNumber, 0, 2) === '12') {
            return false;
        }

        $total = 0;

        for ($i = 0; $i < 8; $i++) {
            $temp = (int) $vatNumber[$i];

            if (0 === $i % 2) {
                if (0 === $temp) {
                    $temp = 1;
                } elseif (1 === $temp) {
                    $temp = 0;
                } elseif (2 === $temp) {
                    $temp = 5;
                } elseif (3 === $temp) {
                    $temp = 7;
                } elseif (4 === $temp) {
                    $temp = 9;
                } else {
                    $temp = 2 * $temp + 3;
                }
            }

            $total += $temp;
        }

        $total = $total % 26;
        $total = chr($total + 65);

        return $vatNumber[8] === $total;
    }
}
