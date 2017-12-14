<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Types;

class ArticleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
            'Back To Normal' => ['Ethereum', 'Bitcoin', 'Litecoin'],
            'Bitcoin Technical Analysis' => ['Bitcoin', 'Ethereum', 'Litecoin'],
            'Litecoin Price Analysis - Retest of all time highs on the horizon' => ['Litecoin', 'Bitcoin', 'Ethereum'],
        ];

        $count = count($news);

        foreach ($news as $title => $currencies) {
            $article = Article::where('title', 'like', $title)->first();

            foreach ($currencies as $currency) {
                $name = Types::where('currency_name', 'LIKE', $currency)->first();
                $article->types()->save($name);
            }
        }
    }
}
