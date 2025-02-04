<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class NetherlandsCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [9, 8, 7, 6, 5, 4, 3, 2];

        $total = 0;

        for ($i = 0; $i < 8; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $total = $total % 11;

        if (9 < $total) {
            $total = 0;
        }

        if ((int) $vatNumber[8] === $total) {
            return true;
        }

        $numericvat = '';

        $partLength = 7;

        $divisor = 97;

        for ($i = 0; $i < mb_strlen($originalVatNumber); $i++) {
            $nextchar = ord(mb_substr($originalVatNumber, $i, $i + 1));

            if ($nextchar > 41 && $nextchar < 44) {
                $nextchar = $nextchar - 6;
            } elseif ($nextchar > 47 && $nextchar < 58) {
                $nextchar = $nextchar - 48;
            } elseif ($nextchar > 64 && $nextchar < 91) {
                $nextchar = $nextchar - 55;
            }

            $numericvat = $numericvat.$nextchar;
        }

        while (mb_strlen($numericvat) > $partLength) {
            $part = mb_substr($numericvat, 0, $partLength);

            $numericvat = ($part % $divisor).mb_substr($numericvat, $partLength);
        }

        return ($numericvat % $divisor) === 1;
    }
}
