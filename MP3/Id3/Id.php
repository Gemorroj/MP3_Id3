<?php
/**
 * MP3_Id3_Id
 *
 * PHP versions 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category MP3
 * @package  MP3_Id3
 * @author   Gemorroj <wapinet@mail.ru>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/Gemorroj/MP3_Id3
 */

require_once 'MP3/Id3/Genre.php';

/**
 * MP3_Id3_Id
 *
 * This package provides handling of MP3 tags
 *
 * @category MP3
 * @package  MP3_Id3
 * @author   Gemorroj <wapinet@mail.ru>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/Gemorroj/MP3_Id3
 */
abstract class MP3_Id3_Id implements IteratorAggregate
{
    /**
     * @var string
     */
    protected $trackNumber;
    /**
     * @var string
     */
    protected $trackTitle;
    /**
     * @var string
     */
    protected $artistName;
    /**
     * @var string
     */
    protected $albumTitle;
    /**
     * @var string
     */
    protected $albumArtist;
    /**
     * @var string
     */
    protected $year;
    /**
     * @var MP3_Id3_Genre
     */
    protected $genre;
    /**
     * @var string
     */
    protected $comment;
    /**
     * @var string
     */
    protected $composer;
    /**
     * @var string
     */
    protected $copyright;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $encodedBy;
    /**
     * @var MP3_Id3_Picture
     */
    protected $picture;


    /**
     * Write MP3 file
     *
     * @param string $file MP3 file
     *
     * @return MP3_Id3_Id
     */
    abstract public function write($file);

    /**
     * Read MP3 file
     *
     * @param string $file MP3 file
     *
     * @return MP3_Id3_Id
     */
    abstract public function read($file);


    /**
     * Get ArrayIterator
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator(get_object_vars($this));
    }


    /**
     * Set album title
     *
     * @param string $albumTitle Album title
     *
     * @return MP3_Id3_Id
     */
    public function setAlbumTitle($albumTitle)
    {
        $this->albumTitle = $albumTitle;

        return $this;
    }


    /**
     * Get album title
     *
     * @return string
     */
    public function getAlbumTitle()
    {
        return $this->albumTitle;
    }


    /**
     * Set artist name
     *
     * @param string $artistName Artist name
     *
     * @return MP3_Id3_Id
     */
    public function setArtistName($artistName)
    {
        $this->artistName = $artistName;

        return $this;
    }


    /**
     * Get artist name
     *
     * @return string
     */
    public function getArtistName()
    {
        return $this->artistName;
    }


    /**
     * Set comment
     *
     * @param string $comment Comment
     *
     * @return MP3_Id3_Id
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }


    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }


    /**
     * Set composer
     *
     * @param string $composer Composer
     *
     * @return MP3_Id3_Id
     */
    public function setComposer($composer)
    {
        $this->composer = $composer;

        return $this;
    }


    /**
     * Get composer
     *
     * @return string
     */
    public function getComposer()
    {
        return $this->composer;
    }


    /**
     * Set copyright
     *
     * @param string $copyright Copyright
     *
     * @return MP3_Id3_Id
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }


    /**
     * Get copyright
     *
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }


    /**
     * Set genre id
     *
     * @param string $genreId Genre id
     *
     * @return MP3_Id3_Id
     */
    public function setGenreId($genreId)
    {
        $genre = new MP3_Id3_Genre();
        $genre->setGenre($genreId);
        $this->genre = $genre;

        return $this;
    }


    /**
     * Set genre object
     *
     * @param MP3_Id3_Genre $genre Genre object
     *
     * @return MP3_Id3_Id
     */
    public function setGenre(MP3_Id3_Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }


    /**
     * Get genre object
     *
     * @return MP3_Id3_Genre
     */
    public function getGenre()
    {
        return (null === $this->genre ? new MP3_Id3_Genre() : $this->genre);
    }


    /**
     * Set track title
     *
     * @param string $trackTitle Track title
     *
     * @return MP3_Id3_Id
     */
    public function setTrackTitle($trackTitle)
    {
        $this->trackTitle = $trackTitle;

        return $this;
    }


    /**
     * Get track title
     *
     * @return string
     */
    public function getTrackTitle()
    {
        return $this->trackTitle;
    }


    /**
     * Set track number
     *
     * @param string $trackNumber Track number
     *
     * @return MP3_Id3_Id
     */
    public function setTrackNumber($trackNumber)
    {
        $this->trackNumber = $trackNumber;

        return $this;
    }


    /**
     * Get track number
     *
     * @return string
     */
    public function getTrackNumber()
    {
        return $this->trackNumber;
    }


    /**
     * Set url
     *
     * @param string $url Url
     *
     * @return MP3_Id3_Id
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }


    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }


    /**
     * Set year
     *
     * @param string $year Year
     *
     * @return MP3_Id3_Id
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }


    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }


    /**
     * Set encoded by
     *
     * @param string $encodedBy Encoded by
     *
     * @return MP3_Id3_Id
     */
    public function setEncodedBy($encodedBy)
    {
        $this->encodedBy = $encodedBy;

        return $this;
    }


    /**
     * Get encoded by
     *
     * @return string
     */
    public function getEncodedBy()
    {
        return $this->encodedBy;
    }


    /**
     * Set album artist
     *
     * @param string $albumArtist Album artist
     *
     * @return MP3_Id3_Id
     */
    public function setAlbumArtist($albumArtist)
    {
        $this->albumArtist = $albumArtist;

        return $this;
    }


    /**
     * Get album artist
     *
     * @return string
     */
    public function getAlbumArtist()
    {
        return $this->albumArtist;
    }


    /**
     * Set picture object
     *
     * @param MP3_Id3_Picture $picture Picture object
     *
     * @return MP3_Id3_Id
     */
    public function setPicture(MP3_Id3_Picture $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }


    /**
     * Get picture object
     *
     * @return MP3_Id3_Picture
     */
    public function getPicture()
    {
        return (null === $this->picture ? new MP3_Id3_Picture() : $this->picture);
    }
}
