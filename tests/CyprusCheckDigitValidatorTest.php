<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class CyprusCheckDigitValidatorTest extends TestCase
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
        yield ['CY00001067Y'];

        yield ['CY00376309R'];

        yield ['CY00506026O'];

        yield ['CY00709533C'];

        yield ['CY00714754A'];

        yield ['CY10000314J'];

        yield ['CY10000463Y'];

        yield ['CY10008146K'];

        yield ['CY10018402C'];

        yield ['CY10008489A'];

        yield ['CY10030661B'];

        yield ['CY10030954F'];

        yield ['CY10111176Z'];

        yield ['CY10111474A'];

        yield ['CY10272781S'];

        yield ['CY10283929R'];

        yield ['CY10156988E'];

        yield ['CY10157423I'];

        yield ['CY10165829P'];

        yield ['CY10166866Y'];

        yield ['CY10173610U'];

        yield ['CY10188550T'];

        yield ['CY10221051V'];

        yield ['CY10227520I'];

        yield ['CY10231803U'];

        yield ['CY10244276R'];

        yield ['CY10247148S'];

        yield ['CY10259033P'];

        yield ['CY10259584H'];

        yield ['CY10265331J'];

        yield ['CY10269393H'];

        yield ['CY10272781S'];

        yield ['CY10274481T'];

        yield ['CY10110278D'];

        yield ['CY30009560X'];

        yield ['CY90000265T'];

        yield ['CY90000448S'];

        yield ['CY90002066W'];

        yield ['CY99000027S'];

        yield ['CY99200002N'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['CY0'];

        yield ['CY00000000W'];

        yield ['CY12000000C'];

        yield ['CY12000139V'];
    }
}
