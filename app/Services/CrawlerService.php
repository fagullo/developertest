<?php

namespace App\Services;

use App\Product;
use Guzzle\Http\Client;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerService
{
    /**
     * Creates a new instance of the crawler.
     */
    public function __construct($baseURL)
    {
        $this->client = new Client($baseURL);
    }

    /**
     * Obtains a list of products from a specified URL.
     * 
     * @param string $url the relative URL of the target page.
     * 
     * @return array a list with the required products.
     */
    public function saveProducts($url)
    {
        $response = $this->client->get($url)->send();
        $crawler = new Crawler($response->getBody(true));
        $crawlerProducts = $crawler->filterXPath(config('crawler.product-xpath'))->reduce(function (Crawler $node, $i) {
            return $i < 10;
        });
        $images = $this->getByXPath($crawlerProducts, config('crawler.product-img-xpath'));
        $names = $this->getByXPath($crawlerProducts, config('crawler.product-name-xpath'));
        $prices = $this->getByXPath($crawlerProducts, config('crawler.product-price-xpath'));
        $properties = $this->getByXPath($crawlerProducts, config('crawler.product-properties-xpath'));

        for ($i = 0; $i < count($crawlerProducts); ++$i) {
            $product = Product::where('name', $names[$i])->first();
            if (is_null($product)) {
                $product = new Product();
            }

            $product->image = $images[$i];
            $product->name = $names[$i];
            $product->price = floatval(substr($prices[$i], 3));
            $product->properties = $properties[$i];
            $product->save();
        }
    }

    /**
     * Obtains the text of a node (identified by a XPATH) in a Crawler.
     *
     * @param Crawler $crawler the current crawler.
     * @param string  $xpath   the xpath of the node where the text is going to be retrieved.
     *
     * @return string the text of the node specified.
     */
    private function getByXPath(Crawler $crawler, $xpath)
    {
        return $crawler->filterXPath($xpath)->each(function (Crawler $node, $i) {
            return $node->text();
        });
    }
}
