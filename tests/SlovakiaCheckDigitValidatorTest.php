<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SlovakiaCheckDigitValidatorTest extends TestCase
{
    #[Test]
    #[TestDox('It will verify that the vat number is valid')]
    #[DataProvider('provideValidVatNumbers')]
    public function test_1(string $vatNumber): void
    {
        $this->assertTrue((new VatNumberValidator())->validate($vatNumber));
    }

    #[Test]
    #[TestDox('It will verify that the vat number is invalid')]
    #[DataProvider('provideInvalidVatNumbers')]
    public function test_2(string $vatNumber): void
    {
        $this->assertFalse((new VatNumberValidator())->validate($vatNumber));
    }

    public static function provideValidVatNumbers(): Generator
    {
        yield ['SK1025529197'];

        yield ['SK2020032377'];

        yield ['SK2020073528'];

        yield ['SK2020077345'];

        yield ['SK2020255787'];

        yield ['SK2020261353'];

        yield ['SK2020264939'];

        yield ['SK2020273893'];

        yield ['SK2020278766'];

        yield ['SK2020317244'];

        yield ['SK2020325109'];

        yield ['SK2020325516'];

        yield ['SK2020329278'];

        yield ['SK2020350332'];

        yield ['SK2020351993'];

        yield ['SK2020358263'];

        yield ['SK2020431710'];

        yield ['SK2020527300'];

        yield ['SK2020798637'];

        yield ['SK2020845255'];

        yield ['SK2020845332'];

        yield ['SK2021116889'];

        yield ['SK2021252827'];

        yield ['SK2021776207'];

        yield ['SK2021783357'];

        yield ['SK2021853504'];

        yield ['SK2021885888'];

        yield ['SK2021900804'];

        yield ['SK2021905776'];

        yield ['SK2021947180'];

        yield ['SK2022199432'];

        yield ['SK2022229374'];

        yield ['SK2022441168'];

        yield ['SK2022569791'];

        yield ['SK2022579152'];

        yield ['SK2022832394'];

        yield ['SK2023150701'];

        yield ['SK2023369381'];

        yield ['SK2023386805'];

        yield ['SK2022742458'];

        yield ['SK7020000119'];

        yield ['SK7020000207'];

        yield ['SK7020000317'];

        yield ['SK7020000427'];

        yield ['SK7020000680'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['SK5407062531'];

        yield ['SK7020001680'];
    }
}
