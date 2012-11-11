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

require_once 'PEAR.php';
require_once 'MP3/Id3/Id.php';
require_once 'MP3/Id3/Idv1.php';
require_once 'MP3/Id3/Idv2.php';
require_once 'MP3/Id3/Exception.php';
require_once 'MP3/Id3/Meta.php';

class MP3_Id3_Best extends MP3_Id3_Id
{
    /**
     * @var MP3_Id3_Idv1
     */
    private $idv1;
    /**
     * @var MP3_Id3_Idv2
     */
    private $idv2;
    /**
     * @var MP3_Id3_Meta
     */
    private $meta;


    public function __construct()
    {
        $this->idv1 = new MP3_Id3_Idv1();
        $this->idv2 = new MP3_Id3_Idv2();
        $this->meta = new MP3_Id3_Meta();
    }


    /**
     * @return MP3_Id3_Idv1
     */
    public function getIdv1()
    {
        return $this->idv1;
    }

    /**
     * @return MP3_Id3_Idv2
     */
    public function getIdv2()
    {
        return $this->idv2;
    }

    /**
     * @return MP3_Id3_Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }


    /**
     * @param string $file
     *
     * @return MP3_Id3_Best
     */
    public function read($file)
    {
        $this->idv1->read($file);
        $this->idv2->read($file);

        $this->readTags();
        $this->readMeta();

        return $this;
    }

    /**
     * @param string $file
     *
     * @return MP3_Id3_Best
     */
    public function write($file)
    {
        $this->writeTags();

        $this->idv1->write($file);
        $this->idv2->write($file);

        return $this;
    }

    /**
     * @throws MP3_Id3_Exception
     * @return MP3_Id3_Best
     */
    private function readMeta()
    {
        $idv1 = $this->idv1->getId();
        //$meta = $idv1->study();
        $meta = $idv1->_readframe();
        if (PEAR::isError($meta)) {
            throw new MP3_Id3_Exception($meta->getMessage(), $meta->getCode());
        }

        $this->meta->setFilesize($idv1->filesize);
        $this->meta->setEncodingType($idv1->encoding_type);
        $this->meta->setMpegVersion($idv1->mpeg_ver);
        $this->meta->setFrequency($idv1->frequency);
        $this->meta->setMode($idv1->mode);
        $this->meta->setLayer($idv1->layer);
        $this->meta->setBitrate($idv1->bitrate);
        $this->meta->setLength($idv1->lengths);
        $this->meta->setQuality($idv1->quality);

        return $this;
    }

    /**
     * @return MP3_Id3_Best
     */
    protected function readTags()
    {
        $this->setTrackNumber(
            $this->idv2->getTrackNumber() ? $this->idv2->getTrackNumber() : $this->idv1->getTrackNumber()
        );
        $this->setTrackTitle(
            $this->idv2->getTrackTitle() ? $this->idv2->getTrackTitle() : $this->idv1->getTrackTitle()
        );
        $this->setArtistName(
            $this->idv2->getArtistName() ? $this->idv2->getArtistName() : $this->idv1->getArtistName()
        );
        $this->setAlbumTitle(
            $this->idv2->getAlbumTitle() ? $this->idv2->getAlbumTitle() : $this->idv1->getAlbumTitle()
        );
        $this->setAlbumArtist(
            $this->idv2->getAlbumArtist() ? $this->idv2->getAlbumArtist() : $this->idv1->getAlbumArtist()
        );
        $this->setYear($this->idv2->getYear() ? $this->idv2->getYear() : $this->idv1->getYear());
        $this->setComment($this->idv2->getComment() ? $this->idv2->getComment() : $this->idv1->getComment());
        $this->setComposer($this->idv2->getComposer() ? $this->idv2->getComposer() : $this->idv1->getComposer());
        $this->setCopyright($this->idv2->getCopyright() ? $this->idv2->getCopyright() : $this->idv1->getCopyright());
        $this->setUrl($this->idv2->getUrl() ? $this->idv2->getUrl() : $this->idv1->getUrl());
        $this->setEncodedBy($this->idv2->getEncodedBy() ? $this->idv2->getEncodedBy() : $this->idv1->getEncodedBy());
        $this->setGenre($this->idv2->getGenre() ? $this->idv2->getGenre() : $this->idv1->getGenre());

        return $this;
    }


    /**
     * @return MP3_Id3_Best
     */
    protected function writeTags()
    {
        $this->idv1
            ->setTrackNumber($this->getTrackNumber())
            ->setTrackTitle($this->getTrackTitle())
            ->setArtistName($this->getArtistName())
            ->setAlbumTitle($this->getAlbumTitle())
            ->setAlbumArtist($this->getAlbumArtist())
            ->setYear($this->getYear())
            ->setComment($this->getComment())
            ->setComposer($this->getComposer())
            ->setCopyright($this->getCopyright())
            ->setUrl($this->getUrl())
            ->setEncodedBy($this->getEncodedBy())
            ->setGenre($this->getGenre());

        $this->idv2
            ->setTrackNumber($this->getTrackNumber())
            ->setTrackTitle($this->getTrackTitle())
            ->setArtistName($this->getArtistName())
            ->setAlbumTitle($this->getAlbumTitle())
            ->setAlbumArtist($this->getAlbumArtist())
            ->setYear($this->getYear())
            ->setComment($this->getComment())
            ->setComposer($this->getComposer())
            ->setCopyright($this->getCopyright())
            ->setUrl($this->getUrl())
            ->setEncodedBy($this->getEncodedBy())
            ->setGenre($this->getGenre());

        return $this;
    }
}
