<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class GermanyCheckDigitValidatorTest extends TestCase
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
        yield ['DE111111125'];

        yield ['DE113298780'];

        yield ['DE113891176'];

        yield ['DE114189102'];

        yield ['DE119429301'];

        yield ['DE122119035'];

        yield ['DE126639095'];

        yield ['DE126823642'];

        yield ['DE128575725'];

        yield ['DE128936602'];

        yield ['DE129516430'];

        yield ['DE130502536'];

        yield ['DE132507686'];

        yield ['DE136695976'];

        yield ['DE138263821'];

        yield ['DE138497248'];

        yield ['DE142930777'];

        yield ['DE145141525'];

        yield ['DE145146812'];

        yield ['DE146624530'];

        yield ['DE160459932'];

        yield ['DE184543132'];

        yield ['DE199085992'];

        yield ['DE126563585'];

        yield ['DE203159652'];

        yield ['DE220709071'];

        yield ['DE247139684'];

        yield ['DE252429421'];

        yield ['DE256319655'];

        yield ['DE262044136'];

        yield ['DE282741168'];

        yield ['DE811209378'];

        yield ['DE811363057'];

        yield ['DE812321109'];

        yield ['DE812529243'];

        yield ['DE813030375'];

        yield ['DE813189177'];

        yield ['DE813232162'];

        yield ['DE813261484'];

        yield ['DE813495425'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['DE111111126'];

        yield ['DE111111127'];

        yield ['DE111111128'];

        yield ['DE111111129'];

        yield ['DE111111120'];

        yield ['DE111111121'];

        yield ['DE000000020'];

        yield ['DE000000038'];

        yield ['DE000000046'];

        yield ['DE000000206'];

        yield ['DE000000062'];

        yield ['DE000000079'];

        yield ['DE000000087'];

        yield ['DE000000100'];

        yield ['DE000000118'];

        yield ['DE000000126'];

        yield ['DE000000142'];

        yield ['DE000000159'];

        yield ['DE000000167'];

        yield ['DE000000183'];

        yield ['DE000000191'];

        yield ['DE000000206'];
    }
}
