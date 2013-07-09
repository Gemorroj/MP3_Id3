<?php
require_once 'MP3/Id3/Idv1.php';

class MP3_Id3_Idv1Test extends PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        $object = new MP3_Id3_Idv1();
        $this->assertInstanceOf('MP3_Id', $object->getId());
    }

    public function testRead()
    {
        $object = new MP3_Id3_Idv1();

        $read = $object->read(dirname(__FILE__) . '/../file1.mp3');

        $this->assertInstanceOf('MP3_Id3_Idv1', $read);
    }

    public function testReadFail()
    {
        $object = new MP3_Id3_Idv1();

        $this->setExpectedException('MP3_Id3_Exception');
        $object->read('fake_file.mp3');
    }

    public function testWrite()
    {
        $file = dirname(__FILE__) . '/../file1.mp3';
        $tmpFile = dirname(__FILE__) . '/../tmp/testWrite.mp3';

        $object = new MP3_Id3_Idv1();
        $object->read($file);

        copy($file, $tmpFile);
        $write = $object->write($tmpFile);
        unlink($tmpFile);
        $this->assertInstanceOf('MP3_Id3_Idv1', $write);
    }

    public function testWriteFail()
    {
        $file = dirname(__FILE__) . '/../file1.mp3';
        $tmpFile = 'fake_file.mp3';

        $object = new MP3_Id3_Idv1();
        $object->read($file);

        $this->setExpectedException('MP3_Id3_Exception');
        $object->write($tmpFile);
    }
}
