<?php

namespace Crystal;

class Theme
{
    public static function make(String $template, array $data = [])
    {
        $config = __Crystal_Config__;
        $config['option'] = (object)$config['option'];
        $config = (object)$config;
        $data = (object)$data;

        require __Crystal_DIR_Theme__ . "/$template/index.php";
    }
}
