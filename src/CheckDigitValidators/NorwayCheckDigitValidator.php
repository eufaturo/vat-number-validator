<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class NorwayCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [3, 2, 7, 6, 5, 4, 3, 2];

        $total = 0;

        for ($i = 0; $i < 8; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $total = 11 - $total % 11;

        if ($total === 11) {
            $total = 0;
        }

        return (int) $vatNumber[8] === $total;
    }
}
