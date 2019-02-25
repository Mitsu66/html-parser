[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

# Scraper

This library helps you to parse data with different resources :

- Regex
- Xpath
- CSS Selector

**Author :** [Mitsu](https://twitter.com/Mitsufr)

## Parse with Regex

```php
use Mitseo\Scraper\Scraper;

$regex1 = Scraper::regex("/[0-9]{5}/")->match($dom);
$regex2 = Scraper::regex("/([0-9]{5})/")->extractFirst($dom);
$regex3 = Scraper::regex("/([0-9]{5})/")->extractAll($dom);
```

## Parse with Xpath

```php
use Mitseo\Scraper\Scraper;

$dom = file_get_contents('https://www.lemonde.fr/');

$xpath1 = Scraper::xpath("//a")->match($dom);
$xpath2 = Scraper::xpath("//a")->extractFirst($dom);
$xpath3 = Scraper::xpath("//a")->extractAll($dom);
$xpath4 = Scraper::xpath("//a",["anchor"=>".","href"=>"@href"])->extractTree($dom);
```

## Parse with CSS Selector

```php
use Mitseo\Scraper\Scraper;

$css1 = Scraper::css("h1#truc")->match($dom);
$css2 = Scraper::css("h1")->extractFirst($dom);
$css3 = Scraper::css("a")->extractAll($dom);
```

