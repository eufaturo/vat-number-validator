<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class GreeceCheckDigitValidatorTest extends TestCase
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
        yield ['EL000000024'];

        yield ['EL000000036'];

        yield ['EL000000048'];

        yield ['EL000000208'];

        yield ['EL000000061'];

        yield ['EL000000073'];

        yield ['EL000000085'];

        yield ['EL000000104'];

        yield ['EL000000116'];

        yield ['EL000000128'];

        yield ['EL000000141'];

        yield ['EL000000153'];

        yield ['EL000000165'];

        yield ['EL000000189'];

        yield ['EL000000190'];

        yield ['EL000000208'];

        yield ['EL022188887'];

        yield ['EL055679750'];

        yield ['EL059644936'];

        yield ['EL073313955'];

        yield ['EL090049627'];

        yield ['EL090077522'];

        yield ['EL090101655'];

        yield ['EL094012834'];

        yield ['EL094056437'];

        yield ['EL094112730'];

        yield ['EL094173630'];

        yield ['EL094237076'];

        yield ['EL094249481'];

        yield ['EL094253457'];

        yield ['EL094313643'];

        yield ['EL094322222'];

        yield ['EL094368710'];

        yield ['EL094403384'];

        yield ['EL095617741'];

        yield ['EL098002010'];

        yield ['EL098062736'];

        yield ['EL099370743'];

        yield ['EL099785242'];

        yield ['EL800420948'];

        yield ['EL997671771'];

        yield ['EL997786906'];

        yield ['EL998075960'];

        yield ['EL998180212'];

        yield ['EL998789236'];

        yield ['EL998920231'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['EL000000022'];

        yield ['EL000000032'];

        yield ['EL000000042'];

        yield ['EL000000202'];

        yield ['EL000000062'];

        yield ['EL000000072'];

        yield ['EL000000082'];
    }
}
