<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class EstoniaCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [3, 7, 1, 3, 7, 1, 3, 7];

        $total = 0;

        for ($i = 0; $i < 8; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $total = 10 - $total % 10;

        if ($total === 10) {
            $total = 0;
        }

        return (int) $vatNumber[8] === $total;
    }
}
