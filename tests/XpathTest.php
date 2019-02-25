<?php

namespace Tests;

require(dirname(__DIR__,1).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

use Mitseo\Scraper\Scraper;
use PHPUnit\Framework\TestCase;

class XpathTest extends TestCase
{

    private $str = "<html><body><h2>Titre1</h2><h2 class=\"test\">Titre2</h2><h2>Titre3</h2></body></html>";

    public function testXpathCount()
    {
        $this->assertSame(3,Scraper::xpath("//h2")->count($this->str));
        $this->assertSame(1,Scraper::xpath("//h2/@class")->count($this->str));
    }

    public function testXpathFirst()
    {
        $this->assertSame("Titre1",Scraper::xpath("//h2")->extractFirst($this->str));
    }
    public function testXpathAll()
    {
        $this->assertSame(["Titre1","Titre2","Titre3"],Scraper::xpath("//h2")->extractAll($this->str));
        $this->assertSame(["test"],Scraper::xpath("//h2/@class")->extractAll($this->str));
    }

    public function testXpathTree()
    {
        $this->assertSame([
                        ["val"=>'Titre1'],
                        ["val"=>'Titre2'],
                        ["val"=>'Titre3']
                    ],
                Scraper::xpath("//h2",
                    ['val'=>'.']
            )->extractTree($this->str));
    }


}