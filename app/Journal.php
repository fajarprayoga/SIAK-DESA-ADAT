<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = 'journals';
    protected $fillable = [
        'register',
        'title',
        'description',
        'status',
        'note'
    ];

    public function journal_detail()
    {
        return $this->hasMany('App\JournalDetail',  'journal_id', 'id');
    }
}
