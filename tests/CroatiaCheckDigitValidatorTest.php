<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class CroatiaCheckDigitValidatorTest extends TestCase
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
        yield ['HR02574432339'];

        yield ['HR06282943396'];

        yield ['HR06631807697'];

        yield ['HR08308894711'];

        yield ['HR09993794428'];

        yield ['HR12385860076'];

        yield ['HR14553560010'];

        yield ['HR16364086764'];

        yield ['HR16491034355'];

        yield ['HR17099025134'];

        yield ['HR20649144807'];

        yield ['HR20963249418'];

        yield ['HR21213412417'];

        yield ['HR22910368449'];

        yield ['HR23448731483'];

        yield ['HR24595836665'];

        yield ['HR24897777109'];

        yield ['HR25107893471'];

        yield ['HR28639480902'];

        yield ['HR28922587775'];

        yield ['HR33392005961'];

        yield ['HR39672837472'];

        yield ['HR45726041402'];

        yield ['HR46144176176'];

        yield ['HR51200725053'];

        yield ['HR61867710134'];

        yield ['HR64871724841'];

        yield ['HR69715301002'];

        yield ['HR71434725544'];

        yield ['HR81592331325'];

        yield ['HR81889785066'];

        yield ['HR82067332481'];

        yield ['HR82659251081'];

        yield ['HR85760419184'];

        yield ['HR88776522763'];

        yield ['HR89018712265'];

        yield ['HR89789819324'];

        yield ['HR91025164621'];

        yield ['HR92889721810'];

        yield ['HR93634429487'];

        yield ['HR95976200516'];

        yield ['HR96151551854'];

        yield ['HR97405527203'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['HR9363442948'];

        yield ['HR93634429488'];

        yield ['HR936344294871'];
    }
}
