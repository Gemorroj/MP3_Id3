<?php
/**
 * MP3_Id3
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

require_once 'MP3/Id3/Best.php';

class MP3_Id3
{
    /**
     * @var string
     */
    private $file;
    /**
     * @var MP3_Id3_Best
     */
    private $best;


    /**
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
        $this->best = new MP3_Id3_Best();
        $this->best->read($this->file);
    }


    /**
     * @return MP3_Id3_Best
     */
    public function getTags()
    {
        return $this->best;
    }


    /**
     * @return MP3_Id3_Meta
     */
    public function getMeta()
    {
        return $this->best->getMeta();
    }


    /**
     * @throws MP3_Id3_Exception
     * @return MP3_Id3
     */
    public function write()
    {
        $this->best->write($this->file);

        return $this;
    }
}
