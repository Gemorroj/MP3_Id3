<?php
require_once 'MP3/Id3/Picture.php';

class MP3_Id3_PictureTest extends PHPUnit_Framework_TestCase
{
    public function testData()
    {
        $data = 'test';
        $object = new MP3_Id3_Picture;
        $resultSetData = $object->setData($data);

        $this->assertInstanceOf('MP3_Id3_Picture', $resultSetData);

        $resultGetData = $object->getData();
        $this->assertEquals($data, $resultGetData);
    }

    public function testMime()
    {
        $mime = 'test/test';
        $object = new MP3_Id3_Picture;
        $resultSetMime = $object->setMime($mime);

        $this->assertInstanceOf('MP3_Id3_Picture', $resultSetMime);

        $resultGetMime = $object->getMime();
        $this->assertEquals($mime, $resultGetMime);
    }
}
