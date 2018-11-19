<?php

use Illuminate\Database\Seeder;
use App\Package;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->delete();

        $packages = [
            ['package_id' => 1, 'name' => 'Hotdesk', 'description' => 'A hotdesk package with 10 days', 'desk_type' => 'flexi', 'cancellation_period' => 1, 'commitment_period' => 1, 'price' => '30.00', 'mr_credits' => 10, 'days' => 10, 'sell_limit' => 5],
            ['package_id' => 2, 'name' => 'Dedicated', 'description' => 'A dedicated package', 'desk_type' => 'dedicated', 'cancellation_period' => 2, 'commitment_period' => 3, 'price' => '150.00', 'mr_credits' => 30, 'days' => 0, 'sell_limit' => null],
            ['package_id' => 3, 'name' => 'Office Desk', 'description' => 'An office desk package', 'desk_type' => 'office', 'cancellation_period' => 3, 'commitment_period' => 3, 'price' => '300.00', 'mr_credits' => 50, 'days' => 0, 'sell_limit' => 10],
            ['package_id' => 4, 'name' => 'Unlimited', 'description' => 'An unlimited package', 'desk_type' => 'unlimited', 'cancellation_period' => 1, 'commitment_period' => 1, 'price' => '60.00', 'mr_credits' => 10, 'days' => 0, 'sell_limit' => null]
        ];

        foreach($packages as $package)
            Package::create($package);
    }
}
