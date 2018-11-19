<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TeamPackage extends Pivot
{
    public $table = 'team_packages';
    public $primaryKey = 'team_package_id';
    public $timestamps = false;
    public $dateFormat = 'Y-m-d';
    public $dates = ['start_date','end_date'];
    protected $fillable = [
        'package_id',
        'team_id',
        'start_date',
        'end_date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package() {
        return $this->belongsTo(Package::class, 'package_id', 'package_id');
    }

    /**
     * Checks weather a teams package end_date has expired
     *
     * @param $date
     * @return bool
     */
    public function hasExpired() {
        if (is_null($this->end_date)) {
            return true;
        }

        return ($this->end_date->isFuture()) ? true : false;
    }

    /**
     * Checks weather a team can cancel their package
     *
     * @return bool
     */
    public function canCancel() {
        $today = Carbon::parse();
        $canCancelFrom = $this->start_date->addMonthsNoOverflow($this->package->commitment_period)->firstOfMonth();

        if($canCancelFrom->greaterThan($today) || !$this->hasExpired()) {
            return false;
        }

        return true;
    }

    public function terminate() {
        $endDate = (is_null($this->end_date)) ? Carbon::now() : $this->end_date;

        //  Required due to Carbon issue with Month overflow
        $cancellationPeriodInMonths = $this->package->cancellation_period - 1;

        $newEndDate = $endDate->addMonths($cancellationPeriodInMonths)->endOfMonth();

        $this->end_date = $newEndDate->format('Y-m-d');

        return $this->save();
    }

    /**
     * Checks to see if a package has expired
     *
     * @return bool
     */
    public function getExpiredAttribute()
    {
        return $this->hasExpired();
    }

    public function getCanCancelPackageAttribute()
    {
        return $this->canCancel();
    }

    public function getCancellationDate() {

    }

}
