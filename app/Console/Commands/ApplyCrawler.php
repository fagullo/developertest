<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ApplyCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apply-crawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the crawler against a website';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $baseUrl = config('crawler.base-url');
        $cheapProductsUrl = config('crawler.cheap-products-url');
        $expensiveProductsUrl = config('crawler.expensive-products-url');
        $crawlerService = new \App\Services\CrawlerService($baseUrl);
        $this->info('Scraping data from '.$baseUrl.$cheapProductsUrl);
        $crawlerService->saveProducts($cheapProductsUrl);
        $this->info('Scraping data from '.$baseUrl.$expensiveProductsUrl);
        $crawlerService->saveProducts($expensiveProductsUrl);
    }
}
