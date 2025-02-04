<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SwitzerlandCheckDigitValidatorTest extends TestCase
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
        yield ['CHE100416306'];

        yield ['CHE100416306IVA'];

        yield ['CHE100416306TVA'];

        yield ['CHE100416306MWST'];

        yield ['CHE101090265MWST'];

        yield ['CHE101698805MWST'];

        yield ['CHE101770851MWST'];

        yield ['CHE102534916MWST'];

        yield ['CHE102628670MWST'];

        yield ['CHE102646900MWST'];

        yield ['CHE102805222MWST'];

        yield ['CHE103051537MWST'];

        yield ['CHE104309655MWST'];

        yield ['CHE104528536MWST'];

        yield ['CHE104827884MWST'];

        yield ['CHE105121077MWST'];

        yield ['CHE105124868MWST'];

        yield ['CHE105381951MWST'];

        yield ['CHE107737562MWST'];

        yield ['CHE105789849MWST'];

        yield ['CHE105835768MWST'];

        yield ['CHE105873496MWST'];

        yield ['CHE105898444MWST'];

        yield ['CHE106480461MWST'];

        yield ['CHE106847076MWST'];

        yield ['CHE107811419MWST'];

        yield ['CHE107984669MWST'];

        yield ['CHE108017588MWST'];

        yield ['CHE108019245MWST'];

        yield ['CHE108020917MWST'];

        yield ['CHE108458018MWST'];

        yield ['CHE108672988MWST'];

        yield ['CHE109852725MWST'];

        yield ['CHE109877518MWST'];

        yield ['CHE110171891MWST'];

        yield ['CHE110257191MWST'];

        yield ['CHE112142015MWST'];

        yield ['CHE112256297MWST'];

        yield ['CHE112487804MWST'];

        yield ['CHE112591732MWST'];

        yield ['CHE113816425MWST'];

        yield ['CHE114498799MWST'];

        yield ['CHE114546487MWST'];

        yield ['CHE114932413MWST'];

        yield ['CHE115197811MWST'];

        yield ['CHE115288187MWST'];

        yield ['CHE115772649MWST'];

        yield ['CHE116032762MWST'];

        yield ['CHE116199020MWST'];

        yield ['CHE116238111MWST'];

        yield ['CHE116268856MWST'];

        yield ['CHE116272898MWST'];

        yield ['CHE116276850MWST'];

        yield ['CHE116284625MWST'];

        yield ['CHE116303292MWST'];

        yield ['CHE116303553MWST'];

        yield ['CHE116304475MWST'];

        yield ['CHE116320362MWST'];

        yield ['CHE158229508MWST'];

        yield ['CHE184633358MWST'];

        yield ['CHE255263366MWST'];

        yield ['CHE284156502MWST'];

        yield ['CHE350423893MWST'];

        yield ['CHE381569736MWST'];

        yield ['CHE408983125MWST'];

        yield ['CHE424414541MWST'];

        yield ['CHE432495116MWST'];

        yield ['CHE432825998MWST'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['CHE-432.825.99-MWST'];

        yield ['CHE-432.825.9980-MWST'];

        yield ['CH-432.825.999-MWST'];

        yield ['CHE-100.416.306-ABC'];
    }
}
