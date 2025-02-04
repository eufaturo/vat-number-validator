<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class LithuaniaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        if (mb_strlen($vatNumber) === 9) {
            if ($vatNumber[7] !== '1') {
                return false;
            }

            $total = 0;

            for ($i = 0; $i < 8; $i++) {
                $total += (int) $vatNumber[$i] * ($i + 1);
            }

            if ($total % 11 === 10) {
                $multipliers = [3, 4, 5, 6, 7, 8, 9, 1];

                $total = 0;

                for ($i = 0; $i < 8; $i++) {
                    $total += (int) $vatNumber[$i] * $multipliers[$i];
                }
            }

            $total = $total % 11;

            if ($total === 10) {
                $total = 0;
            }

            return (int) $vatNumber[8] === $total;
        }

        if ($vatNumber[10] !== '1') {
            return false;
        }

        $multipliers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 1, 2];

        $total = 0;

        for ($i = 0; $i < 11; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        if ($total % 11 === 10) {
            $multipliers = [3, 4, 5, 6, 7, 8, 9, 1, 2, 3, 4];

            $total = 0;

            for ($i = 0; $i < 11; $i++) {
                $total += (int) $vatNumber[$i] * $multipliers[$i];
            }
        }

        $total = $total % 11;

        if ($total === 10) {
            $total = 0;
        }

        return (int) $vatNumber[11] === $total;
    }
}
