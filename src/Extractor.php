<?php

namespace Mitseo\Scraper;

class Extractor
{

    public function count(string $str)
    {
        return count($this->extractAll($str));
    }

}