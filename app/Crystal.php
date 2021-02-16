<?php

namespace Crystal;

require __Crystal_DIR_App__ . '/Exif.php';
require __Crystal_DIR_App__ . '/Temp.php';
require __Crystal_DIR_App__ . '/Theme.php';
require __Crystal_DIR_App__ . '/Thumb.php';

class Crystal
{
    static public function run()
    {
        Temp::getImages($images);
        Temp::updateThumb($images);
        Theme::make(__Crystal_Config__['theme'], ['images' => $images]);
    }
}
