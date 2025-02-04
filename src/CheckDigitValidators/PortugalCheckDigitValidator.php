<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class PortugalCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $vatNumberSplit = mb_str_split($vatNumber);

        $multipliers = [1, 2, 3, 5, 6, 7, 8, 9];

        if (in_array((int) $vatNumberSplit[0], $multipliers, true)) {
            $total = 0;

            for ($i = 0; $i < 8; $i++) {
                $total += (int) $vatNumberSplit[$i] * (10 - $i - 1);
            }

            $total = 11 - ($total % 11);

            $total = $total >= 10 ? 0 : $total;

            return (int) $vatNumberSplit[8] === $total;
        }

        return false;
    }
}
