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
