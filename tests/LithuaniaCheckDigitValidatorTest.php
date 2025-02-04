<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class LithuaniaCheckDigitValidatorTest extends TestCase
{
    #[Test]
    #[TestDox('It will verify that the vat number is valid')]
    #[DataProvider('provideValidVatNumbers')]
    public function test_1(string $vatNumber): void
    {
        $this->assertTrue((new VatNumberValidator())->validate($vatNumber));
    }

    public static function provideValidVatNumbers(): Generator
    {
        yield ['LT100000009017'];

        yield ['LT100000031710'];

        yield ['LT100001410314'];

        yield ['LT100001647810'];

        yield ['LT100002247911'];

        yield ['LT100002640213'];

        yield ['LT100002992518'];

        yield ['LT100003099412'];

        yield ['LT100003222911'];

        yield ['LT100003776115'];

        yield ['LT100003806615'];

        yield ['LT100004463513'];

        yield ['LT100005808219'];

        yield ['LT100005772517'];

        yield ['LT100005847815'];

        yield ['LT100006555419'];

        yield ['LT100006615910'];

        yield ['LT100006688411'];

        yield ['LT100006852615'];

        yield ['LT100007390914'];

        yield ['LT100008061513'];

        yield ['LT100119219'];

        yield ['LT104019515'];

        yield ['LT108940716'];

        yield ['LT115521113'];

        yield ['LT105672113'];

        yield ['LT115184219'];

        yield ['LT119515314'];

        yield ['LT119513417'];

        yield ['LT119505811'];

        yield ['LT119502413'];

        yield ['LT119508113'];

        yield ['LT119517219'];

        yield ['LT120212314'];

        yield ['LT120296515'];

        yield ['LT205052113'];

        yield ['LT205458414'];

        yield ['LT208640716'];

        yield ['LT210811811'];

        yield ['LT213179412'];

        yield ['LT238708219'];

        yield ['LT239056314'];

        yield ['LT243857314'];

        yield ['LT245702113'];

        yield ['LT246655314'];

        yield ['LT254096515'];

        yield ['LT258223515'];

        yield ['LT290061371314'];

        yield ['LT321389515'];

        yield ['LT330214917'];

        yield ['LT331842113'];

        yield ['LT351634917'];

        yield ['LT408382716'];

        yield ['LT458248716'];

        yield ['LT530091413'];

        yield ['LT852320917'];

        yield ['LT907560811'];
    }
}
