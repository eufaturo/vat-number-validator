<?php

declare(strict_types=1);

namespace Eufaturo\VatNumberValidator;

use Eufaturo\VatNumberValidator\CheckDigitValidators\PortugalCheckDigitValidator;
use RuntimeException;

class VatNumberValidator
{
    private array $validators = [
        '/^(PT)(\d{9})$/' => PortugalCheckDigitValidator::class,
    ];

    public function validate(string $value): bool
    {
        if ($value !== '') {
            $originalVatNumber = $value;

            $value = preg_replace('/(\s|-|\.)+/', '', strtoupper($value));

            $validators = preg_grep('/^\/\^\(' . preg_quote(substr($value, 0, 2), '/') . '/', $this->validators);

            foreach ($validators as $scheme => $validator) {
                if (preg_match($scheme, $value, $match) !== 0) {
                    return $validator::validate($value, $originalVatNumber);
                }
            }
        }

        // todo: Add proper exception
        throw new RuntimeException("The given [{$value}] is not a valid VAT number.");
    }
}
