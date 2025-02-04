<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class SpainCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [2, 1, 2, 1, 2, 1, 2];

        $total = 0;

        // National juridical entities
        if (preg_match('/^[A-H|J|U|V]\d{8}$/', $vatNumber) !== 0) {
            // Extract the next digit and multiply by the counter.
            for ($i = 0; $i < 7; $i++) {
                $temp = (int) $vatNumber[$i + 1] * $multipliers[$i];

                if (9 < $temp) {
                    $total += floor($temp / 10) + $temp % 10;
                } else {
                    $total += $temp;
                }
            }

            // Now calculate the check digit itself.
            $total = 10 - $total % 10;

            if ($total === 10) {
                $total = 0;
            }

            // Compare it with the last character of the VAT number. If it's the same, then it's valid.
            return (int) $vatNumber[8] === $total;
        }

        // Juridical entities other than national ones
        if (preg_match('/^[A-H|N-S|W]\d{7}[A-J]$/', $vatNumber) !== 0) {
            // Extract the next digit and multiply by the counter.
            for ($i = 0; $i < 7; $i++) {
                $temp = (int) $vatNumber[$i + 1] * $multipliers[$i];

                if (9 < $temp) {
                    $total += floor($temp / 10) + $temp % 10;
                } else {
                    $total += $temp;
                }
            }

            // Now calculate the check digit itself.
            $total = 10 - $total % 10;
            $total = chr($total + 64);

            // Compare it with the last character of the VAT number. If it's the same, then it's valid.
            return $total === $vatNumber[8];
        }

        // Personal number (NIF) (starting with numeric of Y or Z)
        if (preg_match('/^[0-9|Y|Z]\d{7}[A-Z]$/', $vatNumber) !== 0) {
            $tempNumber = $vatNumber;

            if ('Y' === $tempNumber[0]) {
                $tempNumber = str_replace('Y', '1', $tempNumber);
            } elseif ('Z' === $tempNumber[0]) {
                $tempNumber = str_replace('Z', '2', $tempNumber);
            }

            $charString = 'TRWAGMYFPDXBNJZSQVHLCKE';

            return $tempNumber[8] === $charString[(int) mb_substr($tempNumber, 0, 8) % 23];
        }

        // Personal number (NIF) (starting with K, L, M, or X)
        if (preg_match('/^[K|L|M|X]\d{7}[A-Z]$/', $vatNumber) !== 0) {
            $charString = 'TRWAGMYFPDXBNJZSQVHLCKE';

            return $vatNumber[8] === $charString[(int) mb_substr($vatNumber, 1, 7) % 23];
        }

        return false;
    }
}
