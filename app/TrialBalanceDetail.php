<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrialBalanceDetail extends Model
{
    protected $table = 'trial_balance_detail';
    protected $fillable = [
        'date',
        'trial_balance',
        'account_id',
        'amount'
    ];

    public function account()
    {
        return $this->belongsTo('App\Account',  'account_id');
    }
}
