<?php
/**
 * MP3_Id3_Meta
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

class MP3_Id3_Meta
{
    protected $filesize;
    protected $encodingType;
    protected $mpegVersion;
    protected $frequency;
    protected $mode;
    protected $layer;
    protected $bitrate;
    protected $length;
    protected $quality;


    /**
     * @param int $bitrate
     *
     * @return MP3_Id3_Meta
     */
    public function setBitrate($bitrate)
    {
        $this->bitrate = $bitrate;

        return $this;
    }

    /**
     * @return int
     */
    public function getBitrate()
    {
        return $this->bitrate;
    }

    /**
     * @param string $encodingType
     *
     * @return MP3_Id3_Meta
     */
    public function setEncodingType($encodingType)
    {
        $this->encodingType = $encodingType;

        return $this;
    }

    /**
     * @return string
     */
    public function getEncodingType()
    {
        return $this->encodingType;
    }

    /**
     * @param int $filesize
     *
     * @return MP3_Id3_Meta
     */
    public function setFilesize($filesize)
    {
        $this->filesize = $filesize;

        return $this;
    }

    /**
     * @return int
     */
    public function getFilesize()
    {
        return $this->filesize;
    }

    /**
     * @param int $frequency
     *
     * @return MP3_Id3_Meta
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * @return int
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param int $layer
     *
     * @return MP3_Id3_Meta
     */
    public function setLayer($layer)
    {
        $this->layer = $layer;

        return $this;
    }

    /**
     * @return int
     */
    public function getLayer()
    {
        return $this->layer;
    }

    /**
     * @param int $length
     *
     * @return MP3_Id3_Meta
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param string $mode
     *
     * @return MP3_Id3_Meta
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param float $mpegVersion
     *
     * @return MP3_Id3_Meta
     */
    public function setMpegVersion($mpegVersion)
    {
        $this->mpegVersion = $mpegVersion;

        return $this;
    }

    /**
     * @return float
     */
    public function getMpegVersion()
    {
        return $this->mpegVersion;
    }

    /**
     * @param int $quality
     *
     * @return MP3_Id3_Meta
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuality()
    {
        return $this->quality;
    }
}
