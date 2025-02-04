<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class NorwayCheckDigitValidatorTest extends TestCase
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
        yield ['NO864234232'];

        yield ['NO919405619'];

        yield ['NO924319623'];

        yield ['NO936869335'];

        yield ['NO938532397'];

        yield ['NO939194428'];

        yield ['NO939350675'];

        yield ['NO945748931'];

        yield ['NO946938505'];

        yield ['NO951390534'];

        yield ['NO959021740'];

        yield ['NO962209017'];

        yield ['NO965920358'];

        yield ['NO966891750'];

        yield ['NO971526157'];

        yield ['NO975962229'];

        yield ['NO976320344'];

        yield ['NO976389387'];

        yield ['NO976559029'];

        yield ['NO976682157'];

        yield ['NO979423705'];

        yield ['NO979523483'];

        yield ['NO981026330'];

        yield ['NO981532848'];

        yield ['NO892462402'];

        yield ['NO982512069'];

        yield ['NO982702887'];

        yield ['NO982928885'];

        yield ['NO983851800'];

        yield ['NO984058098'];

        yield ['NO985333629'];

        yield ['NO985770573'];

        yield ['NO987058765'];

        yield ['NO988023671'];

        yield ['NO990630372'];

        yield ['NO992037601'];

        yield ['NO992186208'];

        yield ['NO992227079'];

        yield ['NO992324252'];

        yield ['NO992977558'];

        yield ['NO992986913'];

        yield ['NO993466344'];

        yield ['NO998053501'];

        yield ['NO995073331'];

        yield ['NO995203626'];

        yield ['NO996293815'];

        yield ['NO996707415'];

        yield ['NO996840506'];

        yield ['NO999600476'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['NO96220901'];

        yield ['NO962209018'];
    }
}
