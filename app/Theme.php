<?php

namespace Crystal;

class Theme
{
    public static function make(String $template, array $data = [])
    {
        $config = (object)__Crystal_Config__;
        $data = (object)$data;

        require __Crystal_DIR_Theme__ . "/$template/index.html";
    }
}
