<?php

use Crystal\Crystal;

define('__Crystal_DIR_Theme__', __DIR__ . '/theme');
define('__Crystal_DIR_Image__', __DIR__ . '/image');
define('__Crystal_DIR_Temp__',  __DIR__ . '/temp');
define('__Crystal_DIR_App__',   __DIR__ . '/app');

require __DIR__ . '/config.ini.php';
require __DIR__ . '/vendor/autoload.php';
require __Crystal_DIR_App__ . '/Crystal.php';

Crystal::run();
