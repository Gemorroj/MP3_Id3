# This package provides handling of mp3 tags in PHP.

[![Build Status](https://secure.travis-ci.org/Gemorroj/MP3_Id3.png?branch=master)](https://travis-ci.org/Gemorroj/MP3_Id3)

Requirements:

1. PHP >= 5.2
2. PEAR
3. MP3_Id
4. MP3_IDv2

Example:
```php
<?php
set_include_path(dirname(__FILE__) . '/PEAR');
require_once 'MP3/Id3.php';

$id3 = new MP3_Id3('./file2.mp3');
$tags = $id3->getTags();

echo '<pre>';

print_r($id3->getMeta());

foreach ($tags as $k => $v) {
    if ($k === 'picture') {
        echo '<img src="data:' . $v->getMime() . ';base64,' . base64_encode($v->getData()) . '" alt="picture" />';
    } else {
        print_r($k . ' - ' . print_r($v, true));
    }
    echo "\n";
}

$tags->setComment('test2');
$tags->setGenreId(23);
$tags->setUrl('http://wapinet.ru');
$tags->setAlbumArtist('test');
//$id3->write();

echo '</pre>';
```