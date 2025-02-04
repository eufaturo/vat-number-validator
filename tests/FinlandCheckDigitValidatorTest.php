<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class FinlandCheckDigitValidatorTest extends TestCase
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
        yield ['FI09853608'];

        yield ['FI00000027'];

        yield ['FI00000035'];

        yield ['FI00000043'];

        yield ['FI00000174'];

        yield ['FI00000078'];

        yield ['FI00000086'];

        yield ['FI00000094'];

        yield ['FI00000115'];

        yield ['FI00000123'];

        yield ['FI00000131'];

        yield ['FI00000166'];

        yield ['FI00000174'];

        yield ['FI00000182'];

        yield ['FI00000203'];

        yield ['FI00000211'];

        yield ['FI00000238'];

        yield ['FI01244162'];

        yield ['FI02459042'];

        yield ['FI06312080'];

        yield ['FI08405256'];

        yield ['FI09441865'];

        yield ['FI08326937'];

        yield ['FI10154054'];

        yield ['FI10227508'];

        yield ['FI15380325'];

        yield ['FI15501019'];

        yield ['FI15482348'];

        yield ['FI15719544'];

        yield ['FI16802358'];

        yield ['FI17377883'];

        yield ['FI17405469'];

        yield ['FI17764656'];

        yield ['FI18261444'];

        yield ['FI18919760'];

        yield ['FI20303674'];

        yield ['FI21044950'];

        yield ['FI22780669'];

        yield ['FI22811357'];

        yield ['FI22283574'];

        yield ['FI22969621'];

        yield ['FI22975669'];

        yield ['FI24498085'];

        yield ['FI24710461'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['FI09853601'];

        yield ['FI00000023'];

        yield ['FI00000036'];

        yield ['FI00000048'];

        yield ['FI00000173'];

        yield ['FI00000071'];
    }
}
