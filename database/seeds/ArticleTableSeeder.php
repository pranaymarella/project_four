<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
            ['Back To Normal', 'http://ethereumworldnews.com/back-normal-ethereum-stable-investment/', 'Ethereum'],
            ['Bitcoin Technical Analysis', 'http://www.newsbtc.com/2017/11/23/bitcoin-price-technical-analysis-11-23-2017-bearish-divergence-alert/', 'Bitcoin'],
            ['Litecoin Price Analysis - Retest of all time highs on the horizon', 'https://bravenewcoin.com/news/litecoin-price-analysis-retest-of-all-time-highs-on-the-horizon/', 'Litecoin']
        ];

        $count = count($news);

        foreach ($news as $key => $news) {

            Article::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'title' => $news[0],
                'link' => $news[1],
            ]);
            $count--;
        }
    }
}
