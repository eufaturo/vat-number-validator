<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class EstoniaCheckDigitValidatorTest extends TestCase
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
        yield ['EE100007796'];

        yield ['EE100014404'];

        yield ['EE100037342'];

        yield ['EE100050879'];

        yield ['EE100050989'];

        yield ['EE100054752'];

        yield ['EE100067066'];

        yield ['EE100183238'];

        yield ['EE100196403'];

        yield ['EE100207415'];

        yield ['EE100210457'];

        yield ['EE100229859'];

        yield ['EE100235791'];

        yield ['EE100338245'];

        yield ['EE100396999'];

        yield ['EE100402498'];

        yield ['EE100434084'];

        yield ['EE100461536'];

        yield ['EE100619906'];

        yield ['EE100645682'];

        yield ['EE100660230'];

        yield ['EE100672736'];

        yield ['EE100691542'];

        yield ['EE100692266'];

        yield ['EE100069349'];

        yield ['EE100715473'];

        yield ['EE100721878'];

        yield ['EE100818723'];

        yield ['EE100900754'];

        yield ['EE100945641'];

        yield ['EE101007643'];

        yield ['EE101039763'];

        yield ['EE101193861'];

        yield ['EE101246514'];

        yield ['EE101246938'];

        yield ['EE101259750'];

        yield ['EE101261706'];

        yield ['EE101274434'];

        yield ['EE101282772'];

        yield ['EE101321015'];

        yield ['EE101331966'];

        yield ['EE101344209'];

        yield ['EE101367804'];

        yield ['EE101378466'];

        yield ['EE101482239'];

        yield ['EE101560290'];

        yield ['EE101589064'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['EE000207418'];

        yield ['EE110207418'];
    }
}
