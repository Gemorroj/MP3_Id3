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

    /**
     * @param string $albumTitle
     *
     * @return MP3_Id3_Id
     */
    public function setAlbumTitle($albumTitle)
    {
        $this->albumTitle = $albumTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlbumTitle()
    {
        return $this->albumTitle;
    }

    /**
     * @param string $artistName
     *
     * @return MP3_Id3_Id
     */
    public function setArtistName($artistName)
    {
        $this->artistName = $artistName;

        return $this;
    }

    /**
     * @return string
     */
    public function getArtistName()
    {
        return $this->artistName;
    }

    /**
     * @param string $comment
     *
     * @return MP3_Id3_Id
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $composer
     *
     * @return MP3_Id3_Id
     */
    public function setComposer($composer)
    {
        $this->composer = $composer;

        return $this;
    }

    /**
     * @return string
     */
    public function getComposer()
    {
        return $this->composer;
    }

    /**
     * @param string $copyright
     *
     * @return MP3_Id3_Id
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }

    /**
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @param string $genreId
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
     * @param MP3_Id3_Genre $genre
     *
     * @return MP3_Id3_Id
     */
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

    /**
     * @param string $trackTitle
     *
     * @return MP3_Id3_Id
     */
    public function setTrackTitle($trackTitle)
    {
        $this->trackTitle = $trackTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrackTitle()
    {
        return $this->trackTitle;
    }

    /**
     * @param string $trackNumber
     *
     * @return MP3_Id3_Id
     */
    public function setTrackNumber($trackNumber)
    {
        $this->trackNumber = $trackNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrackNumber()
    {
        return $this->trackNumber;
    }

    /**
     * @param string $url
     *
     * @return MP3_Id3_Id
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $year
     *
     * @return MP3_Id3_Id
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param string $encodedBy
     *
     * @return MP3_Id3_Id
     */
    public function setEncodedBy($encodedBy)
    {
        $this->encodedBy = $encodedBy;

        return $this;
    }

    /**
     * @return string
     */
    public function getEncodedBy()
    {
        return $this->encodedBy;
    }

    /**
     * @param string $albumArtist
     *
     * @return MP3_Id3_Id
     */
    public function setAlbumArtist($albumArtist)
    {
        $this->albumArtist = $albumArtist;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlbumArtist()
    {
        return $this->albumArtist;
    }
}
