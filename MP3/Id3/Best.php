<?php
/**
 * MP3_Id3_Best
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

require_once 'PEAR.php';
require_once 'MP3/Id3/Id.php';
require_once 'MP3/Id3/Idv1.php';
require_once 'MP3/Id3/Idv2.php';
require_once 'MP3/Id3/Exception.php';
require_once 'MP3/Id3/Meta.php';

/**
 * MP3_Id3_Best
 *
 * This package provides handling of MP3 tags
 *
 * @category MP3
 * @package  MP3_Id3
 * @author   Gemorroj <wapinet@mail.ru>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/Gemorroj/MP3_Id3
 */
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


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idv1 = new MP3_Id3_Idv1();
        $this->idv2 = new MP3_Id3_Idv2();
        $this->meta = new MP3_Id3_Meta();
    }


    /**
     * Get Idv1 tags object
     *
     * @return MP3_Id3_Idv1
     */
    public function getIdv1()
    {
        return $this->idv1;
    }


    /**
     * Get Idv2 tags object
     *
     * @return MP3_Id3_Idv2
     */
    public function getIdv2()
    {
        return $this->idv2;
    }


    /**
     * Get meta object
     *
     * @return MP3_Id3_Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }


    /**
     * Read MP3 file
     *
     * @param string $file MP3 file
     *
     * @throws MP3_Id3_Exception
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
     * Write tags to MP3 file
     *
     * @param string $file MP3 file
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
     * Read meta data
     *
     * @throws MP3_Id3_Exception
     * @return MP3_Id3_Best
     */
    private function readMeta()
    {
        $idv1 = $this->idv1->getId();
        //$meta = $idv1->study();

        $level = error_reporting(E_ALL ^ E_NOTICE); // fix empty tags

        $meta = $idv1->_readframe();

        error_reporting($level);

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
     * Read MP3 tags
     *
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
        $this->setPicture($this->idv2->getPicture() ? $this->idv2->getPicture() : $this->idv1->getPicture());

        return $this;
    }


    /**
     * Write MP3 tags
     *
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
            ->setGenre($this->getGenre())
            ->setPicture($this->getPicture());

        return $this;
    }
}
