<?php

namespace Tests;

require(dirname(__DIR__,1).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

use Mitseo\Scraper\Scraper;
use PHPUnit\Framework\TestCase;

class CssTest extends TestCase
{

    private $str = "<html><body><h2>Titre1</h2><h2 class=\"test\">Titre2</h2><h2>Titre3</h2></body></html>";

    public function testCssCount()
    {
        $this->assertSame(3,Scraper::css("h2")->count($this->str));
        $this->assertSame(1,Scraper::css("h2.test")->count($this->str));
    }

    public function testCssFirst()
    {
        $this->assertSame("Titre1",Scraper::css("h2")->extractFirst($this->str));
    }
    public function testCssAll()
    {
        $this->assertSame(["Titre1","Titre2","Titre3"],Scraper::css("h2")->extractAll($this->str));
    }

}