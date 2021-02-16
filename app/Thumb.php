<?php

namespace Crystal;

use Grafika\Grafika;

class Thumb
{
    const x = 560;
    const y = 320;

    static public function gen(string $from_path, string $to_path)
    {
        $editor = Grafika::createEditor();
        $editor->open($image, $from_path);
        $editor->resizeFill($image, self::x, self::y);
        $editor->save($image, $to_path);
    }
}
