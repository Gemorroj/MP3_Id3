<?php
require_once 'MP3/Id3.php';

class MP3_Id3Test extends PHPUnit_Framework_TestCase
{
    protected $mock;

    protected function setUp()
    {
        $this->mock = $this->getMock('MP3_Id3', null, array(__DIR__ . '/file1.mp3'));
    }

    public function testMock()
    {
        $this->assertInstanceOf('MP3_Id3', $this->mock);
    }
}
