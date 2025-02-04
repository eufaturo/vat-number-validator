<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class LatviaCheckDigitValidatorTest extends TestCase
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
        yield ['LV07091910933'];

        yield ['LV40003009497'];

        yield ['LV40003032949'];

        yield ['LV40003048583'];

        yield ['LV40003125825'];

        yield ['LV40003130421'];

        yield ['LV40003139967'];

        yield ['LV40003224680'];

        yield ['LV40003254505'];

        yield ['LV40003275598'];

        yield ['LV40003280118'];

        yield ['LV40003282138'];

        yield ['LV40003287135'];

        yield ['LV40003348054'];

        yield ['LV40003435328'];

        yield ['LV40003439368'];

        yield ['LV40003453643'];

        yield ['LV40003511655'];

        yield ['LV40003553786'];

        yield ['LV40003568404'];

        yield ['LV40003576416'];

        yield ['LV40003585673'];

        yield ['LV40003609083'];

        yield ['LV40003651875'];

        yield ['LV40003702071'];

        yield ['LV40003732964'];

        yield ['LV40003734170'];

        yield ['LV40003857687'];

        yield ['LV40003921905'];

        yield ['LV40008000225'];

        yield ['LV40008197548'];

        yield ['LV40103058465'];

        yield ['LV40103189574'];

        yield ['LV40103247567'];

        yield ['LV40103388513'];

        yield ['LV40103446084'];

        yield ['LV40103592648'];

        yield ['LV40103619251'];

        yield ['LV41202010448'];

        yield ['LV41031037436'];

        yield ['LV41503031291'];

        yield ['LV50003017621'];

        yield ['LV50003913651'];

        yield ['LV50008111541'];

        yield ['LV90000022399'];

        yield ['LV90000136794'];

        yield ['LV90002573483'];
    }
}
