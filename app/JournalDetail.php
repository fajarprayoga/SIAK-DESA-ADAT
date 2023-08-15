<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalDetail extends Model
{
    protected $table = 'journal_details';
    protected $fillable = [
        'account_id',
        'journal_id',
        'types',
        'amount',
        'description'
    ];

    public function account()
    {
        return $this->belongsTo('App\Account',  'account_id');
    }
}
