<?php

use Illuminate\Database\Seeder;
use App\Crypto;

class CryptoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cryptosss = [
            ['Ethereum', 278.93],
            ['Bitcoin', 6713.26],
            ['Litecoin', 54.25]
        ];

        $count = count($cryptosss);

        foreach ($cryptosss as $key => $crypto) {
            Crypto::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'currency_name' => $crypto[0],
                'currency_price' => $crypto[1]
            ]);
            $count--;
        }
    }
}
