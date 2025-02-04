<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class SwedenCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $R = 0;

        for ($i = 0; $i < 9; $i = $i + 2) {
            $digit = (int) $vatNumber[$i];

            $R += floor($digit / 5) + ((2 * $digit) % 10);
        }

        $S = 0;

        for ($i = 1; $i < 9; $i = $i + 2) {
            $S += (int) $vatNumber[$i];
        }

        $cd = (10 - ($R + $S) % 10) % 10;

        return (int) $vatNumber[9] === $cd;
    }
}
