<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SpainCheckDigitValidatorTest extends TestCase
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
        yield ['ESA0011012B'];

        yield ['ES00000001R'];

        yield ['ES00000002W'];

        yield ['ES00000003A'];

        yield ['ES00000019L'];

        yield ['ES00000005M'];

        yield ['ES00000006Y'];

        yield ['ES00000007F'];

        yield ['ES00000009D'];

        yield ['ES00000010X'];

        yield ['ES00000011B'];

        yield ['ES00000013J'];

        yield ['ES00000014Z'];

        yield ['ES00000015S'];

        yield ['ES00000017V'];

        yield ['ES00000018H'];

        yield ['ES00000019L'];

        yield ['ESA08017535'];

        yield ['ESA08037236'];

        yield ['ESA09130790'];

        yield ['ESA20056420'];

        yield ['ESA31000268'];

        yield ['ESA31055585'];

        yield ['ESA39018932'];

        yield ['ESA48265169'];

        yield ['ESA58662081'];

        yield ['ESA62634068'];

        yield ['ESA82130519'];

        yield ['ESB12398087'];

        yield ['ESB17821679'];

        yield ['ESB28986172'];

        yield ['ESB57403180'];

        yield ['ESB63104293'];

        yield ['ESB63618474'];

        yield ['ESB65725111'];

        yield ['ESF20020574'];

        yield ['ESG0011225J'];

        yield ['ESG0011385B'];

        yield ['ESG0011444G'];

        yield ['ESG0011485J'];

        yield ['ESG0041360I'];

        yield ['ESG0063121H'];

        yield ['ESG0269003J'];

        yield ['ESG0321312A'];

        yield ['ESG2877009G'];

        yield ['ESG5890006I'];

        yield ['ESG63971451'];

        yield ['ESG8941672A'];

        yield ['ESJ60443975'];

        yield ['ESN0060092D'];

        yield ['ESQ0840005C'];

        yield ['ESQ2801036A'];

        yield ['ESQ2826000H'];

        yield ['ESJ78150166'];

        yield ['ESS2826046A'];

        yield ['ESU78153210'];

        yield ['ESV78153681'];

        yield ['ESW7815395D'];

        yield ['ESR0881583I'];

        yield ['ESY1234567X'];

        yield ['ESZ1234567R'];

        yield ['ESB61979175'];

        yield ['ESN8261290D'];

        yield ['ESA81626905'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['ESA0011012A'];

        yield ['ES00000001A'];

        yield ['ES00000002A'];

        yield ['ES00000003B'];

        yield ['ES00000019A'];

        yield ['ES00000005A'];

        yield ['ES00000006A'];

        yield ['ES00000007A'];

        yield ['ES00000009A'];

        yield ['ES00000010A'];

        yield ['ES00000011A'];

        yield ['ES00000013B'];

        yield ['ES00000014B'];

        yield ['ES00000015B'];

        yield ['ES00000017B'];

        yield ['ES00000018B'];

        yield ['ES00000019B'];

        yield ['ES00000001D'];

        yield ['ES00000002E'];

        yield ['ES00000003F'];

        yield ['ES00000019G'];
    }
}
