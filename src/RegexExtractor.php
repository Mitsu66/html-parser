<?php

namespace Mitseo\Scraper;

class RegexExtractor extends Extractor
{
    private $rule;
    
    public function __construct(string $rule)
    {
        $this->rule = $rule;
    }

    public function match(string $str)
    {
        return (preg_match($this->rule,$str)===0)?false:true;
    }

    public function extractFirst(string $str)
    {
        preg_match($this->rule,$str,$match);
        return (isset($match[1]))?$match[1]:null;
    }

    public function extractAll(string $str)
    {
        preg_match_all($this->rule,$str,$match);
        return $match[1];
    }

    public function count(string $str)
    {
        preg_match_all($this->rule,$str,$match);
        return count($match[0]);
    }

}