<?php
require_once 'MP3/Id3/Meta.php';

class MP3_Id3_MetaTest extends PHPUnit_Framework_TestCase
{
    public function testBitrate()
    {
        $bitrate = 192000;
        $object = new MP3_Id3_Meta;
        $resultSetBitrate = $object->setBitrate($bitrate);

        $this->assertInstanceOf('MP3_Id3_Meta', $resultSetBitrate);

        $resultGetBitrate = $object->getBitrate();
        $this->assertEquals($bitrate, $resultGetBitrate);
    }

    public function testEncodingType()
    {
        $encodingType = 'mpeg';
        $object = new MP3_Id3_Meta;
        $resultEncodingType = $object->setEncodingType($encodingType);

        $this->assertInstanceOf('MP3_Id3_Meta', $resultEncodingType);

        $resultGetEncodingType = $object->getEncodingType();
        $this->assertEquals($encodingType, $resultGetEncodingType);
    }

    public function testFilesize()
    {
        $filesize = 123456;
        $object = new MP3_Id3_Meta;
        $resultFilesize = $object->setFilesize($filesize);

        $this->assertInstanceOf('MP3_Id3_Meta', $resultFilesize);

        $resultGetFilesize = $object->getFilesize();
        $this->assertEquals($filesize, $resultGetFilesize);
    }

    public function testFrequency()
    {
        $frequency = 192000;
        $object = new MP3_Id3_Meta;
        $resultSetFrequency = $object->setFrequency($frequency);

        $this->assertInstanceOf('MP3_Id3_Meta', $resultSetFrequency);

        $resultGetFrequency = $object->getFrequency();
        $this->assertEquals($frequency, $resultGetFrequency);
    }

    public function testLayer()
    {
        $layer = 100;
        $object = new MP3_Id3_Meta;
        $resultSetLayer = $object->setLayer($layer);

        $this->assertInstanceOf('MP3_Id3_Meta', $resultSetLayer);

        $resultGetLayer = $object->getLayer();
        $this->assertEquals($layer, $resultGetLayer);
    }

    public function testLength()
    {
        $length = 100;
        $object = new MP3_Id3_Meta;
        $resultSetLength = $object->setLength($length);

        $this->assertInstanceOf('MP3_Id3_Meta', $resultSetLength);

        $resultGetLength = $object->getLength();
        $this->assertEquals($length, $resultGetLength);
    }

    public function testMode()
    {
        $mode = 'mpeg';
        $object = new MP3_Id3_Meta;
        $resultSetMode = $object->setMode($mode);

        $this->assertInstanceOf('MP3_Id3_Meta', $resultSetMode);

        $resultGetMode = $object->getMode();
        $this->assertEquals($mode, $resultGetMode);
    }

    public function testMpegVersion()
    {
        $mpegVersion = 1.2;
        $object = new MP3_Id3_Meta;
        $resultSetMpegVersion = $object->setMpegVersion($mpegVersion);

        $this->assertInstanceOf('MP3_Id3_Meta', $resultSetMpegVersion);

        $resultGetMpegVersion = $object->getMpegVersion();
        $this->assertEquals($mpegVersion, $resultGetMpegVersion);
    }

    public function testQuality()
    {
        $quality = 100;
        $object = new MP3_Id3_Meta;
        $resultSetQuality = $object->setQuality($quality);

        $this->assertInstanceOf('MP3_Id3_Meta', $resultSetQuality);

        $resultGetQuality = $object->getQuality();
        $this->assertEquals($quality, $resultGetQuality);
    }
}
