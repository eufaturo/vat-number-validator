<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class LuxembourgCheckDigitValidatorTest extends TestCase
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
        yield ['LU00000000'];

        yield ['LU10000356'];

        yield ['LU00000202'];

        yield ['LU00000303'];

        yield ['LU00000404'];

        yield ['LU00002020'];

        yield ['LU00000606'];

        yield ['LU00000707'];

        yield ['LU00000808'];

        yield ['LU00001010'];

        yield ['LU00001111'];

        yield ['LU00001212'];

        yield ['LU00001414'];

        yield ['LU00001515'];

        yield ['LU00001616'];

        yield ['LU00001818'];

        yield ['LU00001919'];

        yield ['LU00002020'];

        yield ['LU10294056'];

        yield ['LU11082217'];

        yield ['LU11238870'];

        yield ['LU11787741'];

        yield ['LU15027442'];

        yield ['LU15477706'];

        yield ['LU16018776'];

        yield ['LU16999000'];

        yield ['LU17389679'];

        yield ['LU17439746'];

        yield ['LU17466042'];

        yield ['LU17596310'];

        yield ['LU18743400'];

        yield ['LU18878516'];

        yield ['LU19009176'];

        yield ['LU19209331'];

        yield ['LU20165772'];

        yield ['LU20260743'];

        yield ['LU20417913'];

        yield ['LU21114032'];

        yield ['LU22326250'];

        yield ['LU22944200'];

        yield ['LU23238809'];

        yield ['LU23537155'];

        yield ['LU24184936'];

        yield ['LU24496840'];

        yield ['LU25318872'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['LU10000350'];

        yield ['LU00000200'];

        yield ['LU00000300'];

        yield ['LU00000400'];

        yield ['LU00002021'];

        yield ['LU00000600'];

        yield ['LU00000700'];

        yield ['LU00000800'];
    }
}
