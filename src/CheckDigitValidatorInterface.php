<?php

declare(strict_types=1);

namespace Eufaturo\VatNumberValidator;

interface CheckDigitValidatorInterface
{
    public static function validate(string $vatNumber, string $originalVatNumber): bool;
}
