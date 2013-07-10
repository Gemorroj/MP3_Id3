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
 * @category MP3
 * @package  MP3_Id3
 * @author   Gemorroj <wapinet@mail.ru>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/Gemorroj/MP3_Id3
 */

/**
 * MP3_Id3_Meta
 *
 * This package provides handling of MP3 tags
 *
 * @category MP3
 * @package  MP3_Id3
 * @author   Gemorroj <wapinet@mail.ru>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/Gemorroj/MP3_Id3
 */
class MP3_Id3_Meta
{
    /**
     * @var int
     */
    protected $filesize;
    /**
     * @var string
     */
    protected $encodingType;
    /**
     * @var float
     */
    protected $mpegVersion;
    /**
     * @var int
     */
    protected $frequency;
    /**
     * @var string
     */
    protected $mode;
    /**
     * @var int
     */
    protected $layer;
    /**
     * @var int
     */
    protected $bitrate;
    /**
     * @var int
     */
    protected $length;
    /**
     * @var int
     */
    protected $quality;


    /**
     * Set bitrate
     *
     * @param int $bitrate Bitrate
     *
     * @return MP3_Id3_Meta
     */
    public function setBitrate($bitrate)
    {
        $this->bitrate = $bitrate;

        return $this;
    }


    /**
     * Get bitrate
     *
     * @return int
     */
    public function getBitrate()
    {
        return $this->bitrate;
    }


    /**
     * Set encoding type
     *
     * @param string $encodingType Encoding type
     *
     * @return MP3_Id3_Meta
     */
    public function setEncodingType($encodingType)
    {
        $this->encodingType = $encodingType;

        return $this;
    }


    /**
     * Get encoding type
     *
     * @return string
     */
    public function getEncodingType()
    {
        return $this->encodingType;
    }


    /**
     * Set file size
     *
     * @param int $filesize File size
     *
     * @return MP3_Id3_Meta
     */
    public function setFilesize($filesize)
    {
        $this->filesize = $filesize;

        return $this;
    }


    /**
     * Get file size
     *
     * @return int
     */
    public function getFilesize()
    {
        return $this->filesize;
    }


    /**
     * Set frequency
     *
     * @param int $frequency Frequency
     *
     * @return MP3_Id3_Meta
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }


    /**
     * Get frequency
     *
     * @return int
     */
    public function getFrequency()
    {
        return $this->frequency;
    }


    /**
     * Set layer
     *
     * @param int $layer Layer
     *
     * @return MP3_Id3_Meta
     */
    public function setLayer($layer)
    {
        $this->layer = $layer;

        return $this;
    }


    /**
     * Get layer
     *
     * @return int
     */
    public function getLayer()
    {
        return $this->layer;
    }


    /**
     * Set length
     *
     * @param int $length Length
     *
     * @return MP3_Id3_Meta
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }


    /**
     * Get length
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }


    /**
     * Set mode
     *
     * @param string $mode Mode
     *
     * @return MP3_Id3_Meta
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }


    /**
     * Get mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }


    /**
     * Set mpeg version
     *
     * @param float $mpegVersion Mpeg version
     *
     * @return MP3_Id3_Meta
     */
    public function setMpegVersion($mpegVersion)
    {
        $this->mpegVersion = $mpegVersion;

        return $this;
    }


    /**
     * Get mpeg version
     *
     * @return float
     */
    public function getMpegVersion()
    {
        return $this->mpegVersion;
    }


    /**
     * Set quality
     *
     * @param int $quality Quality
     *
     * @return MP3_Id3_Meta
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }


    /**
     * Get quality
     *
     * @return int
     */
    public function getQuality()
    {
        return $this->quality;
    }
}
