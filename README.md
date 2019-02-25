[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

# Scraper

This library helps you to parse data with different resources :

- Regex
- Xpath
- CSS Selector

**Author :** [Mitsu](https://twitter.com/Mitsufr)

## Install with composer : 

```
composer require mitseo/scraper
```

## Parse with Regex

```php
use Mitseo\Scraper\Scraper;

$string = "11111 222 33333 44444";

$regex1 = Scraper::regex("/[0-9]{5}/")->match($string);
$regex2 = Scraper::regex("/([0-9]{5})/")->extractFirst($string);
$regex3 = Scraper::regex("/([0-9]{5})/")->extractAll($string);
$regex3 = Scraper::regex("/[0-9]{5}/")->count($string);

```

## Parse with Xpath

```php
use Mitseo\Scraper\Scraper;

$dom = file_get_contents('https://en.wikipedia.com/');

$xpath1 = Scraper::xpath("//a")->match($dom);
$xpath2 = Scraper::xpath("//a")->extractFirst($dom);
$xpath3 = Scraper::xpath("//a")->extractAll($dom);
$xpath3 = Scraper::xpath("//a")->count($dom);
$xpath4 = Scraper::xpath("//a",["anchor"=>".","href"=>"@href"])->extractTree($dom);
```

## Parse with CSS Selector

```php
use Mitseo\Scraper\Scraper;

$dom = file_get_contents('https://en.wikipedia.com/');

$css1 = Scraper::css("h1#truc")->match($dom);
$css2 = Scraper::css("h1")->extractFirst($dom);
$css3 = Scraper::css("a")->extractAll($dom);
$xpath3 = Scraper::css("a")->count($dom);

```

