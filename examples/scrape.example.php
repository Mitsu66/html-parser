<?php
require(dirname(__DIR__,1).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

use Mitseo\Scraper\Scraper;

$dom = file_get_contents("https://en.wikipedia.org");

$xpathFirst = Scraper::xpath("//h2")->count($dom);
$xpathCount = Scraper::xpath("//h2")->count($dom);
$xpathCount = Scraper::xpath("//h2")->count($dom);
$xpathCount = Scraper::xpath("//h2")->count($dom);

$regexCount = Scraper::regex("/<h2.*>.*<\/h2>/")->count($dom);

$cssCount = Scraper::css("h2")->count($dom);


$str = "<html><body><h2>Titre1</h2><h2>Titre2</h2><h2>Titre3</h2></body></html>";


var_dump($xpathCount);