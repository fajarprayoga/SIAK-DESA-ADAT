<?php

namespace App\Http\Livewire\Transaction;

use App\Material;
use Livewire\Component;

class TransactionForm extends Component
{
    public $materials;
    public $price;
    public $material_id;
    public $cogs;
    public $transaction;
    public bool $update = false;

    public function render()
    {
        
        return view('livewire.transaction.transaction-form');
    }

    public function mount($transaction = null)
    {
        $this->price = $transaction?->price_material;
        $this->cogs = $transaction?->cost_of_goods;
    }

    public function updatedMaterialId($value)
    {
        $material = $this->materials->where("id", $value)->first();
      
        $this->price = number_format ($material->price,0,',','.') ?? 0;
        $this->cogs = number_format($material->cogs,0,',','.') ?? 0;
    }
}
