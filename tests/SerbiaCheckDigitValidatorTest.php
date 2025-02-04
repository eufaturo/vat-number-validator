<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SerbiaCheckDigitValidatorTest extends TestCase
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
        yield ['RS100010812'];

        yield ['RS100182160'];

        yield ['RS100262959'];

        yield ['RS101052694'];

        yield ['RS101123484'];

        yield ['RS101511068'];

        yield ['RS101626723'];

        yield ['RS101660236'];

        yield ['RS101917688'];

        yield ['RS103257368'];

        yield ['RS102898984'];

        yield ['RS104774509'];

        yield ['RS105066236'];

        yield ['RS105101011'];

        yield ['RS105795301'];

        yield ['RS105922971'];

        yield ['RS106193133'];

        yield ['RS106414286'];

        yield ['RS106963932'];

        yield ['RS107382147'];

        yield ['RS129391320'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['RS12939132'];

        yield ['RS1293913201'];

        yield ['RS129391321'];
    }
}
