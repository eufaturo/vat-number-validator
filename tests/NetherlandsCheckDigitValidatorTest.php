<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class NetherlandsCheckDigitValidatorTest extends TestCase
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
        yield ['NL010000446B01'];

        yield ['NL000000024B01'];

        yield ['NL000000036B01'];

        yield ['NL000000048B01'];

        yield ['NL000000206B01'];

        yield ['NL000000061B01'];

        yield ['NL000000073B01'];

        yield ['NL000000085B01'];

        yield ['NL000000103B01'];

        yield ['NL000000115B01'];

        yield ['NL000000127B01'];

        yield ['NL000000140B01'];

        yield ['NL000000152B01'];

        yield ['NL000000164B01'];

        yield ['NL000000188B01'];

        yield ['NL000000206B01'];

        yield ['NL001079293B01'];

        yield ['NL001368023B01'];

        yield ['NL003156709B01'];

        yield ['NL004909665B07'];

        yield ['NL005033019B01'];

        yield ['NL006292227B01'];

        yield ['NL121745417B01'];

        yield ['NL128297906B01'];

        yield ['NL147804668B01'];

        yield ['NL173389909B01'];

        yield ['NL208560129B01'];

        yield ['NL800272912B01'];

        yield ['NL805332674B01'];

        yield ['NL805969317B01'];

        yield ['NL806825790B01'];

        yield ['NL806925206B01'];

        yield ['NL809442127B01'];

        yield ['NL810195835B01'];

        yield ['NL810876334B01'];

        yield ['NL813195779B01'];

        yield ['NL814170511B01'];

        yield ['NL815216002B01'];

        yield ['NL815498093B01'];

        yield ['NL818152011B01'];

        yield ['NL818793120B01'];

        yield ['NL818937841B01'];

        yield ['NL822502975B01'];

        yield ['NL822667800B01'];

        yield ['NL822754812B01'];

        yield ['NL823363247B01'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['NL010000445B01'];

        yield ['NL000000025B01'];

        yield ['NL000000035B01'];

        yield ['NL000000045B01'];

        yield ['NL000000205B01'];
    }
}
