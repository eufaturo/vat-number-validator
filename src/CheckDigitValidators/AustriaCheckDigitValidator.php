<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class AustriaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $vatNumberSplit = mb_str_split($vatNumber);

        $multipliers = [1, 2, 1, 2, 1, 2, 1];

        $total = 0;

        for ($i = 0; $i < 7; $i++) {
            $temp = (int) $vatNumberSplit[$i] * $multipliers[$i];

            $total += $temp > 9 ? floor($temp / 10) + $temp % 10 : $temp;
        }

        $total = 10 - ($total + 4) % 10;

        if ($total === 10) {
            $total = 0;
        }

        return (int) $vatNumberSplit[7] === $total;
    }
}
