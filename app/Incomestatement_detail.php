<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incomestatement_detail extends Model
{
    protected $table = 'incomestatement_detail';
    protected $fillable = [
        'incomestatement_id',
        'name',
        'amount',
        'account_id',
        'expense',
        'type'
    ];
}
