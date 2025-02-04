<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class FranceCheckDigitValidatorTest extends TestCase
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
        yield ['FR00000000190'];

        yield ['FR00300076965'];

        yield ['FR00303656847'];

        yield ['FR01000000158'];

        yield ['FR03552081317'];

        yield ['FR03512803495'];

        yield ['FR03784359069'];

        yield ['FR04494487341'];

        yield ['FR05442977302'];

        yield ['FR17000000034'];

        yield ['FR19000000067'];

        yield ['FR43000000075'];

        yield ['FR47000000141'];

        yield ['FR48000000109'];

        yield ['FR54000000208'];

        yield ['FR13393892815'];

        yield ['FR14722057460'];

        yield ['FR20562016774'];

        yield ['FR25000000166'];

        yield ['FR22528117732'];

        yield ['FR25432701258'];

        yield ['FR27514868827'];

        yield ['FR29312010820'];

        yield ['FR31387589179'];

        yield ['FR38438710865'];

        yield ['FR39412658767'];

        yield ['FR40303265045'];

        yield ['FR40391895109'];

        yield ['FR40402628838'];

        yield ['FR41000000042'];

        yield ['FR41343848552'];

        yield ['FR42403335904'];

        yield ['FR42504207853'];

        yield ['FR44527865992'];

        yield ['FR45395080138'];

        yield ['FR45542065305'];

        yield ['FR46400477089'];

        yield ['FR47323875187'];

        yield ['FR47323875187'];

        yield ['FR53418304010'];

        yield ['FR55440243988'];

        yield ['FR55480081306'];

        yield ['FR55338966385'];

        yield ['FR56439795816'];

        yield ['FR57609803416'];

        yield ['FR58399360817'];

        yield ['FR58499528255'];

        yield ['FR61300986619'];

        yield ['FR61954506077'];

        yield ['FR64518539093'];

        yield ['FR65489465542'];

        yield ['FR67000000083'];

        yield ['FR71383076817'];

        yield ['FR72000000117'];

        yield ['FR73000000182'];

        yield ['FR74532287844'];

        yield ['FR82494628696'];

        yield ['FR82542065479'];

        yield ['FR83404833048'];

        yield ['FR85418228102'];

        yield ['FR88414997130'];

        yield ['FR89540090917'];

        yield ['FR90000000026'];

        yield ['FR90524670213'];

        yield ['FR96000000125'];

        yield ['FRA0123456789'];

        yield ['FR0A012345678'];

        yield ['FRAB012345678'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['FR00300076967'];

        yield ['FR90000000027'];

        yield ['FR17000000037'];

        yield ['FR41000000047'];

        yield ['FR01000000157'];

        yield ['FR19000000068'];
    }
}
