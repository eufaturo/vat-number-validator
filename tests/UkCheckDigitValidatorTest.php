<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class UkCheckDigitValidatorTest extends TestCase
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
        yield ['GB000472631'];

        yield ['GB000537235'];

        yield ['GB000541151'];

        yield ['GB000756808'];

        yield ['GB001511745'];

        yield ['GB001515145'];

        yield ['GB001513935'];

        yield ['GB001514344'];

        yield ['GB001515145'];

        yield ['GB002501253'];

        yield ['GB002503443'];

        yield ['GB002504146'];

        yield ['GB002506434'];

        yield ['GB003123449'];

        yield ['GB004123443'];

        yield ['GB005123437'];

        yield ['GB006123431'];

        yield ['GB007123425'];

        yield ['GB008123419'];

        yield ['GB009123413'];

        yield ['GB100000132'];

        yield ['GB100000187'];

        yield ['GB100000230'];

        yield ['GB100000285'];

        yield ['GB100212755'];

        yield ['GB101203596'];

        yield ['GB111112300'];

        yield ['GB132710213'];

        yield ['GB132710255'];

        yield ['GB211527742'];

        yield ['GB211581400'];

        yield ['GB216528764'];

        yield ['GB216528709'];

        yield ['GB233109402'];

        yield ['GB235410300'];

        yield ['GB251063539'];

        yield ['GB251063594'];

        yield ['GB350983637'];

        yield ['GB536768742'];

        yield ['GB372727045'];

        yield ['GB524461265'];

        yield ['GB536768700'];

        yield ['GB537696496'];

        yield ['GB562235945'];

        yield ['GB562235987'];

        yield ['GB645420550'];

        yield ['GB647879611'];

        yield ['GB647879666'];

        yield ['GB695794600'];

        yield ['GB706791910'];

        yield ['GB834549605'];

        yield ['GB844281425'];

        yield ['GB895878826'];

        yield ['GB895878868'];

        yield ['GB975093585'];

        yield ['GB998898400'];

        yield ['GB999000005'];

        yield ['GB999000047'];

        yield ['GBGD103'];

        yield ['GBHA599'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['GBHA122'];

        yield ['GB999000103'];

        yield ['GB999000201'];

        yield ['GB999000396001'];

        yield ['GB999000494005'];

        yield ['GB999000592'];

        yield ['GB999000690001'];

        yield ['GB999000788111'];

        yield ['GB999000886'];

        yield ['GB999000984'];

        yield ['GB999001002999'];

        yield ['GB959939732'];

        yield ['GB000000000'];

        yield ['GB000000000000'];

        yield ['GB999000103000'];

        yield ['GB999000201000'];

        yield ['GB999000201000'];

        yield ['GB999000396000'];

        yield ['GB999000494000'];

        yield ['GB999000592000'];

        yield ['GB999000690000'];

        yield ['GB999000788000'];

        yield ['GB999000886000'];

        yield ['GB999000984000'];

        yield ['GB999001002000'];

        yield ['GB010123456'];

        yield ['GB001515146'];

        yield ['GB002503442'];

        yield ['GB003123448'];

        yield ['GB004123444'];

        yield ['GB005123436'];

        yield ['GB006123430'];

        yield ['GB007123426'];

        yield ['GB008123420'];

        yield ['GB009123412'];

        yield ['GB877920255'];

        yield ['GB531164627'];

        yield ['GB337820116'];

        yield ['GB328083744'];

        yield ['GB716538021'];

        yield ['GB414780213'];

        yield ['GB912344523'];

        yield ['GB100783477'];

        yield ['GB244718939'];

        yield ['GB669361166'];

        yield ['GB010000090'];

        yield ['GB099999948'];

        yield ['GB949000138'];

        yield ['GB970000073'];

        yield ['GB999000103'];

        yield ['GB999999973'];

        yield ['GB000000140'];

        yield ['GB100000034'];
    }
}
