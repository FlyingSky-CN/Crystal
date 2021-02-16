<?php

namespace Crystal;

class Temp
{
    static public function updateThumb(array $images)
    {
        foreach ($images as $image) {
            if (!self::hadTemp("thumb/$image->file"))
                Thumb::gen(
                    __Crystal_DIR_Image__ . "/$image->file",
                    __Crystal_DIR_Temp__ . "/thumb/$image->file"
                );
        }
    }

    static public function getImages(&$images)
    {
        $hash = md5(json_encode(scandir(__Crystal_DIR_Image__)));

        if (self::hadTemp("list/images-$hash.tmp")) {
            $images = unserialize(file_get_contents(__Crystal_DIR_Temp__ . "/list/images-$hash.tmp"));
        } else {
            $images = Exif::fetchDir(__Crystal_DIR_Image__);
            file_put_contents(__Crystal_DIR_Temp__ . "/list/images-$hash.tmp", serialize($images));
        }
    }

    static private function hadTemp(string $file)
    {
        return file_exists(__Crystal_DIR_Temp__ . "/$file");
    }
}
