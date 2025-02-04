<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class RussiaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        if (mb_strlen($vatNumber) === 10) {
            $multipliers = [2, 4, 10, 3, 5, 9, 4, 6, 8, 0];

            $total = 0;

            for ($i = 0; $i < 10; $i++) {
                $total += (int) $vatNumber[$i] * $multipliers[$i];
            }

            $total = $total % 11;

            if (9 < $total) {
                $total = $total % 10;
            }

            return (int) $vatNumber[9] === $total;
        }

        if (12 === mb_strlen($vatNumber)) {
            $total1 = 0;
            $multipliers1 = [7, 2, 4, 10, 3, 5, 9, 4, 6, 8, 0];
            $total2 = 0;
            $multipliers2 = [3, 7, 2, 4, 10, 3, 5, 9, 4, 6, 8, 0];

            for ($i = 0; $i < 11; $i++) {
                $total1 += (int) $vatNumber[$i] * $multipliers1[$i];
            }

            $total1 = $total1 % 11;

            if (9 < $total1) {
                $total1 = $total1 % 10;
            }

            for ($i = 0; $i < 11; $i++) {
                $total2 += (int) $vatNumber[$i] * $multipliers2[$i];
            }

            $total2 = $total2 % 11;

            if (9 < $total2) {
                $total2 = $total2 % 10;
            }

            return (int) $vatNumber[10] === $total1 && (int) $vatNumber[11] === $total2;
        }

        return false;
    }
}
