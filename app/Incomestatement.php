<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeStatement extends Model
{
    protected $table = 'incomestatement'; // Menggunakan huruf kecil dan garis bawah alih-alih camel case
    protected $fillable = [
        'register',
        'title',
        'status',
        'note'
    ];

    public function incomestatement_detail() // Menggunakan gaya camel case untuk nama metode
    {
        return $this->hasMany('App\Incomestatement_detail',  'incomestatement_id', 'id');
    }
}
