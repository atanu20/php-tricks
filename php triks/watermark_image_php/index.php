<?php
// header('Content-Type:image/jpeg');
$stamp=imagecreatefromjpeg('stamp.jpg');
$sample=imagecreatefromjpeg('sample.jpg');
imagecopy($sample,$stamp,500,500,0,0,60,57);
imagejpeg($sample,'upload/abc.jpg');
?>