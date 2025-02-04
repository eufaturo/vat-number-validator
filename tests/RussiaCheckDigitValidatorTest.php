<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class RussiaCheckDigitValidatorTest extends TestCase
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
        yield ['RU0274051582'];

        yield ['RU2901081545'];

        yield ['RU3665069495'];

        yield ['RU5024051807'];

        yield ['RU5027187066'];

        yield ['RU5249116595'];

        yield ['RU5451110090'];

        yield ['RU7225004092'];

        yield ['RU7701369293'];

        yield ['RU7701370997'];

        yield ['RU7701996907'];

        yield ['RU7701998647'];

        yield ['RU7702070139'];

        yield ['RU7703618107'];

        yield ['RU7705182000'];

        yield ['RU7705205000'];

        yield ['RU7707083893'];

        yield ['RU7708704085'];

        yield ['RU7710030411'];

        yield ['RU7710401987'];

        yield ['RU7718249396'];

        yield ['RU7723008300'];

        yield ['RU7736050003'];

        yield ['RU7744000398'];

        yield ['RU7744001497'];

        yield ['RU7750004009'];

        yield ['RU9909099353'];

        yield ['RU9909161308'];

        yield ['RU9909235581'];

        yield ['RU9909310782'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['RU5027187067'];

        yield ['RU524911659'];

        yield ['RU77013692931'];
    }
}
