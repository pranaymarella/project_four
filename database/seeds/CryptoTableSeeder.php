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
            ['Ethereum', 3, 278.93],
            ['Bitcoin', 0.56, 6713.26],
            ['Litecoin', 2.34, 54.25]
        ];

        $count = count($cryptosss);

        foreach ($cryptosss as $key => $crypto) {
            Crypto::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'currency_name' => $crypto[0],
                'currency_amount' => $crypto[1],
                'currency_price' => $crypto[2]
            ]);
            $count--;
        }
    }
}
