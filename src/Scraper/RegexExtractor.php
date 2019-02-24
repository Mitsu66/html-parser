<?php

namespace Mitseo\Scraper;

class RegexExtractor
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
        return (isset($match[0]))?$match[0]:null;
    }

    public function extractAll(string $str)
    {
        preg_match_all($this->rule,$str,$match);
        return $match[1];
    }

}