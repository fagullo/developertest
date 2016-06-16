<?php

return [
    'base-url' => 'https://www.appliancesdelivered.ie/',
    'cheap-products-url' => 'search',
    'expensive-products-url' => 'search?sort=price_desc',
    'product-xpath' => '//div[@class=\'search-results-product row\']',
    'product-img-xpath' => '//div[@class=\'product-image col-xs-4 col-sm-4\']/a/img/@src',
    'product-name-xpath' => '//div/div/div/h4/a',
    'product-price-xpath' => '//div/div/div/div/h3',
    'product-properties-xpath' => '//div/div/div/ul'
];