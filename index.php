<?php

use Crystal\Exif;
use lsolesen\pel\PelJpeg;
use lsolesen\pel\PelTag;

define('__Crystal_DIR_Theme__', __DIR__ . '/theme');
define('__Crystal_DIR_Image__', __DIR__ . '/image');
define('__Crystal_DIR_Temp__',  __DIR__ . '/temp');
define('__Crystal_DIR_App__',   __DIR__ . '/app');

require __DIR__ . '/vendor/autoload.php';
require __Crystal_DIR_App__ . '/Crystal.php';

print_r(Exif::fetchDir(__Crystal_DIR_Image__));
