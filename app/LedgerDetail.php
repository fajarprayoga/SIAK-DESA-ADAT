<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LedgerDetail extends Model
{
    protected $table='ledger_details';
    protected $fillable = [
        'date',
        'ledger_id',
        'account_id',
        'types',
        'amount',
        'description'
    ];

    public function account()
    {
        return $this->belongsTo('App\Account',  'account_id');
    }
}
