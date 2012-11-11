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
    public function read()
    {
        $this->best->read($this->file);

        return $this;
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
