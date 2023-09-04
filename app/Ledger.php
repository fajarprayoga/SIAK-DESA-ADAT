<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $table='ledgers';
    protected $fillable = [
        'title',
        'register',
        'description',
        'status',
        'start_date',
        'end_date',
        'note'
    ];

    public function ledger_detail()
    {
        return $this->hasMany('App\LedgerDetail',  'ledger_id', 'id');
    }
}
