<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class CzechRepublicCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [8, 7, 6, 5, 4, 3, 2];

        //  8 digit legal entities
        if (preg_match('/^\d{8}$/', $vatNumber) !== 0) {
            $total = 0;

            for ($i = 0; $i < 7; $i++) {
                $total += (int) $vatNumber[$i] * $multipliers[$i];
            }

            $total = 11 - $total % 11;

            if ($total === 10) {
                $total = 0;
            } elseif ($total === 11) {
                $total = 1;
            }

            return (int) $vatNumber[7] === $total;
        }

        //  9 digit individuals
        if (preg_match('/^[0-5][0-9][0|1|5|6][0-9][0-3][0-9]\d{3}$/', $vatNumber) !== 0) {
            return (int) mb_substr($vatNumber, 0, 2) <= 62;
        }

        // 9 digit individuals (Special cases)
        if (preg_match('/^6\d{8}$/', $vatNumber) !== 0) {
            $total = 0;

            for ($i = 0; $i < 7; $i++) {
                $total += (int) $vatNumber[$i + 1] * $multipliers[$i];
            }

            if ($total % 11 === 0) {
                $a = $total + 11;
            } else {
                $a = ceil($total / 11) * 11;
            }

            $pointer = $a - $total;

            $lookup = [8, 7, 6, 5, 4, 3, 2, 1, 0, 9, 8];

            return $lookup[(int) $pointer - 1] === (int) $vatNumber[8];
        }

        // 10 digit individuals
        if (preg_match('/^\d{2}[0-3|5-8][0-9][0-3][0-9]\d{4}$/', $vatNumber) !== 0) {
            $temp = (int) mb_substr($vatNumber, 0, 2)
                + (int) mb_substr($vatNumber, 2, 2)
                + (int) mb_substr($vatNumber, 4, 2)
                + (int) mb_substr($vatNumber, 5, 2)
                + (int) mb_substr($vatNumber, 6);

            return ($temp % 11 === 0) && ((int) $vatNumber % 11 === 0);
        }

        return false;
    }
}
