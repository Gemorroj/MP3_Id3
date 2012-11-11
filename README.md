# Работа с MP3 тегами.

Пример:
```php
<?php
set_include_path(__DIR__);
require_once 'MP3/Id3.php';

$id3 = new MP3_Id3('./file.mp3');
$tags = $id3->getTags();

echo '<pre>';
print_r($id3->getMeta());

foreach ($tags as $k => $v) {
    print_r($k . ' - ' . $v);
    echo "\n";
}

$tags->setComment('test2');
$tags->setGenreId(23);
$tags->setUrl('http://example.com');
$tags->setAlbumArtist('test');
$id3->write();

echo '</pre>';
```