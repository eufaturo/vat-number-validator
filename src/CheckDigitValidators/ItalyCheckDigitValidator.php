<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class ItalyCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [1, 2, 1, 2, 1, 2, 1, 2, 1, 2];

        $total = 0;

        if (mb_substr($vatNumber, 0, 7) === '0000000') {
            return false;
        }

        $temp = (int) mb_substr($vatNumber, 7, 3);

        if (($temp < 1) || ($temp > 201) && $temp !== 999 && $temp !== 888) {
            return false;
        }

        for ($i = 0; $i < 10; $i++) {
            $temp = (int) $vatNumber[$i] * $multipliers[$i];

            if ($temp > 9) {
                $total += floor($temp / 10) + $temp % 10;
            } else {
                $total += $temp;
            }
        }

        $total = 10 - $total % 10;

        if ($total > 9) {
            $total = 0;
        }

        return (int) $vatNumber[10] === $total;
    }
}
