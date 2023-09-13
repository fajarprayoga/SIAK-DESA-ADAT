<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfitSharing extends Model
{
    protected $table = "profit_sharing";

    protected $fillable = [
        "incomestatement_id",
        "details",
        "title",
        "descriptions"
    ];

    protected $casts = [
        "details" => "array"
    ];

    public function incomestatement()
    {
        return $this->belongsTo(Incomestatement::class);
    }
}