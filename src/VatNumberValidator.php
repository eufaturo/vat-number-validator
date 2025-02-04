<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator;

class VatNumberValidator
{
    /**
     * @var array|class-string[]
     */
    private array $validators = [
        '/^(AT)U(\d{8})$/'                    => CheckDigitValidators\AustriaCheckDigitValidator::class,
        '/^(BE)(0?\d{9})$/'                   => CheckDigitValidators\BelgiumCheckDigitValidator::class,
        '/^(BG)(\d{9,10})$/'                  => CheckDigitValidators\BulgariaCheckDigitValidator::class,
        '/^(CHE)(\d{9})(MWST|TVA|IVA)?$/'     => CheckDigitValidators\SwitzerlandCheckDigitValidator::class,
        '/^(CY)([0-59]\d{7}[A-Z])$/'          => CheckDigitValidators\CyprusCheckDigitValidator::class,
        '/^(CZ)(\d{8,10})(\d{3})?$/'          => CheckDigitValidators\CzechRepublicCheckDigitValidator::class,
        '/^(DE)([1-9]\d{8})$/'                => CheckDigitValidators\GermanyCheckDigitValidator::class,
        '/^(DK)(\d{8})$/'                     => CheckDigitValidators\DenmarkCheckDigitValidator::class,
        '/^(EE)(10\d{7})$/'                   => CheckDigitValidators\EstoniaCheckDigitValidator::class,
        '/^(EL)(\d{9})$/'                     => CheckDigitValidators\GreeceCheckDigitValidator::class,
        '/^(ES)([A-Z]\d{8})$/'                => CheckDigitValidators\SpainCheckDigitValidator::class,
        '/^(ES)([A-HN-SW]\d{7}[A-J])$/'       => CheckDigitValidators\SpainCheckDigitValidator::class,
        '/^(ES)([0-9YZ]\d{7}[A-Z])$/'         => CheckDigitValidators\SpainCheckDigitValidator::class,
        '/^(ES)([KLMX]\d{7}[A-Z])$/'          => CheckDigitValidators\SpainCheckDigitValidator::class,
        '/^(FI)(\d{8})$/'                     => CheckDigitValidators\FinlandCheckDigitValidator::class,
        '/^(FR)(\d{11})$/'                    => CheckDigitValidators\FranceCheckDigitValidator::class,
        '/^(FR)([A-HJ-NP-Z]\d{10})$/'         => CheckDigitValidators\FranceCheckDigitValidator::class,
        '/^(FR)(\d[A-HJ-NP-Z]\d{9})$/'        => CheckDigitValidators\FranceCheckDigitValidator::class,
        '/^(FR)([A-HJ-NP-Z]{2}\d{9})$/'       => CheckDigitValidators\FranceCheckDigitValidator::class,
        '/^(GB)(\d{9})$/'                     => CheckDigitValidators\UkCheckDigitValidator::class,
        '/^(GB)(\d{12})$/'                    => CheckDigitValidators\UkCheckDigitValidator::class,
        '/^(GB)(GD\d{3})$/'                   => CheckDigitValidators\UkCheckDigitValidator::class,
        '/^(GB)(HA\d{3})$/'                   => CheckDigitValidators\UkCheckDigitValidator::class,
        '/^(HR)(\d{11})$/'                    => CheckDigitValidators\CroatiaCheckDigitValidator::class,
        '/^(HU)(\d{8})$/'                     => CheckDigitValidators\HungaryCheckDigitValidator::class,
        '/^(IE)(\d{7}[A-W])$/'                => CheckDigitValidators\IrelandCheckDigitValidator::class,
        '/^(IE)([7-9][A-Z\*\+)]\d{5}[A-W])$/' => CheckDigitValidators\IrelandCheckDigitValidator::class,
        '/^(IE)(\d{7}[A-W][AH])$/'            => CheckDigitValidators\IrelandCheckDigitValidator::class,
        '/^(IT)(\d{11})$/'                    => CheckDigitValidators\ItalyCheckDigitValidator::class,
        '/^(LT)(\d{9}|\d{12})$/'              => CheckDigitValidators\LithuaniaCheckDigitValidator::class,
        '/^(LV)(\d{11})$/'                    => CheckDigitValidators\LatviaCheckDigitValidator::class,
        '/^(LU)(\d{8})$/'                     => CheckDigitValidators\LuxembourgCheckDigitValidator::class,
        '/^(MT)([1-9]\d{7})$/'                => CheckDigitValidators\MaltaCheckDigitValidator::class,
        '/^(NL)(\d{9})B\d{2}$/'               => CheckDigitValidators\NetherlandsCheckDigitValidator::class,
        '/^(NO)(\d{9})$/'                     => CheckDigitValidators\NorwayCheckDigitValidator::class,
        '/^(PL)(\d{10})$/'                    => CheckDigitValidators\PolandCheckDigitValidator::class,
        '/^(PT)(\d{9})$/'                     => CheckDigitValidators\PortugalCheckDigitValidator::class,
        '/^(RO)([1-9]\d{1,9})$/'              => CheckDigitValidators\RomaniaCheckDigitValidator::class,
        '/^(RS)(\d{9})$/'                     => CheckDigitValidators\SerbiaCheckDigitValidator::class,
        '/^(RU)(\d{10}|\d{12})$/'             => CheckDigitValidators\RussiaCheckDigitValidator::class,
        '/^(SE)(\d{10}01)$/'                  => CheckDigitValidators\SwedenCheckDigitValidator::class,
        '/^(SI)([1-9]\d{7})$/'                => CheckDigitValidators\SloveniaCheckDigitValidator::class,
        '/^(SK)([1-9]\d[2346-9]\d{7})$/'      => CheckDigitValidators\SlovakiaCheckDigitValidator::class,
    ];

    public function validate(string $vatNumber): bool
    {
        $vatNumber = (string) preg_replace('/(\s|-|\.)+/', '', mb_strtoupper($vatNumber));

        if ($vatNumber !== '') {
            $originalVatNumber = $vatNumber;

            $country = preg_quote(mb_substr($vatNumber, 0, 2), '/');

            /** @var array<int, string> $filteredValidators */
            $filteredValidators = preg_grep("/^\/\^\({$country}/", array_keys($this->validators));

            if ($filteredValidators !== []) {
                foreach ($filteredValidators as $validatorRegex) {
                    if (preg_match($validatorRegex, $vatNumber, $match) !== 0) {
                        /** @var CheckDigitValidatorInterface $validator */
                        $validator = new $this->validators[$validatorRegex]();

                        return $validator->validate(
                            vatNumber: $match[2],
                            originalVatNumber: $originalVatNumber,
                        );
                    }
                }
            }
        }

        return false;
    }
}
