<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function list() {
        $teams = Team::all()->sortBy('team_name');
        return view('teams.list', compact('teams'));
    }

    public function show(Team $team) {
        $currentPackages = $team->packages()->expired(false)->get();
        $expiredPackages = $team->packages()->expired()->get();

        return view('teams.show', compact('team', 'currentPackages', 'expiredPackages'));
    }

    public function test(Team $team) {
        return $team->packages()->expired(false)->get();
    }
}
