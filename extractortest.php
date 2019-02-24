<?php
require('vendor/autoload.php');

use Mitseo\Scraper\Scraper;

$dom = file_get_contents('https://www.mitseo.me');

/*
*   Scraper with Regex
*/

$regex1 = Scraper::regex("/[0-9]{5}/")->match($dom);
$regex2 = Scraper::regex("/([0-9]{5})/")->extractFirst($dom);
$regex3 = Scraper::regex("/([0-9]{5})/")->extractAll($dom);

/*
*   Scraper with Xpath
*/

$xpath1 = Scraper::xpath("//a")->match($dom);
$xpath2 = Scraper::xpath("//a")->extractFirst($dom);
$xpath3 = Scraper::xpath("//a")->extractAll($dom);
$xpath4 = Scraper::xpath("//a",["anchor"=>".","href"=>"@href"])->extractTree($dom);

/*
*   Scraper with CSS Selector
*/

$css1 = Scraper::css("h1#truc")->match($dom);
$css2 = Scraper::css("h1")->extractFirst($dom);
$css3 = Scraper::css("a")->extractAll($dom);


var_dump($regex2);