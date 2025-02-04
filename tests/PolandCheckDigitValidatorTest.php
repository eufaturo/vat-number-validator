<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class PolandCheckDigitValidatorTest extends TestCase
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
        yield ['PL1132191233'];

        yield ['PL1181092318'];

        yield ['PL5210088067'];

        yield ['PL5221008534'];

        yield ['PL5222349705'];

        yield ['PL5222762925'];

        yield ['PL5222897588'];

        yield ['PL5240303547'];

        yield ['PL5242718991'];

        yield ['PL5252248481'];

        yield ['PL5260006841'];

        yield ['PL5260033950'];

        yield ['PL5260204995'];

        yield ['PL5260250274'];

        yield ['PL5260300724'];

        yield ['PL5262493733'];

        yield ['PL5262816171'];

        yield ['PL5262823001'];

        yield ['PL5262823001'];

        yield ['PL5270023255'];

        yield ['PL5270009261'];

        yield ['PL5270204212'];

        yield ['PL5272525794'];

        yield ['PL5272527149'];

        yield ['PL5272548269'];

        yield ['PL5841896486'];

        yield ['PL5851408413'];

        yield ['PL5860017014'];

        yield ['PL6570006959'];

        yield ['PL6571225764'];

        yield ['PL6751330882'];

        yield ['PL6762017752'];

        yield ['PL6912393587'];

        yield ['PL6922253959'];

        yield ['PL7010009325'];

        yield ['PL7122913627'];

        yield ['PL7712761851'];

        yield ['PL7780001070'];

        yield ['PL7792048522'];

        yield ['PL8392919362'];

        yield ['PL9371000329'];

        yield ['PL9512293636'];

        yield ['PL9562180153'];

        yield ['PL9691068493'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['PL7122913628'];

        yield ['PL7122913427'];
    }
}
