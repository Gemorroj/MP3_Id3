<?php
/**
 * MP3_Id3_Idv2
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
require_once 'MP3/IDv2/Reader.php';
require_once 'MP3/IDv2/Writer.php';
require_once 'MP3/Id3/Id.php';
require_once 'MP3/Id3/Genre.php';
require_once 'MP3/Id3/Picture.php';
require_once 'MP3/Id3/Exception.php';
require_once 'MP3/IDv2/Tag.php';
require_once 'MP3/IDv2/Frame/APIC.php';
require_once 'MP3/IDv2/Frame/TCON.php';
require_once 'MP3/IDv2/Frame/TRCK.php';
require_once 'MP3/IDv2/Frame/TIT2.php';
require_once 'MP3/IDv2/Frame/TOPE.php';
require_once 'MP3/IDv2/Frame/TALB.php';
require_once 'MP3/IDv2/Frame/TPE2.php';
require_once 'MP3/IDv2/Frame/TYER.php';
require_once 'MP3/IDv2/Frame/TCOP.php';
require_once 'MP3/IDv2/Frame/WOAF.php';
require_once 'MP3/IDv2/Frame/TCOM.php';
require_once 'MP3/IDv2/Frame/TENC.php';
require_once 'MP3/IDv2/Frame/TXXX.php';

/**
 * MP3_Id3_Idv2
 *
 * This package provides handling of MP3 tags
 *
 * @category MP3
 * @package  MP3_Id3
 * @author   Gemorroj <wapinet@mail.ru>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/Gemorroj/MP3_Id3
 * @see      http://wiki.hydrogenaudio.org/index.php?title=Foobar2000:ID3_Tag_Mapping
 */
class MP3_Id3_Idv2 extends MP3_Id3_Id
{
    /**
     * @var MP3_IDv2_Reader
     */
    private $reader;
    /**
     * @var MP3_IDv2_Writer
     */
    private $writer;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reader = new MP3_IDv2_Reader();
        $this->writer = new MP3_IDv2_Writer();
    }


    /**
     * Get id object
     *
     * @return MP3_IDv2_Reader
     */
    public function getId()
    {
        return $this->reader;
    }


    /**
     * Read MP3 file
     *
     * @param string $file MP3 file
     *
     * @throws MP3_Id3_Exception
     * @return MP3_Id3_Idv2
     */
    public function read($file)
    {
        $read = $this->reader->read($file);
        if (PEAR::isError($read)) {
            throw new MP3_Id3_Exception($read->getMessage(), $read->getCode());
        }
        $this->readTags();

        return $this;
    }


    /**
     * Write tags to MP3 file
     *
     * @param string $file MP3 file
     *
     * @throws MP3_Id3_Exception
     * @return MP3_Id3_Idv2
     */
    public function write($file)
    {
        if (file_exists($file) !== true) {
            throw new MP3_Id3_Exception('File "' . $file . '" not found');
        }
        if (is_writable($file) !== true) {
            throw new MP3_Id3_Exception('File "' . $file . '" is not writable');
        }

        $this->writeTags();

        $write = $this->writer->write($file);
        if (PEAR::isError($write)) {
            throw new MP3_Id3_Exception($write->getMessage(), $write->getCode());
        }

        return $this;
    }


    /**
     * Write MP3 tags
     *
     * @return MP3_Id3_Idv2
     */
    protected function writeTags()
    {
        //$tag = $this->reader->getTag();
        $tag = new MP3_IDv2_Tag();

        foreach ($this as $key => $value) {
            switch ($key) {
            case 'trackNumber':
                $frame = new MP3_IDv2_Frame_TRCK();
                $frame->setText($value);
                $tag->addFrame($frame);
                break;

            case 'trackTitle':
                $frame = new MP3_IDv2_Frame_TIT2();
                $frame->setText($value);
                $tag->addFrame($frame);
                break;

            case 'artistName':
                $frame = new MP3_IDv2_Frame_TOPE();
                $frame->addArtist($value);
                $tag->addFrame($frame);
                break;

            case 'albumTitle':
                $frame = new MP3_IDv2_Frame_TALB();
                $frame->setText($value);
                $tag->addFrame($frame);
                break;

            case 'albumArtist':
                $frame = new MP3_IDv2_Frame_TPE2();
                $frame->setText($value);
                $tag->addFrame($frame);
                break;

            case 'year':
                $frame = new MP3_IDv2_Frame_TYER();
                $frame->setText($value);
                $tag->addFrame($frame);
                break;

            case 'copyright':
                $frame = new MP3_IDv2_Frame_TCOP();
                $frame->setText($value);
                $tag->addFrame($frame);
                break;

            case 'url':
                $frame = new MP3_IDv2_Frame_WOAF();
                $frame->setUrl($value);
                $tag->addFrame($frame);
                break;

            case 'composer':
                $frame = new MP3_IDv2_Frame_TCOM();
                $frame->addComposer($value);
                $tag->addFrame($frame);
                break;

            case 'encodedBy':
                $frame = new MP3_IDv2_Frame_TENC();
                $frame->setText($value);
                $tag->addFrame($frame);
                break;

            case 'comment':
                $frame = new MP3_IDv2_Frame_TXXX();
                $frame->setValue($value);
                $tag->addFrame($frame);
                break;

            case 'genre':
                $frame = new MP3_IDv2_Frame_TCON();
                $frame->addGenre($this->getGenre()->getId(), $this->getGenre()->getName());
                $tag->addFrame($frame);
                break;

            case 'picture':
                $frame = new MP3_IDv2_Frame_APIC();

                $frame->setMimeType($this->getPicture()->getMime());
                $frame->setPicture($this->getPicture()->getData());

                $tag->addFrame($frame);
                break;
            }
        }

        $this->writer->addTag($tag);

        return $this;
    }


    /**
     * Read MP3 tags
     *
     * @return MP3_Id3_Idv2
     */
    protected function readTags()
    {
        $level = error_reporting(E_ALL ^ E_NOTICE); // fix empty tags

        $tag = $this->reader->getTag();

        error_reporting($level);

        if ($tag instanceof MP3_IDv2_Tag) {
            foreach ($tag->getFrames() as $v) {
                switch ($v->getId()) {
                case 'TRCK':
                    $this->setTrackNumber($v->getText());
                    break;

                case 'TIT2':
                    $this->setTrackTitle($v->getText());
                    break;

                case 'TOPE':
                    $this->setArtistName($v->getText());
                    break;

                case 'TALB':
                    $this->setAlbumTitle($v->getText());
                    break;

                case 'TPE2':
                    $this->setAlbumArtist($v->getText());
                    break;

                case 'TYER':
                    $this->setYear($v->getText());
                    break;

                case 'TCOP':
                    $this->setCopyright($v->getText());
                    break;

                case 'WOAF':
                    $this->setUrl($v->getUrl());
                    break;

                case 'TCOM':
                    $this->setComposer($v->getText());
                    break;

                case 'TENC':
                    $this->setEncodedBy($v->getText());
                    break;

                case 'TXXX':
                    $this->setComment($v->getValue());
                    break;

                case 'TCON':
                    $genre = new MP3_Id3_Genre();
                    $genres = $v->getGenres();
                    $genre->setGenre($genres[0]);
                    $this->setGenre($genre);
                    break;

                case 'APIC':
                    $picture = new MP3_Id3_Picture();
                    $picture->setMime($v->getMimeType());
                    $picture->setData($v->getPicture());
                    $this->setPicture($picture);
                    break;
                }
            }
        }

        return $this;
    }
}
