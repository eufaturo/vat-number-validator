<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class PortugalCheckDigitValidatorTest extends TestCase
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
        yield ['PT100000010'];

        yield ['PT100000029'];

        yield ['PT100000037'];

        yield ['PT100000053'];

        yield ['PT100000061'];

        yield ['PT100000070'];

        yield ['PT100000096'];

        yield ['PT100000100'];

        yield ['PT100000118'];

        yield ['PT100000134'];

        yield ['PT100000142'];

        yield ['PT100000150'];

        yield ['PT100000177'];

        yield ['PT100000185'];

        yield ['PT100000193'];

        yield ['PT501413197'];

        yield ['PT501519246'];

        yield ['PT501570691'];

        yield ['PT502011378'];

        yield ['PT502757191'];

        yield ['PT502790610'];

        yield ['PT503079502'];

        yield ['PT503362999'];

        yield ['PT503731552'];

        yield ['PT503701378'];

        yield ['PT503729108'];

        yield ['PT504030108'];

        yield ['PT504141066'];

        yield ['PT504178873'];

        yield ['PT504194739'];

        yield ['PT505289385'];

        yield ['PT505448173'];

        yield ['PT505856468'];

        yield ['PT506429210'];

        yield ['PT506774287'];

        yield ['PT507132831'];

        yield ['PT507400011'];

        yield ['PT507599470'];

        yield ['PT507852605'];

        yield ['PT508219612'];

        yield ['PT509221785'];

        yield ['PT509280285'];

        yield ['PT509626416'];

        yield ['PT510765009'];

        yield ['PT980405319'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['PT100000012'];

        yield ['PT100000022'];

        yield ['PT100000032'];

        yield ['PT100000052'];

        yield ['PT100000192'];

        yield ['PT502757192'];

        yield ['PT000000000'];
    }
}
