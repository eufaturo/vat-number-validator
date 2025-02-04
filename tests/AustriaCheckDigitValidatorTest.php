<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class AustriaCheckDigitValidatorTest extends TestCase
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
        yield ['ATU00000024'];

        yield ['ATU00000033'];

        yield ['ATU00000042'];

        yield ['ATU00000060'];

        yield ['ATU00000079'];

        yield ['ATU00000088'];

        yield ['ATU00000104'];

        yield ['ATU00000113'];

        yield ['ATU00000122'];

        yield ['ATU00000140'];

        yield ['ATU00000159'];

        yield ['ATU00000168'];

        yield ['ATU00000186'];

        yield ['ATU00000195'];

        yield ['ATU00000202'];

        yield ['ATU12011204'];

        yield ['ATU10223006'];

        yield ['ATU15110001'];

        yield ['ATU15394605'];

        yield ['ATU15416707'];

        yield ['ATU15662209'];

        yield ['ATU16370905'];

        yield ['ATU23224909'];

        yield ['ATU25775505'];

        yield ['ATU28560205'];

        yield ['ATU28609707'];

        yield ['ATU28617100'];

        yield ['ATU29288909'];

        yield ['ATU37675002'];

        yield ['ATU37785508'];

        yield ['ATU37830200'];

        yield ['ATU38420507'];

        yield ['ATU38516405'];

        yield ['ATU39364503'];

        yield ['ATU42527002'];

        yield ['ATU43666001'];

        yield ['ATU43716207'];

        yield ['ATU45766309'];

        yield ['ATU47977701'];

        yield ['ATU49487700'];

        yield ['ATU51009402'];

        yield ['ATU51507409'];

        yield ['ATU51749808'];

        yield ['ATU52699307'];

        yield ['ATU57477929'];

        yield ['ATU58044146'];

        yield ['ATU61255233'];

        yield ['ATU61993034'];

        yield ['ATU62134737'];

        yield ['ATU62593358'];

        yield ['ATU62765626'];

        yield ['ATU62895905'];

        yield ['ATU62927729'];

        yield ['ATU63436026'];

        yield ['ATU64487479'];

        yield ['ATU64762368'];

        yield ['ATU64727905'];

        yield ['ATU64938189'];

        yield ['ATU66664013'];

        yield ['ATU66889218'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['ATU10223001'];

        yield ['ATU10223002'];

        yield ['ATU10223003'];

        yield ['ATU10223004'];

        yield ['ATU10223005'];

        yield ['ATU10223007'];
    }
}
