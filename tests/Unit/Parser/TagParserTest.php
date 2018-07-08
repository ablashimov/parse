<?php

namespace Tests\Unit\Parser;

use RuntimeException;
use App\Parser\TagParser;
use PHPUnit\Framework\TestCase;
use Mockery as m;

class TagParserTest extends TestCase
{
    /** @var MetaParser */
    public $parser;

    public function setUp()
    {
        parent::setUp();

        $this->parser = new TagParser;
    }

    public function tearDown()
    {
        parent::tearDown();

        m::close();
    }

    /** @test */
    function it_returns_tag_data()
    {
        $content = '<span>span</span>';

        $expected = ['span'];

        $this->assertSame($expected, $this->parser->__invoke($content,'span'));
    }


    public function partial($object)
    {
        return m::mock($object)->makePartial()->shouldAllowMockingProtectedMethods();
    }
}
