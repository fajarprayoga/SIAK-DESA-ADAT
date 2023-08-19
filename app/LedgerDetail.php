<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeStatement extends Model
{
    protected $table = 'income_statement'; // Menggunakan huruf kecil dan garis bawah alih-alih camel case
    protected $fillable = [
        'register',
        'title',
        'status',
        'note'
    ];

    public function incomeStatementDetail() // Menggunakan gaya camel case untuk nama metode
    {
        return $this->hasMany(Incomestatement_detail::class, 'income_statement_id', 'id'); // Gunakan ::class untuk namespace
    }
}
