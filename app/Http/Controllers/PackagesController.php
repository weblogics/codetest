<?php

namespace App\Http\Controllers;

use App\Package;
use App\Team;
use App\TeamPackage;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function list() {

        $packages = Package::withCount(['subscription' => function($query) {
            $query->expired(false);
        }])->get();

        return view('packages.list', compact('packages'));
    }

    public function show($package) {

        $package = Package::with(['teamPackages' => function($query) {
            $query->orderByDesc('start_date', 'end_date');
        }])->findOrFail($package);

        return view('packages.show', compact('package'));
    }

    public function assignment(Team $team = null) {

        $teams = (!$team) ? Team::all() : null;
        $packages = Package::withCount(['subscription' => function($query) {
            $query->expired(false);
        }])->get();

        return view('packages.assignment', compact('team', 'teams', 'packages'));
    }

    public function assign(Request $request) {

        $rules = [
            'team_id' => 'required|integer',
            'package_id' => 'required|integer',
        ];

        $customMessages = [
            'team_id.required' => 'Please select a team',
            'package_id.required' => 'Please select a package',
        ];

        $this->validate($request, $rules, $customMessages);

        $teamPackage = new \App\TeamPackage();
        $teamPackage->team_id = $request->get('team_id');
        $teamPackage->package_id = $request->get('package_id');
        $teamPackage->start_date = \Carbon\Carbon::now()->format('Y-m-d');
        $teamPackage->save();

        return redirect()->route('package.show', ['package' => $request->get('package_id')]);
    }

    public function terminate_check(TeamPackage $teamPackage) {

        $teamPackage->load('package');

        return view('packages.terminate', compact('teamPackage'));
    }

    public function terminate(TeamPackage $teamPackage) {

        $teamPackage->load('package');

        $teamPackage->terminate();

        return redirect()->route('package.show', ['package' => $teamPackage->package->package_id]);
    }
}
