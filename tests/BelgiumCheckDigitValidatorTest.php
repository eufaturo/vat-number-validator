<?php

declare(strict_types = 1);

namespace Eufaturo\VatNumberValidator\Tests;

use Eufaturo\VatNumberValidator\VatNumberValidator;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class BelgiumCheckDigitValidatorTest extends TestCase
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
        yield ['BE0411905847'];

        yield ['BE0414445663'];

        yield ['BE0419052173'];

        yield ['BE0424473582'];

        yield ['BE0424748350'];

        yield ['BE0438789495'];

        yield ['BE0440966354'];

        yield ['BE0446991440'];

        yield ['BE0464819842'];

        yield ['BE0471727232'];

        yield ['BE0475899519'];

        yield ['BE0807361385'];

        yield ['BE0810881792'];

        yield ['BE0860098406'];

        yield ['BE0862669993'];

        yield ['BE0866408156'];

        yield ['BE430973770'];

        yield ['BE701509938'];

        yield ['BE870354373'];

        yield ['BE886122516'];

        yield ['BE888144569'];

        yield ['BE895408978'];

        yield ['BE0897221789'];

        yield ['BE0897221888'];

        yield ['BE0897221987'];

        yield ['BE0897222086'];

        yield ['BE0897222185'];

        yield ['BE0897222284'];

        yield ['BE0897222383'];

        yield ['BE0897222482'];

        yield ['BE0897222581'];

        yield ['BE0897222680'];

        yield ['BE0897222779'];

        yield ['BE0897222878'];

        yield ['BE0897222977'];

        yield ['BE0897223076'];

        yield ['BE0897223175'];

        yield ['BE0897223274'];

        yield ['BE0897223373'];

        yield ['BE0897223472'];

        yield ['BE0897223571'];

        yield ['BE0897223670'];

        yield ['BE0897223769'];

        yield ['BE0897223868'];

        yield ['BE0897223967'];

        yield ['BE0897224066'];

        yield ['BE0897224165'];

        yield ['BE0897224264'];

        yield ['BE0897224363'];

        yield ['BE0897224462'];

        yield ['BE0897224561'];

        yield ['BE0897224660'];

        yield ['BE0897224759'];

        yield ['BE0897224858'];

        yield ['BE0897224957'];

        yield ['BE0897225056'];

        yield ['BE0897225155'];

        yield ['BE0897225254'];

        yield ['BE0897225353'];

        yield ['BE0897225452'];

        yield ['BE0897225551'];

        yield ['BE0897225650'];

        yield ['BE0897225749'];

        yield ['BE0897225848'];

        yield ['BE0897225947'];

        yield ['BE0897226046'];

        yield ['BE0897226145'];

        yield ['BE0897226244'];

        yield ['BE0897226343'];

        yield ['BE0897226442'];

        yield ['BE0897226541'];

        yield ['BE0897226640'];

        yield ['BE0897226739'];

        yield ['BE0897226838'];

        yield ['BE0897226937'];

        yield ['BE0897227036'];

        yield ['BE0897227135'];

        yield ['BE0897227234'];

        yield ['BE0897227333'];

        yield ['BE0897227432'];

        yield ['BE0897227531'];

        yield ['BE0897227630'];

        yield ['BE0897227729'];

        yield ['BE0897227828'];

        yield ['BE0897227927'];

        yield ['BE0897228026'];

        yield ['BE0897228125'];

        yield ['BE0897228224'];

        yield ['BE0897228323'];

        yield ['BE0897228422'];

        yield ['BE0897228521'];

        yield ['BE0897228620'];

        yield ['BE0897228719'];

        yield ['BE0897228818'];

        yield ['BE0897228917'];

        yield ['BE0897229016'];

        yield ['BE0897229115'];

        yield ['BE0897231489'];

        yield ['BE0897231588'];

        yield ['BE0897231687'];

        yield ['BE0897231786'];

        yield ['BE0897231885'];

        yield ['BE0897231984'];

        yield ['BE0602602602'];

        yield ['BE0400521314'];

        yield ['BE0800000174'];

        yield ['BE0586000160'];

        yield ['BE0231000253'];

        yield ['BE0200000340'];

        yield ['BE0710988224'];

        yield ['BE0767030666'];

        yield ['BE0100200307'];

        yield ['BE0479276802'];

        yield ['BE0887434390'];

        yield ['BE0830986627'];

        yield ['BE0413172884'];

        yield ['BE200000340'];

        yield ['BE231000253'];

        yield ['BE454004738'];

        yield ['BE461455625'];

        yield ['BE586000160'];

        yield ['BE602602602'];

        yield ['BE800000174'];

        yield ['BE710988224'];

        yield ['BE767030666'];

        yield ['BE897221789'];

        yield ['BE897221888'];

        yield ['BE897221987'];

        yield ['BE897222086'];

        yield ['BE897222185'];

        yield ['BE897222284'];

        yield ['BE897222383'];

        yield ['BE897222482'];

        yield ['BE897222581'];

        yield ['BE897222680'];

        yield ['BE897222779'];

        yield ['BE897222878'];

        yield ['BE897222977'];

        yield ['BE897223076'];

        yield ['BE897223175'];

        yield ['BE897223274'];

        yield ['BE897223373'];

        yield ['BE897223472'];

        yield ['BE897223571'];

        yield ['BE897223670'];

        yield ['BE897223769'];

        yield ['BE897223868'];

        yield ['BE897223967'];

        yield ['BE897224066'];

        yield ['BE897224165'];

        yield ['BE897224264'];

        yield ['BE897224363'];

        yield ['BE897224462'];

        yield ['BE897224561'];

        yield ['BE897224660'];

        yield ['BE897224759'];

        yield ['BE897224858'];

        yield ['BE897224957'];

        yield ['BE897225056'];

        yield ['BE897225155'];

        yield ['BE897225254'];

        yield ['BE897225353'];

        yield ['BE897225452'];

        yield ['BE897225551'];

        yield ['BE897225650'];

        yield ['BE897225749'];

        yield ['BE897225848'];

        yield ['BE897225947'];

        yield ['BE897226046'];

        yield ['BE897226145'];

        yield ['BE897226244'];

        yield ['BE897226343'];

        yield ['BE897226442'];

        yield ['BE897226541'];

        yield ['BE897226640'];

        yield ['BE897226739'];

        yield ['BE897226838'];

        yield ['BE897226937'];

        yield ['BE897227036'];

        yield ['BE897227135'];

        yield ['BE897227234'];

        yield ['BE897227333'];

        yield ['BE897227432'];

        yield ['BE897227531'];

        yield ['BE897227630'];

        yield ['BE897227729'];

        yield ['BE897227828'];

        yield ['BE897227927'];

        yield ['BE897228026'];

        yield ['BE897228125'];

        yield ['BE897228224'];

        yield ['BE897228323'];

        yield ['BE897228422'];

        yield ['BE897228521'];

        yield ['BE897228620'];

        yield ['BE897228719'];

        yield ['BE897228818'];

        yield ['BE897228917'];

        yield ['BE897229016'];

        yield ['BE897229115'];

        yield ['BE897231489'];

        yield ['BE897231588'];

        yield ['BE897231687'];

        yield ['BE897231786'];

        yield ['BE897231885'];

        yield ['BE897231984'];
    }

    public static function provideInvalidVatNumbers(): Generator
    {
        yield ['BE897221791'];

        yield ['BE0897221791'];

        yield ['BE1897221789'];

        yield ['BE2897221888'];

        yield ['BE3897221987'];

        yield ['BE4897222086'];

        yield ['BE5897222185'];

        yield ['BE6897222284'];

        yield ['BE7897222383'];

        yield ['BE8897222482'];

        yield ['BE9897222581'];

        yield ['BEa897222680'];

        yield ['BE8a97222680'];

        yield ['BE89a7222680'];

        yield ['BE897a222680'];

        yield ['BE8972a22680'];

        yield ['BE89722a2680'];

        yield ['BE897222a680'];

        yield ['BE8972226a80'];

        yield ['BE89722268a0'];

        yield ['BE897222680a'];

        yield ['BE1602602623'];

        yield ['BE1400521335'];

        yield ['BE1400521330'];

        yield ['BE0000200334'];

        yield ['BE1400004463'];

        yield ['BE0603601206'];

        yield ['BE603601206'];

        yield ['BE60260262'];
    }
}
