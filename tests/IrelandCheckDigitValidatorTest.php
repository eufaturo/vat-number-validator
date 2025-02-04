<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class IrelandCheckDigitValidatorTest extends TestCase
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
        yield ['IE0000002D'];

        yield ['IE0000003F'];

        yield ['IE0000004H'];

        yield ['IE0000020F'];

        yield ['IE0000006L'];

        yield ['IE0000007N'];

        yield ['IE0000008P'];

        yield ['IE0000010C'];

        yield ['IE0000011E'];

        yield ['IE0000012G'];

        yield ['IE0000014K'];

        yield ['IE0000015M'];

        yield ['IE0000016O'];

        yield ['IE0000018S'];

        yield ['IE0000019U'];

        yield ['IE0000020F'];

        yield ['IE0000000W'];

        yield ['IE1409095C'];

        yield ['IE4748790P'];

        yield ['IE4749148U'];

        yield ['IE4816785B'];

        yield ['IE4873338U'];

        yield ['IE6323439A'];

        yield ['IE6336982T'];

        yield ['IE6343933U'];

        yield ['IE6344439R'];

        yield ['IE6346967G'];

        yield ['IE6334989A'];

        yield ['IE6378801A'];

        yield ['IE6387098K'];

        yield ['IE6398832A'];

        yield ['IE6409194V'];

        yield ['IE6411364J'];

        yield ['IE6426706T'];

        yield ['IE6517909Q'];

        yield ['IE6517957E'];

        yield ['IE6555698U'];

        yield ['IE6556973V'];

        yield ['IE6562942T'];

        yield ['IE6570116F'];

        yield ['IE8O47531K'];

        yield ['IE8213349C'];

        yield ['IE8218007W'];

        yield ['IE8223184C'];

        yield ['IE8226748O'];

        yield ['IE8232698L'];

        yield ['IE8252557F'];

        yield ['IE8E86432H'];

        yield ['IE8Z49289F'];

        yield ['IE9578054E'];

        yield ['IE9674450W'];

        yield ['IE9694881P'];

        yield ['IE9698969D'];

        yield ['IE9700053D'];

        yield ['IE9779244F'];

        yield ['IE9800871V'];

        yield ['IE9973740B'];

        yield ['IE9E61585W'];

        yield ['IE9F51232R'];

        yield ['IE9F70164P'];

        yield ['IE2984579BH'];

        yield ['IE1113778LH'];

        yield ['IE1113011UH'];

        yield ['IE1113202EH'];

        yield ['IE1113258IH'];

        yield ['IE1113571MH'];

        yield ['IE2973912UH'];

        yield ['IE2974611LH'];

        yield ['IE2974901UH'];

        yield ['IE3200115LH'];

        yield ['IE3206791MH'];

        yield ['IE3208913KH'];

        yield ['IE3214048CH'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['IE87654321SA'];

        yield ['IE8Z49289A'];

        yield ['IE0000002A'];

        yield ['IE0000003A'];

        yield ['IE0000004A'];

        yield ['IE0000020A'];

        yield ['IE0000006A'];

        yield ['IE0000007A'];
    }
}
