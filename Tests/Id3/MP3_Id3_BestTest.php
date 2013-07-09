<?php
require_once 'MP3/Id3/Best.php';

class MP3_Id3_BestTest extends PHPUnit_Framework_TestCase
{
    public function testGetIdv1()
    {
        $object = new MP3_Id3_Best();
        $this->assertInstanceOf('MP3_Id3_Idv1', $object->getIdv1());
    }

    public function testGetIdv2()
    {
        $object = new MP3_Id3_Best();
        $this->assertInstanceOf('MP3_Id3_Idv2', $object->getIdv2());
    }

    public function testGetMeta()
    {
        $object = new MP3_Id3_Best();
        $this->assertInstanceOf('MP3_Id3_Meta', $object->getMeta());
    }

    public function testRead1()
    {
        $object = new MP3_Id3_Best();

        $read = $object->read(dirname(__FILE__) . '/../file1.mp3');

        $this->assertInstanceOf('MP3_Id3_Best', $read);
    }

    public function testRead2()
    {
        $object = new MP3_Id3_Best();

        $read = $object->read(dirname(__FILE__) . '/../file2.mp3');

        $this->assertInstanceOf('MP3_Id3_Best', $read);
    }

    public function testRead3()
    {
        $object = new MP3_Id3_Best();

        $read = $object->read(dirname(__FILE__) . '/../file3.mp3');

        $this->assertInstanceOf('MP3_Id3_Best', $read);
    }

    public function testRead4()
    {
        $object = new MP3_Id3_Best();

        $read = $object->read(dirname(__FILE__) . '/../file4.mp3');

        $this->assertInstanceOf('MP3_Id3_Best', $read);
    }

    public function testRead5()
    {
        $object = new MP3_Id3_Best();

        $read = $object->read(dirname(__FILE__) . '/../file5.mp3');

        $this->assertInstanceOf('MP3_Id3_Best', $read);
    }

    public function testReadFail()
    {
        $object = new MP3_Id3_Best();

        $this->setExpectedException('MP3_Id3_Exception');
        $object->read('fake_file.mp3');
    }

    public function testWrite1()
    {
        $file = dirname(__FILE__) . '/../file1.mp3';
        $tmpFile = dirname(__FILE__) . '/../tmp/testWrite1Best.mp3';

        $object = new MP3_Id3_Best();
        $object->read($file);

        copy($file, $tmpFile);
        $write = $object->write($tmpFile);
        unlink($tmpFile);
        $this->assertInstanceOf('MP3_Id3_Best', $write);
    }

    public function testWrite2()
    {
        $file = dirname(__FILE__) . '/../file2.mp3';
        $tmpFile = dirname(__FILE__) . '/../tmp/testWrite2Best.mp3';

        $object = new MP3_Id3_Best();
        $object->read($file);

        copy($file, $tmpFile);
        $write = $object->write($tmpFile);
        unlink($tmpFile);
        $this->assertInstanceOf('MP3_Id3_Best', $write);
    }

    public function testWrite3()
    {
        $file = dirname(__FILE__) . '/../file3.mp3';
        $tmpFile = dirname(__FILE__) . '/../tmp/testWrite3Best.mp3';

        $object = new MP3_Id3_Best();
        $object->read($file);

        copy($file, $tmpFile);
        $write = $object->write($tmpFile);
        unlink($tmpFile);
        $this->assertInstanceOf('MP3_Id3_Best', $write);
    }

    public function testWrite4()
    {
        $file = dirname(__FILE__) . '/../file4.mp3';
        $tmpFile = dirname(__FILE__) . '/../tmp/testWrite4Best.mp3';

        $object = new MP3_Id3_Best();
        $object->read($file);

        copy($file, $tmpFile);
        $write = $object->write($tmpFile);
        unlink($tmpFile);
        $this->assertInstanceOf('MP3_Id3_Best', $write);
    }

    public function testWrite5()
    {
        $file = dirname(__FILE__) . '/../file5.mp3';
        $tmpFile = dirname(__FILE__) . '/../tmp/testWrite5Best.mp3';

        $object = new MP3_Id3_Best();
        $object->read($file);

        copy($file, $tmpFile);
        $write = $object->write($tmpFile);
        unlink($tmpFile);
        $this->assertInstanceOf('MP3_Id3_Best', $write);
    }

    public function testWriteFail()
    {
        $file = dirname(__FILE__) . '/../file1.mp3';
        $tmpFile = 'fake_file.mp3';

        $object = new MP3_Id3_Best();
        $object->read($file);

        $this->setExpectedException('MP3_Id3_Exception');
        $object->write($tmpFile);
    }
}
