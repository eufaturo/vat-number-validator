<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class RomaniaCheckDigitValidatorTest extends TestCase
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
        yield ['RO11198699'];

        yield ['RO99908'];

        yield ['RO19'];

        yield ['RO124'];

        yield ['RO1235'];

        yield ['RO12340'];

        yield ['RO123453'];

        yield ['RO1234565'];

        yield ['RO123456789'];

        yield ['RO16252454'];

        yield ['RO13182060'];

        yield ['RO1634820'];

        yield ['RO6088916'];

        yield ['RO8887308'];

        yield ['RO6528510'];

        yield ['RO12532133'];

        yield ['RO5903310'];

        yield ['RO13269826'];

        yield ['RO16795469'];

        yield ['RO8440074'];

        yield ['RO3106872'];

        yield ['RO16914128'];

        yield ['RO10871486'];

        yield ['RO6484554'];

        yield ['RO11303530'];

        yield ['RO3162813'];

        yield ['RO15049908'];

        yield ['RO10656216'];

        yield ['RO15056387'];

        yield ['RO2240182'];

        yield ['RO11134288'];

        yield ['RO12622899'];

        yield ['RO4985052'];

        yield ['RO10310742'];

        yield ['RO7206955'];

        yield ['RO12059648'];

        yield ['RO12278648'];

        yield ['RO9452492'];

        yield ['RO8921825'];

        yield ['RO5217028'];

        yield ['RO15032108'];

        yield ['RO6814946'];

        yield ['RO10489304'];

        yield ['RO9992239'];

        yield ['RO15315570'];

        yield ['RO13663790'];

        yield ['RO14749539'];

        yield ['RO16740366'];

        yield ['RO16334236'];

        yield ['RO4626652'];

        yield ['RO15545880'];

        yield ['RO11552248'];

        yield ['RO16076897'];

        yield ['RO7838048'];

        yield ['RO2253999'];

        yield ['RO6727475'];

        yield ['RO4594917'];

        yield ['RO13499400'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['RO11198698'];

        yield ['RO99907'];

        yield ['RO18'];

        yield ['RO125'];

        yield ['RO1238'];

        yield ['RO12349'];

        yield ['RO123451'];

        yield ['RO1234564'];

        yield ['RO123456780'];

        yield ['RO099908'];

        yield ['RO0099908'];

        yield ['RO00099908'];

        yield ['RO000099908'];

        yield ['RO0000099908'];
    }
}
