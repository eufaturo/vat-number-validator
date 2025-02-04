<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class HungaryCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [9, 7, 3, 1, 9, 7, 3];

        $total = 0;

        for ($i = 0; $i < 7; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $total = 10 - ($total % 10);

        if ($total === 10) {
            $total = 0;
        }

        return (int) $vatNumber[7] === $total;
    }
}
