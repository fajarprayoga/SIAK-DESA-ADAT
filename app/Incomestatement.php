<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incomestatement extends Model
{
    protected $table = 'incomestatement';
    protected $fillable = [
        'register',
        'title',
        'status',
        'note'
    ];

    public function incomestatement_detail()
    {
        return $this->hasMany('App\incomestatement_detail',  'incomestatement_id', 'id');
    }
}
