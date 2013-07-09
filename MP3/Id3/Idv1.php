<?php
/**
 * MP3_Id3_Idv1
 *
 * PHP versions 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  MP3
 * @package   MP3_Id3
 * @author    Gemorroj
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      https://github.com/Gemorroj/MP3_Id3
 */

require_once 'PEAR.php';
require_once 'MP3/Id.php';
require_once 'MP3/Id3/Id.php';
require_once 'MP3/Id3/Genre.php';
require_once 'MP3/Id3/Exception.php';

class MP3_Id3_Idv1 extends MP3_Id3_Id
{
    /**
     * @var MP3_Id
     */
    private $id;

    public function __construct()
    {
        $this->id = new MP3_Id();
    }

    /**
     * @return MP3_Id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $file
     *
     * @throws MP3_Id3_Exception
     * @return MP3_Id3_Idv1
     */
    public function read($file)
    {
        $read = $this->id->read($file);
        if (PEAR::isError($read) && $read->getCode() !== PEAR_MP3_ID_TNF) {
            throw new MP3_Id3_Exception($read->getMessage(), $read->getCode());
        }
        $this->readTags();

        return $this;
    }


    /**
     * @param string $file
     *
     * @throws MP3_Id3_Exception
     * @return MP3_Id3_Idv1
     */
    public function write($file)
    {
        $this->writeTags();

        $this->id->file = $file;
        //$write = $this->id->write();
        $write = $this->id->_write_v1();
        if (PEAR::isError($write)) {
            throw new MP3_Id3_Exception($write->getMessage(), $write->getCode());
        }

        return $this;
    }


    /**
     * @return MP3_Id3_Idv1
     */
    protected function readTags()
    {
        $this->setTrackNumber($this->id->track);
        $this->setTrackTitle($this->id->name);
        $this->setArtistName($this->id->artists);
        $this->setAlbumTitle($this->id->album);
        $this->setYear($this->id->year);
        $this->setComment($this->id->comment);
        $this->setCopyright($this->id->copyright);

        $genre = new MP3_Id3_Genre();
        $genre->setGenre($this->id->genreno);
        $this->setGenre($genre);

        return $this;
    }


    /**
     * @return MP3_Id3_Idv1
     */
    protected function writeTags()
    {
        $this->id->track = $this->getTrackNumber();
        $this->id->name = $this->getTrackTitle();
        $this->id->artists = $this->getArtistName();
        $this->id->album = $this->getAlbumTitle();
        $this->id->year = $this->getYear();
        $this->id->comment = $this->getComment();
        $this->id->copyright = $this->getCopyright();
        $this->id->genreno = $this->getGenre()->getId();
        $this->id->genre = $this->getGenre()->getName();

        return $this;
    }
}
