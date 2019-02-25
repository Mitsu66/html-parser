<?php

namespace Mitseo\Scraper;

use Symfony\Component\CssSelector\CssSelectorConverter;
use Mitseo\Scraper\XpathExtractor;



class CssExtractor extends Extractor
{
    private $rule;
    private $converter;
    private $xpath;
    
    public function __construct(string $rule)
    {
        $this->rule = $rule;
        $this->converter = new CssSelectorConverter();
        $this->xpath = new XpathExtractor(
            $this->converter->toXPath($this->rule)
        );
    }

    public function match(string $str)
    {
        return $this->xpath->match($str);
    }

    public function extractFirst(string $str)
    {
        return $this->xpath->extractFirst($str);
    }

    public function extractAll(string $str)
    {
        return $this->xpath->extractAll($str);
    }

}