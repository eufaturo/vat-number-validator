<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class DenmarkCheckDigitValidatorTest extends TestCase
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
        yield ['DK10000009'];

        yield ['DK10000017'];

        yield ['DK10000025'];

        yield ['DK10000157'];

        yield ['DK10000033'];

        yield ['DK10000041'];

        yield ['DK10000068'];

        yield ['DK10000076'];

        yield ['DK10000084'];

        yield ['DK10000092'];

        yield ['DK10000106'];

        yield ['DK10000114'];

        yield ['DK10000122'];

        yield ['DK10000130'];

        yield ['DK10000149'];

        yield ['DK10000157'];

        yield ['DK12935110'];

        yield ['DK18424649'];

        yield ['DK18630036'];

        yield ['DK19475298'];

        yield ['DK20214414'];

        yield ['DK20342781'];

        yield ['DK21659509'];

        yield ['DK25160924'];

        yield ['DK25760352'];

        yield ['DK25763858'];

        yield ['DK26134439'];

        yield ['DK27509185'];

        yield ['DK27919502'];

        yield ['DK28323271'];

        yield ['DK28702612'];

        yield ['DK29189757'];

        yield ['DK29206600'];

        yield ['DK29283958'];

        yield ['DK30559150'];

        yield ['DK31119103'];

        yield ['DK32569943'];

        yield ['DK32780806'];

        yield ['DK33266022'];

        yield ['DK37131415'];

        yield ['DK44023911'];

        yield ['DK67758919'];

        yield ['DK71186911'];

        yield ['DK75142412'];

        yield ['DK78805218'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['DK10000000'];

        yield ['DK10000010'];

        yield ['DK10000020'];

        yield ['DK10000150'];

        yield ['DK10000030'];
    }
}
