<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class BulgariaCheckDigitValidatorTest extends TestCase
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
        yield ['BG0000100153'];

        yield ['BG0000100159'];

        yield ['BG000670680'];

        yield ['BG0041010002'];

        yield ['BG0432270001'];

        yield ['BG040683212'];

        yield ['BG101004508'];

        yield ['BG103041626'];

        yield ['BG103704427'];

        yield ['BG103873594'];

        yield ['BG103873594'];

        yield ['BG104049218'];

        yield ['BG111004501'];

        yield ['BG123115379'];

        yield ['BG117546706'];

        yield ['BG121393209'];

        yield ['BG121745404'];

        yield ['BG121846702'];

        yield ['BG1234567893'];

        yield ['BG127595406'];

        yield ['BG130389149'];

        yield ['BG130500368'];

        yield ['BG130544891'];

        yield ['BG131071587'];

        yield ['BG131134023'];

        yield ['BG131142625'];

        yield ['BG131202360'];

        yield ['BG131272009'];

        yield ['BG131394206'];

        yield ['BG131406904'];

        yield ['BG131570565'];

        yield ['BG160084694'];

        yield ['BG160135231'];

        yield ['BG175074752'];

        yield ['BG175163651'];

        yield ['BG175281594'];

        yield ['BG175352176'];

        yield ['BG175379202'];

        yield ['BG200174309'];

        yield ['BG200313292'];

        yield ['BG200717477'];

        yield ['BG200893288'];

        yield ['BG200950556'];

        yield ['BG200964147'];

        yield ['BG201071853'];

        yield ['BG201219134'];

        yield ['BG201543613'];

        yield ['BG201809971'];

        yield ['BG202376409'];

        yield ['BG825312229'];

        yield ['BG831144533'];

        yield ['BG837107196'];

        yield ['BG9902280002'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['BG101004509'];

        yield ['BG101004507'];

        yield ['BG111004500'];

        yield ['BG111004502'];

        yield ['BG9902280001'];

        yield ['BG9902280004'];

        yield ['BG0433170001'];

        yield ['BG0433170002'];

        yield ['BG0433170003'];

        yield ['BG0433170004'];

        yield ['BG0433170005'];

        yield ['BG0433170006'];

        yield ['BG0433170007'];

        yield ['BG0433170009'];

        yield ['BG0413270001'];

        yield ['BG0413270002'];

        yield ['BG0413270003'];

        yield ['BG0413270004'];

        yield ['BG0413270005'];

        yield ['BG0413270008'];

        yield ['BG0413270009'];

        yield ['BG0413270000'];

        yield ['BG1234567894'];

        yield ['BG4234567890'];

        yield ['BG4234567892'];

        yield ['BG4234567893'];

        yield ['BG4234567894'];

        yield ['BG4234567895'];

        yield ['BG4234567897'];

        yield ['BG4234567898'];
    }
}
