<?php
/**
 * MP3_Id3_Picture
 *
 * PHP versions 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  MP3
 * @package   MP3_Id3
 * @author    Gemorroj
 * @license   http://www.php.net/license/3_0.txt  PHP License 3.0
 * @link      https://github.com/Gemorroj/MP3_Id3
 */

class MP3_Id3_Picture
{
    protected $data;
    protected $mime;


    /**
     * @param string $data
     *
     * @return MP3_Id3_Picture
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $mime
     *
     * @return MP3_Id3_Picture
     */
    public function setMime($mime)
    {
        $this->mime = $mime;

        return $this;
    }

    /**
     * @return string
     */
    public function getMime()
    {
        return $this->mime;
    }
}
