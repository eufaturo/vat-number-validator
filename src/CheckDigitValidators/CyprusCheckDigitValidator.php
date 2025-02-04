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

            if ($i % 2 === 0) {
                if ($temp === 0) {
                    $temp = 1;
                } elseif ($temp === 1) {
                    $temp = 0;
                } elseif ($temp === 2) {
                    $temp = 5;
                } elseif ($temp === 3) {
                    $temp = 7;
                } elseif ($temp === 4) {
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
