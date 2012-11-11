<?php
/**
 *
 * This software is distributed under the GNU GPL v3.0 license.
 *
 * @author    Gemorroj
 * @copyright 2012 http://wapinet.ru
 * @license   http://www.gnu.org/licenses/gpl-3.0.txt
 * @link      https://github.com/Gemorroj/MP3_Id3
 * @version   0.1 alpha
 *
 */

require_once 'MP3/Id3/Genre.php';

abstract class MP3_Id3_Id implements IteratorAggregate
{
    protected $trackNumber;
    protected $trackTitle;
    protected $artistName;
    protected $albumTitle;
    protected $albumArtist;
    protected $year;
    protected $genre;
    protected $comment;
    protected $composer;
    protected $copyright;
    protected $url;
    protected $encodedBy;


    abstract public function write($file);
    abstract public function read($file);


    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator(get_object_vars($this));
    }

    public function setAlbumTitle($albumTitle)
    {
        $this->albumTitle = $albumTitle;

        return $this;
    }

    public function getAlbumTitle()
    {
        return $this->albumTitle;
    }

    public function setArtistName($artistName)
    {
        $this->artistName = $artistName;

        return $this;
    }

    public function getArtistName()
    {
        return $this->artistName;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComposer($composer)
    {
        $this->composer = $composer;

        return $this;
    }

    public function getComposer()
    {
        return $this->composer;
    }

    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }

    public function getCopyright()
    {
        return $this->copyright;
    }

    public function setGenreId($genreId)
    {
        $genre = new MP3_Id3_Genre();
        $genre->setGenre($genreId);
        $this->genre = $genre;

        return $this;
    }

    public function setGenre(MP3_Id3_Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return MP3_Id3_Genre
     */
    public function getGenre()
    {
        return (null === $this->genre ? new MP3_Id3_Genre() : $this->genre);
    }

    public function setTrackTitle($trackTitle)
    {
        $this->trackTitle = $trackTitle;

        return $this;
    }

    public function getTrackTitle()
    {
        return $this->trackTitle;
    }

    public function setTrackNumber($trackNumber)
    {
        $this->trackNumber = $trackNumber;

        return $this;
    }

    public function getTrackNumber()
    {
        return $this->trackNumber;
    }

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setEncodedBy($encodedBy)
    {
        $this->encodedBy = $encodedBy;

        return $this;
    }

    public function getEncodedBy()
    {
        return $this->encodedBy;
    }

    public function setAlbumArtist($albumArtist)
    {
        $this->albumArtist = $albumArtist;

        return $this;
    }

    public function getAlbumArtist()
    {
        return $this->albumArtist;
    }
}
