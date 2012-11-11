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


    public function setBitrate($bitrate)
    {
        $this->bitrate = $bitrate;

        return $this;
    }

    public function getBitrate()
    {
        return $this->bitrate;
    }

    public function setEncodingType($encodingType)
    {
        $this->encodingType = $encodingType;
        return $this;
    }

    public function getEncodingType()
    {
        return $this->encodingType;
    }

    public function setFilesize($filesize)
    {
        $this->filesize = $filesize;
        return $this;
    }

    public function getFilesize()
    {
        return $this->filesize;
    }

    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
        return $this;
    }

    public function getFrequency()
    {
        return $this->frequency;
    }

    public function setLayer($layer)
    {
        $this->layer = $layer;
        return $this;
    }

    public function getLayer()
    {
        return $this->layer;
    }

    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }

    public function getMode()
    {
        return $this->mode;
    }

    public function setMpegVersion($mpegVersion)
    {
        $this->mpegVersion = $mpegVersion;
        return $this;
    }

    public function getMpegVersion()
    {
        return $this->mpegVersion;
    }
}
