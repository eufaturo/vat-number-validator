<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class HungaryCheckDigitValidatorTest extends TestCase
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
        yield ['HU10672101'];

        yield ['HU10724318'];

        yield ['HU10747759'];

        yield ['HU10766172'];

        yield ['HU10875153'];

        yield ['HU10891748'];

        yield ['HU11125248'];

        yield ['HU11162973'];

        yield ['HU11342261'];

        yield ['HU11377304'];

        yield ['HU11457695'];

        yield ['HU11683582'];

        yield ['HU11879318'];

        yield ['HU12082348'];

        yield ['HU12194339'];

        yield ['HU12476365'];

        yield ['HU12509403'];

        yield ['HU12618398'];

        yield ['HU12723650'];

        yield ['HU12783166'];

        yield ['HU12804825'];

        yield ['HU12840937'];

        yield ['HU13122605'];

        yield ['HU13245658'];

        yield ['HU13277279'];

        yield ['HU13460370'];

        yield ['HU13532774'];

        yield ['HU13597986'];

        yield ['HU13846077'];

        yield ['HU13949235'];

        yield ['HU14860955'];

        yield ['HU14915969'];

        yield ['HU15308744'];

        yield ['HU15329499'];

        yield ['HU15490012'];

        yield ['HU15598323'];

        yield ['HU17781279'];

        yield ['HU18173967'];

        yield ['HU18764325'];

        yield ['HU19002464'];

        yield ['HU19023229'];

        yield ['HU22919456'];

        yield ['HU23001363'];

        yield ['HU23157653'];

        yield ['HU23058176'];

        yield ['HU23143409'];

        yield ['HU23157653'];

        yield ['HU23474178'];

        yield ['HU63731758'];

        yield ['HU65730980'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['HU65730981'];

        yield ['HU65731980'];
    }
}
