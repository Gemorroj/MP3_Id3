<?php
/**
 * MP3_Id3_Picture
 *
 * PHP versions 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
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
 * MP3_Id3_Picture
 *
 * Picture tag
 *
 * @category MP3
 * @package  MP3_Id3
 * @author   Gemorroj <wapinet@mail.ru>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/Gemorroj/MP3_Id3
 */
class MP3_Id3_Picture
{
    /**
     * @var string
     */
    protected $data;
    /**
     * @var string
     */
    protected $mime;


    /**
     * Set picture content
     *
     * @param string $data Picture content
     *
     * @return MP3_Id3_Picture
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }


    /**
     * Get picture content
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * Set picture MIME
     *
     * @param string $mime Picture MIME
     *
     * @return MP3_Id3_Picture
     */
    public function setMime($mime)
    {
        $this->mime = $mime;

        return $this;
    }


    /**
     * Get picture MIME
     *
     * @return string
     */
    public function getMime()
    {
        return $this->mime;
    }
}
