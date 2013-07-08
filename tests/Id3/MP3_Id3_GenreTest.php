<?php
require_once 'MP3/Id3/Genre.php';

class MP3_Id3_GenreTest extends PHPUnit_Framework_TestCase
{
    public function testGetGenres()
    {
        $genres = MP3_Id3_Genre::getGenres();

        $this->assertTrue(is_array($genres));
        $this->assertNotEmpty($genres);
    }


    public function testToString()
    {
        $object = new MP3_Id3_Genre;

        $this->assertEquals('', (string)$object);

        $object->setGenre(0);// Blues
        $this->assertEquals('Blues', (string)$object);
    }


    public function testGetName()
    {
        $object = new MP3_Id3_Genre;

        $this->assertNull($object->getName());
        $object->setGenre(0);// Blues
        $this->assertEquals('Blues', $object->getName());
    }


    public function testGetId()
    {
        $object = new MP3_Id3_Genre;

        $this->assertNull($object->getId());
        $object->setGenre(0);// Blues
        $this->assertEquals(0, $object->getId());
    }


    public function testSetGenre()
    {
        $object = new MP3_Id3_Genre;
        $result = $object->setGenre(0);

        $this->assertInstanceOf('MP3_Id3_Genre', $result);

        $this->assertEquals(0, $object->getId());
        $this->assertEquals('Blues', $object->getName());
    }


    public function testInvalidSetGenre()
    {
        $object = new MP3_Id3_Genre;
        $result = $object->setGenre(-1);

        $this->assertInstanceOf('MP3_Id3_Genre', $result);

        $this->assertNull($object->getId());
        $this->assertNull($object->getName());
    }
}
