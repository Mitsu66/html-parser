<?php

namespace Mitseo\Scraper;

use Atrox\Matcher;
use PHPUnit\Framework\Constraint\Exception;


class XpathExtractor extends Extractor
{
    private $rule;
    private $tree;
    
    public function __construct(string $rule, array $tree = [])
    {
        $this->rule = $rule;
        $this->tree = $tree;
    }

    public function match(string $str)
    {
        $m=Matcher::multi($this->rule)->fromHtml();
        $result = $m($str);
        return (count($result)===0)?false:true;

    }

    public function extractFirst(string $str)
    {
        $m=Matcher::multi($this->rule)->fromHtml();
        $match = $m($str);
        return (isset($match[0]))?$match[0]:null;
    }

    public function extractAll(string $str)
    {
        $m=Matcher::multi($this->rule)->fromHtml();
        $match = $m($str);
        return $match;
    }

    public function extractTree(string $str)
    {   
        $m=Matcher::multi($this->rule,$this->tree)->fromHtml();
        $match = $m($str);
        return $match;
    }

}