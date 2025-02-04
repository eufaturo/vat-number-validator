<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SwedenCheckDigitValidatorTest extends TestCase
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
        yield ['SE000000002601'];

        yield ['SE000000003401'];

        yield ['SE000000004201'];

        yield ['SE000000006701'];

        yield ['SE000000007501'];

        yield ['SE000000008301'];

        yield ['SE000000010901'];

        yield ['SE000000011701'];

        yield ['SE000000012501'];

        yield ['SE000000014101'];

        yield ['SE000000015801'];

        yield ['SE000000016601'];

        yield ['SE000000018201'];

        yield ['SE000000019001'];

        yield ['SE000000020801'];

        yield ['SE502069927701'];

        yield ['SE202100281701'];

        yield ['SE202100287401'];

        yield ['SE202100293201'];

        yield ['SE202100297301'];

        yield ['SE202100305401'];

        yield ['SE202100306201'];

        yield ['SE202100309601'];

        yield ['SE202100321101'];

        yield ['SE202100509101'];

        yield ['SE262000119401'];

        yield ['SE390806051401'];

        yield ['SE502052817901'];

        yield ['SE502067960001'];

        yield ['SE516403812601'];

        yield ['SE516405444601'];

        yield ['SE556035133901'];

        yield ['SE556101935601'];

        yield ['SE556126249301'];

        yield ['SE556188840401'];

        yield ['SE556263276901'];

        yield ['SE556366804401'];

        yield ['SE556399449901'];

        yield ['SE556464687401'];

        yield ['SE556500060001'];

        yield ['SE556555952201'];

        yield ['SE556576895801'];

        yield ['SE556654042201'];

        yield ['SE556785615701'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['SE556188840301'];

        yield ['SE000000002301'];

        yield ['SE000000003301'];

        yield ['SE000000004301'];

        yield ['SE000000006301'];
    }
}
