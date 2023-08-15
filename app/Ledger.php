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
        'note'
    ];

    public function ledger_detail()
    {
        return $this->hasMany('App\LedgerDetail',  'ledger_id', 'id');
    }
}
