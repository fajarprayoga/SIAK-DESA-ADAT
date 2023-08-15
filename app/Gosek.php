<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gosek extends Model
{
    protected $table = 'gosek';
    protected $fillable = [
        'transaction_id',
        'expense',
        'created_at'
    ];

}
