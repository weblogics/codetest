<?php

use Illuminate\Database\Seeder;
use App\TeamPackage;

class TeamPackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_packages')->delete();

        $teamPackages = [
            ['team_package_id' => 1, 'package_id' => 1, 'team_id' => 1, 'start_date' => '2018-01-05', 'end_date' => '2018-05-31'],
            ['team_package_id' => 2, 'package_id' => 2, 'team_id' => 2, 'start_date' => '2018-05-21', 'end_date' => null],
            ['team_package_id' => 3, 'package_id' => 3, 'team_id' => 3, 'start_date' => '2017-05-06', 'end_date' => '2018-06-30'],
            ['team_package_id' => 4, 'package_id' => 3, 'team_id' => 2, 'start_date' => '2018-01-05', 'end_date' => null],
            ['team_package_id' => 6, 'package_id' => 4, 'team_id' => 1, 'start_date' => '2018-07-07', 'end_date' => null],
            ['team_package_id' => 7, 'package_id' => 3, 'team_id' => 5, 'start_date' => '2018-07-03', 'end_date' => null],
        ];

        foreach ($teamPackages as $teamPackage)
            TeamPackage::create($teamPackage);

    }
}
