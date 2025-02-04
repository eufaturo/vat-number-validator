<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class MaltaCheckDigitValidatorTest extends TestCase
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
        yield ['MT10126313'];

        yield ['MT10271622'];

        yield ['MT10365719'];

        yield ['MT10414318'];

        yield ['MT10601519'];

        yield ['MT10830531'];

        yield ['MT10988628'];

        yield ['MT11012007'];

        yield ['MT11189317'];

        yield ['MT11407334'];

        yield ['MT11539237'];

        yield ['MT11612810'];

        yield ['MT11622530'];

        yield ['MT12041610'];

        yield ['MT12135215'];

        yield ['MT12667313'];

        yield ['MT12691212'];

        yield ['MT12894031'];

        yield ['MT13271118'];

        yield ['MT14024410'];

        yield ['MT14391532'];

        yield ['MT14632420'];

        yield ['MT14675314'];

        yield ['MT15750503'];

        yield ['MT15861920'];

        yield ['MT15903903'];

        yield ['MT16364430'];

        yield ['MT16509511'];

        yield ['MT16632722'];

        yield ['MT16657432'];

        yield ['MT16735601'];

        yield ['MT16910734'];

        yield ['MT17158231'];

        yield ['MT17727224'];

        yield ['MT17869211'];

        yield ['MT18177531'];

        yield ['MT18821225'];

        yield ['MT19420526'];

        yield ['MT19677315'];

        yield ['MT19738201'];

        yield ['MT20035007'];

        yield ['MT20250021'];

        yield ['MT20390516'];

        yield ['MT20973507'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['MT2039051'];

        yield ['MT20390515'];
    }
}
