<?php
require_once 'MP3/Id3/Id.php';

class MP3_Id3_IdTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    protected $mock;

    protected function setUp()
    {
        $this->mock = $this->getMockForAbstractClass('MP3_Id3_Id');
    }

    public function testMock()
    {
        $this->assertInstanceOf('MP3_Id3_Id', $this->mock);
    }


    public function testGetIterator()
    {
        $this->assertInstanceOf('ArrayIterator', $this->mock->getIterator());
    }

    public function testAlbumTitle()
    {
        $albumTitle = 'testAlbumTitle';

        $setAlbumTitle = $this->mock->setAlbumTitle($albumTitle);
        $this->assertInstanceOf('MP3_Id3_Id', $setAlbumTitle);

        $getAlbumTitle = $this->mock->getAlbumTitle();
        $this->assertEquals($albumTitle, $getAlbumTitle);
    }

    public function testArtistName()
    {
        $artistName = 'testArtistName';

        $setArtistName = $this->mock->setArtistName($artistName);
        $this->assertInstanceOf('MP3_Id3_Id', $setArtistName);

        $getArtistName = $this->mock->getArtistName();
        $this->assertEquals($artistName, $getArtistName);
    }

    public function testComment()
    {
        $comment = 'testComment';

        $setComment = $this->mock->setComment($comment);
        $this->assertInstanceOf('MP3_Id3_Id', $setComment);

        $getComment = $this->mock->getComment();
        $this->assertEquals($comment, $getComment);
    }

    public function testComposer()
    {
        $composer = 'testComposer';

        $setComposer = $this->mock->setComposer($composer);
        $this->assertInstanceOf('MP3_Id3_Id', $setComposer);

        $getComposer = $this->mock->getComposer();
        $this->assertEquals($composer, $getComposer);
    }

    public function testCopyright()
    {
        $copyright = 'testCopyright';

        $setCopyright = $this->mock->setCopyright($copyright);
        $this->assertInstanceOf('MP3_Id3_Id', $setCopyright);

        $getCopyright = $this->mock->getCopyright();
        $this->assertEquals($copyright, $getCopyright);
    }

    public function testGenreId()
    {
        $genreId = 0;

        $setGenreId = $this->mock->setGenreId($genreId);
        $this->assertInstanceOf('MP3_Id3_Id', $setGenreId);

        $getGenre = $this->mock->getGenre();
        $this->assertInstanceOf('MP3_Id3_Genre', $getGenre);
        $this->assertEquals($genreId, $getGenre->getId());
    }

    public function testGenreIdFail()
    {
        $genreId = -1;

        $setGenreId = $this->mock->setGenreId($genreId);
        $this->assertInstanceOf('MP3_Id3_Id', $setGenreId);

        $getGenre = $this->mock->getGenre();
        $this->assertInstanceOf('MP3_Id3_Genre', $getGenre);
        $this->assertNull($getGenre->getId());
    }

    public function testGenre()
    {
        $genre = $this->getMock('MP3_Id3_Genre');
        $genre->setId(0);

        $setGenre = $this->mock->setGenre($genre);
        $this->assertInstanceOf('MP3_Id3_Id', $setGenre);

        $getGenre = $this->mock->getGenre();
        $this->assertInstanceOf('MP3_Id3_Genre', $getGenre);
        $this->assertEquals($genre, $getGenre);
    }

    public function testGenreFail()
    {
        $genre = $this->getMock('MP3_Id3_Genre');
        $genre->setId(-1);

        $setGenreId = $this->mock->setGenre($genre);
        $this->assertInstanceOf('MP3_Id3_Id', $setGenreId);

        $getGenre = $this->mock->getGenre();
        $this->assertInstanceOf('MP3_Id3_Genre', $getGenre);
        $this->assertEquals($genre, $getGenre);
    }

    public function testTrackTitle()
    {
        $trackTitle = 'testTrackTitle';

        $setTrackTitle = $this->mock->setTrackTitle($trackTitle);
        $this->assertInstanceOf('MP3_Id3_Id', $setTrackTitle);

        $getTrackTitle = $this->mock->getTrackTitle();
        $this->assertEquals($trackTitle, $getTrackTitle);
    }

    public function testTrackNumber()
    {
        $trackNumber = 'testTrackNumber';

        $setTrackNumber = $this->mock->setTrackNumber($trackNumber);
        $this->assertInstanceOf('MP3_Id3_Id', $setTrackNumber);

        $getTrackNumber = $this->mock->getTrackNumber();
        $this->assertEquals($trackNumber, $getTrackNumber);
    }

    public function testUrl()
    {
        $url = 'testUrl';

        $setUrl = $this->mock->setUrl($url);
        $this->assertInstanceOf('MP3_Id3_Id', $setUrl);

        $getUrl = $this->mock->getUrl();
        $this->assertEquals($url, $getUrl);
    }

    public function testYear()
    {
        $year = 'testYear';

        $setYear = $this->mock->setYear($year);
        $this->assertInstanceOf('MP3_Id3_Id', $setYear);

        $getYear = $this->mock->getYear();
        $this->assertEquals($year, $getYear);
    }

    public function testEncodedBy()
    {
        $encodedBy = 'testEncodedBy';

        $setEncodedBy = $this->mock->setEncodedBy($encodedBy);
        $this->assertInstanceOf('MP3_Id3_Id', $setEncodedBy);

        $getEncodedBy = $this->mock->getEncodedBy();
        $this->assertEquals($encodedBy, $getEncodedBy);
    }

    public function testAlbumArtist()
    {
        $albumArtist = 'testAlbumArtist';

        $setAlbumArtist = $this->mock->setEncodedBy($albumArtist);
        $this->assertInstanceOf('MP3_Id3_Id', $setAlbumArtist);

        $getAlbumArtist = $this->mock->getAlbumArtist();
        $this->assertEquals($albumArtist, $getAlbumArtist);
    }

    public function testPicture()
    {
        $picture = $this->getMock('MP3_Id3_Picture');
        $picture->setData('testData');
        $picture->setMime('testMime');

        $setPicture = $this->mock->setPicture($picture);
        $this->assertInstanceOf('MP3_Id3_Id', $setPicture);

        $getPicture = $this->mock->getPicture();
        $this->assertInstanceOf('MP3_Id3_Picture', $getPicture);
        $this->assertEquals($picture, $getPicture);
    }

    public function testPictureFail()
    {
        $getPicture = $this->mock->getPicture();
        $this->assertInstanceOf('MP3_Id3_Picture', $getPicture);
        $this->assertNull($getPicture->getData());
        $this->assertNull($getPicture->getMime());
    }
}
