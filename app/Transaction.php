<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'created_at',
        'vehicle_number',
        'vehicle',
        'material_id',
        'price_material',
        'nomor',
        'status',
        'is_delete'
    ];

    public function material()
    {
        return $this->belongsTo('App\Material',  'material_id');
    }

    public function gosek()
    {
        // return $this->belongsTo('App\Gosek',  'id');
        return $this->hasOne(Gosek::class);
    }
}
