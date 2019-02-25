<?php

namespace Tests;

require(dirname(__DIR__,1).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

use Mitseo\Scraper\Scraper;
use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{

    private $str = "<html><body><h2>Titre1</h2><h2 class=\"test\">Titre2</h2><h2>Titre3</h2></body></html>";

    public function testRegexCount()
    {
        $this->assertSame(10,Scraper::regex("/<[^>]+>/")->count($this->str));
        $this->assertSame(2,Scraper::regex("/<h2>/")->count($this->str));
    }
    
    public function testRegexFirst()
    {
        $this->assertSame("Titre1",Scraper::regex("/<h2>([^<]+)<\/h2>/")->extractFirst($this->str));
    }
    
    public function testRegexAll()
    {
        $this->assertSame(["Titre1","Titre3"],Scraper::regex("/<h2>([^<]+)<\/h2>/")->extractAll($this->str));
    }

}