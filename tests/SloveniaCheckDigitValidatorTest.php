<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SloveniaCheckDigitValidatorTest extends TestCase
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
        yield ['SI10693661'];

        yield ['SI10830316'];

        yield ['SI11427205'];

        yield ['SI14246821'];

        yield ['SI14824221'];

        yield ['SI15779092'];

        yield ['SI17659957'];

        yield ['SI23512580'];

        yield ['SI23887729'];

        yield ['SI24995975'];

        yield ['SI29664373'];

        yield ['SI31162991'];

        yield ['SI37923331'];

        yield ['SI40226743'];

        yield ['SI42780071'];

        yield ['SI44156111'];

        yield ['SI45835985'];

        yield ['SI47431857'];

        yield ['SI47640308'];

        yield ['SI47992115'];

        yield ['SI49449389'];

        yield ['SI50223054'];

        yield ['SI51049406'];

        yield ['SI51387417'];

        yield ['SI52847349'];

        yield ['SI57635773'];

        yield ['SI59038551'];

        yield ['SI63580152'];

        yield ['SI64496481'];

        yield ['SI65056345'];

        yield ['SI67593321'];

        yield ['SI68297530'];

        yield ['SI73567906'];

        yield ['SI80040306'];

        yield ['SI81716338'];

        yield ['SI81931247'];

        yield ['SI82155135'];

        yield ['SI84667044'];

        yield ['SI87916452'];

        yield ['SI91132550'];

        yield ['SI92351069'];

        yield ['SI94314527'];

        yield ['SI98511734'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['SI05936241'];
    }
}
