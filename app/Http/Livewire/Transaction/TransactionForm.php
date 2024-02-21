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
    public array $forms = [];


    function mount()
    {
        array_push($this->forms, [
            "material_id" => null,
            "price_material" => 0,
            "quantity" => 0,
            "discount" => 0
        ]);
    }

    public function render()
    {


        return view('livewire.transaction.transaction-form');
    }

    public function addTransactions()
    {
        array_push($this->forms, [
            "material_id" => null,
            "price_material" => 0,
            "quantity" => 0,
            "discount" => 0
        ]);
    }
}
