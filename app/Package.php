<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $casts = [
        'price' => 'double',
    ];

    public $primaryKey = 'package_id';
    public $timestamps = false;

    /**
     * Defines related package subscriptions by team
     *
     **/
    public function subscription() {
        return $this->belongsToMany(Package::class, 'team_packages', 'package_id', 'package_id')
            ->withPivot(['team_package_id', 'start_date', 'end_date'])
            ->using(TeamPackage::class);
    }

    /**
     * Defines related team packages
     *
     **/
    public function teamPackages() {
        return $this->belongsToMany(Team::class, 'team_packages', 'package_id', 'team_id')
            ->withPivot(['team_package_id', 'start_date', 'end_date'])
            ->using(TeamPackage::class);
    }

    public function getPriceAttribute($value)
    {
        //  TODO: Eloquent seems to want to cast floats / doubles to strings, need to find a fix for this as $casts do not appear to have any affect
        return number_format($value, 2);
    }

    public function scopeExpired($query, bool $expired = true)
    {
        if ($expired) {
            return $query->where('end_date','<', \Carbon\Carbon::now()->toDateString());
        }

        return $query->whereNull('end_date')->orWhere('end_date', '>', \Carbon\Carbon::now()->toDateString());
    }

}
