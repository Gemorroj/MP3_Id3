<?php
require_once 'MP3/Id3/Exception.php';

class MP3_Id3_ExceptionTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $this->assertInstanceOf('Exception', new MP3_Id3_Exception);
    }
}
