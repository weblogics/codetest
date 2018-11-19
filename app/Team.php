<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $primaryKey = 'team_id';
    public $timestamps = false;

    /**
     * Get associated packages for this team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packages() {
        return $this->belongsToMany(Package::class, 'team_packages', 'package_id', 'package_id')
            ->withPivot(['start_date', 'end_date', 'team_id'])
            ->using(TeamPackage::class);
    }
}
