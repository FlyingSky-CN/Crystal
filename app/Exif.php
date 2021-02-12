<?php

namespace Crystal;

use lsolesen\pel\PelJpeg;
use lsolesen\pel\PelTag;

class Exif
{
    static public function fetchDir(string $dir)
    {
        if (!is_dir($dir)) return [];

        $files = array_diff(scandir($dir), ['.', '..', '.gitkeep']);
        $summaries = [];

        foreach ($files as $file) {
            $image = new Image($dir . '/' . $file, $file);
            $summaries[] = $image->getSummary();
        }

        return $summaries;
    }
}

/**
 * 
 */
class Image
{
    /**
     * @var \lsolesen\pel\PelJpeg
     */
    private $resource;

    /**
     * @var array
     */
    private $summary = [
        'file'  => 'image.jpg',
        'title' => 'No Title',
        'desc'  => 'No Description',
        'date'  => '1970-01-01',
    ];

    public function __construct(string $path, string $file)
    {
        $this->resource = new PelJpeg($path);
        $this->summary['file'] = $file;
    }

    /**
     * @return stdClass
     */
    public function getSummary()
    {
        if (($exif = $this->resource->getExif()) === null)
            return (object)$this->summary;

        $tiff = $exif->getTiff();
        $ifd0 = $tiff->getIfd();

        $desc = $ifd0->getEntry(PelTag::IMAGE_DESCRIPTION);
        $title = $ifd0->getEntry(PelTag::XP_TITLE);
        $date = $ifd0->getEntry(PelTag::DATE_TIME_ORIGINAL);

        $this->summary['title'] = $title->getValue();
        $this->summary['desc']  = $desc->getValue();
        $this->summary['date']  = '';//TODO

        return (object)$this->summary;
    }
}
