<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\DomCrawler\Crawler;

class MainController extends Controller
{
  public function index() {
    $cheapProducts = $this->getProducts("search");
    $expensiveProducts = $this->getProducts("search?sort=price_desc");
    return view('welcome', compact(['cheapProducts', 'expensiveProducts']));
  }

  private function getProducts($url) {
    $client = new \Guzzle\Service\Client('https://www.appliancesdelivered.ie/');
    $response = $client->get($url)->send();
    $crawler = new Crawler($response->getBody(true));
    $crawlerProducts = $crawler->filterXPath("//div[@class='search-results-product row']")->reduce(function ( Crawler $node, $i) {
      return $i < 10;
    });
    $images = $this->getByXPath($crawlerProducts, "//div[@class='product-image col-xs-4 col-sm-4']/a/img/@src");
    $names = $this->getByXPath($crawlerProducts, "//div/div/div/h4/a");
    $prices = $this->getByXPath($crawlerProducts, "//div/div/div/div/h3");
    $properties = $this->getByXPath($crawlerProducts, "//div/div/div/ul");

    $products = array();
    for ($i = 0; $i < count($crawlerProducts); $i++) {
      $product = new \App\Product();
      $product->image = $images[$i];
      $product->name = $names[$i];
      $product->price = $prices[$i];
      $product->properties = $properties[$i];
      array_push($products, $product);
    }

    return $products;
  }

  private function getByXPath(Crawler $crawler, $xpath) {
    return $crawler->filterXPath($xpath)->each(function ( Crawler $node, $i) {
      return $node->text();
    });
  }
}
