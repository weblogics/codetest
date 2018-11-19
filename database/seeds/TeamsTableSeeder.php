<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->delete();

        $teams = [
            ['team_id' => 1, 'team_name' => 'Huckletree'],
            ['team_id' => 2, 'team_name' => 'John\'s Freelance Team'],
            ['team_id' => 3, 'team_name' => 'Jayne\'s Freelance Team'],
            ['team_id' => 4, 'team_name' => 'Steve\'s Cheesecake Factory'],
            ['team_id' => 5, 'team_name' => 'Emily on Marketing'],
            ['team_id' => 6, 'team_name' => 'Martina\'s cat sanctury']
        ];

        foreach($teams as $team)
            Team::create($team);
    }
}
