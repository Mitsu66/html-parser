<?php
namespace Mitseo\Scraper;

require('regexExtractor.php');


class Scraper{

    public static function regex(string $rule)
    {
        $regex = new RegexExtractor($rule);
        return $regex;
    }

    public static function xpath(string $rule, array $tree = [])
    {
        $xpath = new XpathExtractor($rule,$tree);
        return $xpath;
    }

    public static function css(string $rule)
    {
        $css = new CssExtractor($rule);
        return $css;
    }

}