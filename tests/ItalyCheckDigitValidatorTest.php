<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class ItalyCheckDigitValidatorTest extends TestCase
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
        yield ['IT00000010215'];

        yield ['IT00079760328'];

        yield ['IT00140390501'];

        yield ['IT00144659992'];

        yield ['IT00224320234'];

        yield ['IT00383590486'];

        yield ['IT00453840357'];

        yield ['IT00488410010'];

        yield ['IT00502591209'];

        yield ['IT00697300150'];

        yield ['IT00754150100'];

        yield ['IT00820340966'];

        yield ['IT00902170018'];

        yield ['IT01021630668'];

        yield ['IT01044120358'];

        yield ['IT01114601006'];

        yield ['IT01219560800'];

        yield ['IT01390230462'];

        yield ['IT01654960473'];

        yield ['IT02118311006'];

        yield ['IT02121151001'];

        yield ['IT02458160245'];

        yield ['IT07234250962'];

        yield ['IT03084300171'];

        yield ['IT05067600154'];

        yield ['IT06363391001'];

        yield ['IT06515871009'];

        yield ['IT06631330963'];

        yield ['IT06895721006'];

        yield ['IT07129470014'];

        yield ['IT08146570018'];

        yield ['IT08792831003'];

        yield ['IT10000100015'];

        yield ['IT10000200013'];

        yield ['IT10000300011'];

        yield ['IT10000500016'];

        yield ['IT10000600014'];

        yield ['IT10000700012'];

        yield ['IT10000900018'];

        yield ['IT10001000016'];

        yield ['IT10001100014'];

        yield ['IT10001300010'];

        yield ['IT10001400018'];

        yield ['IT10001500015'];

        yield ['IT10001700011'];

        yield ['IT10001708881'];

        yield ['IT10001701209'];

        yield ['IT10001701217'];

        yield ['IT10001709996'];

        yield ['IT10001800019'];

        yield ['IT10001900017'];

        yield ['IT11005760159'];

        yield ['IT12066470159'];

        yield ['IT12286350157'];

        yield ['IT12683790153'];

        yield ['IT13378520152'];

        yield ['IT05142860484'];

        yield ['IT01709820995'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['IT00000010210'];

        yield ['IT10000100010'];

        yield ['IT10000200010'];

        yield ['IT0000300010'];

        yield ['IT10001900010'];

        yield ['IT10000500010'];

        yield ['IT10000600010'];

        yield ['IT10001708882'];

        yield ['IT10001701202'];

        yield ['IT10001701216'];

        yield ['IT10001709997'];
    }
}
