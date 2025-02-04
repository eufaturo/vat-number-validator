<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class BulgariaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        if (mb_strlen($vatNumber) === 9) {
            $temp = 0;

            for ($i = 0; $i < 8; $i++) {
                $temp += (int) $vatNumber[$i] * ($i + 1);
            }

            $total = $temp % 11;

            if ($total !== 10) {
                return $total === (int) mb_substr($vatNumber, 8);
            }

            // We got a modulus of 10 before so we have to keep going. Calculate
            // the new check digit using the different multipliers
            $temp = 0;

            for ($i = 0; $i < 8; $i++) {
                $temp += (int) $vatNumber[$i] * ($i + 3);
            }

            // See if we have a check digit yet. If we still have a modulus of
            // 10, set it to 0.
            $total = $temp % 11;

            $total = $total === 10 ? 0 : $total;

            return $total === (int) mb_substr($vatNumber, 8);
        }

        if (preg_match('/^\d\d[0-5]\d[0-3]\d\d{4}$/', $vatNumber) !== 0) {
            // Check month
            $month = (int) mb_substr($vatNumber, 2, 2);

            if (($month > 0 && $month < 13)
                || ($month > 20 && $month < 33)
                || ($month > 40 && $month < 53)
            ) {
                // Extract the next digit and multiply by the counter.
                $multipliers = [2, 4, 8, 5, 10, 9, 7, 3, 6];

                $total = 0;

                for ($i = 0; $i < 9; $i++) {
                    $total += (int) $vatNumber[$i] * $multipliers[$i];
                }

                // Establish check digit.
                $total = $total % 11;

                $total = $total === 10 ? 0 : $total;

                // Check to see if the check digit given is correct,
                // If not, try next type of person
                if ((int) $vatNumber[9] === $total) {
                    return true;
                }
            }
        }

        // It doesn't relate to a standard physical person - see if it relates
        // to a foreigner.
        // Extract the next digit and multiply by the counter.
        $multipliers = [21, 19, 17, 13, 11, 9, 7, 3, 1];

        $total = 0;

        for ($i = 0; $i < 9; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        // Check to see if the check digit given is correct, If not, try next
        // type of person
        if ((int) $vatNumber[9] === $total % 10) {
            return true;
        }

        // Finally, if not yet identified, see if it conforms to a miscellaneous
        // VAT number
        // Extract the next digit and multiply by the counter.
        $multipliers = [4, 3, 2, 7, 6, 5, 4, 3, 2];

        $total = 0;

        for ($i = 0; $i < 9; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        // Establish check digit.
        $total = 11 - $total % 11;

        if ($total === 10) {
            return false;
        }

        $total = $total === 11 ? 0 : $total;

        // Check to see if the check digit given is correct, If not, we have
        // an error with the VAT number
        return (int) $vatNumber[9] === $total;
    }
}
