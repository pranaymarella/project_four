<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CryptoTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(ArticleTypeTableSeeder::class);
    }
}
