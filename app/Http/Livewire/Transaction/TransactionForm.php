<?php

namespace App\Http\Livewire\Transaction;

use App\Material;
use Livewire\Component;

class TransactionForm extends Component
{
    public $materials;
    public $price = 0;
    public $material_id;
    public $cogs = 0;
    public $transaction;
    public bool $update = false;
    public array $forms = [
        []
    ];


    public function render()
    {


        return view('livewire.transaction.transaction-form');
    }

    public function addTransactions()
    {
        $this->forms[count($this->forms)] = [];
    }

    // public function mount($transaction = null)
    // {
    //     $this->price = $transaction?->price_material;
    //     $this->cogs = $transaction?->cost_of_goods;
    // }

    // public function updatedMaterialId($value)
    // {
    //     $material = $this->materials->where("id", $value)->first();

    //     if (!$material) {
    //         return $this->reset("price", "cogs");
    //     }
    //     // dd($material);
    //     $this->price = number_format($material->price, 0, ',', '.') ?? 0;
    //     $this->cogs = number_format($material->cogs, 0, ',', '.') ?? 0;
    // }
}
