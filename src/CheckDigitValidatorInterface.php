<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator;

interface CheckDigitValidatorInterface
{
    public function validate(string $vatNumber, string $originalVatNumber): bool;
}
