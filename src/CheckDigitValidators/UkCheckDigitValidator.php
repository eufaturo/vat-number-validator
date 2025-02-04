<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\CheckDigitValidators;

use Eufaturo\VatNumberValidator\CheckDigitValidatorInterface;

final class UkCheckDigitValidator implements CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool
    {
        $multipliers = [8, 7, 6, 5, 4, 3, 2];

        if (mb_substr($vatNumber, 0, 2) === 'GD') {
            return (int) mb_substr($vatNumber, 2, 5) < 500;
        }

        if (mb_substr($vatNumber, 0, 2) === 'HA') {
            return (int) mb_substr($vatNumber, 2, 5) > 400;
        }

        $total = 0;

        if ((int) $vatNumber === 0) {
            return false;
        }

        $no = (int) mb_substr($vatNumber, 0, 7);

        for ($i = 0; $i < 7; $i++) {
            $total += (int) $vatNumber[$i] * $multipliers[$i];
        }

        $cd = $total;

        while ($cd > 0) {
            $cd = $cd - 97;
        }

        $cd = abs($cd);

        if ((int) mb_substr($vatNumber, 7, 2) === $cd
            && $no < 9990001
            && ($no < 100000 || $no > 999999)
            && ($no < 9490001 || $no > 9700000)
        ) {
            return true;
        }

        if ($cd >= 55) {
            $cd = $cd - 55;
        } else {
            $cd = $cd + 42;
        }

        return (int) mb_substr($vatNumber, 7, 2) === $cd && $no > 1000000;
    }
}
