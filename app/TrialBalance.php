<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrialBalance extends Model
{
    protected $table = 'trial_balance';
    protected $fillable = [
        'register',
        'title',
        'description',
        'status',
        'note'
    ];

    public function trial_balance_detail()
    {
        return $this->hasMany('App\TrialBalanceDetail',  'trial_balance_id', 'id');
    }
}
