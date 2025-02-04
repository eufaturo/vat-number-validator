<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class CzechRepublicCheckDigitValidatorTest extends TestCase
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
        yield ['CZ00008702'];

        yield ['CZ00216224'];

        yield ['CZ00216305'];

        yield ['CZ00222534'];

        yield ['CZ14503603'];

        yield ['CZ15528561'];

        yield ['CZ22760954'];

        yield ['CZ25093282'];

        yield ['CZ25130382'];

        yield ['CZ25145444'];

        yield ['CZ25216791'];

        yield ['CZ25494538'];

        yield ['CZ25666011'];

        yield ['CZ25745271'];

        yield ['CZ26149206'];

        yield ['CZ26199696'];

        yield ['CZ26539446'];

        yield ['CZ27607461'];

        yield ['CZ27082440'];

        yield ['CZ27261417'];

        yield ['CZ27456927'];

        yield ['CZ27969118'];

        yield ['CZ28020715'];

        yield ['CZ24170593'];

        yield ['CZ27422534'];

        yield ['CZ29000335'];

        yield ['CZ29015243'];

        yield ['CZ44012373'];

        yield ['CZ44797699'];

        yield ['CZ45786259'];

        yield ['CZ46884513'];

        yield ['CZ47676795'];

        yield ['CZ47902442'];

        yield ['CZ49287371'];

        yield ['CZ49678329'];

        yield ['CZ49969820'];

        yield ['CZ60193336'];

        yield ['CZ61459640'];

        yield ['CZ61672530'];

        yield ['CZ62024922'];

        yield ['CZ63079453'];

        yield ['CZ63991705'];

        yield ['CZ64946274'];

        yield ['CZ67985882'];

        yield ['CZ70904901'];

        yield ['CZ680447748'];

        yield ['CZ699001236'];

        yield ['CZ699001510'];

        yield ['CZ699002447'];

        yield ['CZ395601439'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['CZ699001237'];
    }
}
