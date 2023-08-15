<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
    protected $fillable = [
        'code',
        'name',
        'is_delete',
        'normal_balance'
    ];
}
