<?php

namespace Crystal;

use lsolesen\pel\PelIfd;
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

        array_multisort(array_column($summaries, 'date'), SORT_DESC, $summaries);

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
        $eifd = $ifd0->getSubIfd(PelIfd::EXIF);

        $desc = $ifd0->getEntry(PelTag::IMAGE_DESCRIPTION);
        $date = $eifd->getEntry(PelTag::DATE_TIME_ORIGINAL);

        if ($desc !== null) $this->summary['desc']  = $desc->getValue();
        if ($date !== null) $this->summary['date']  = date('Y-m-d', $date->getValue());

        return (object)$this->summary;
    }
}
