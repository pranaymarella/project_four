<?php

use Illuminate\Database\Seeder;
use App\Types;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['Ethereum', 'ETH'],
            ['Bitcoin', 'BTC'],
            ['Litecoin', 'LTC'],
            ['IOTA', 'IOTA'],
            ['Ripple', 'XRP'],
            ['Cardano', 'ADA'],
        ];

        $count = count($types);

        foreach ($types as $type => $crypto) {
            Types::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'currency_name' => $crypto[0],
            ]);
            $count--;
        }
    }
}
