<?php

namespace App\Http\Livewire\Transaction;

use App\Material;
use Livewire\Component;

class TransactionForm extends Component
{
    public $materials;
    public array $price = [];
    public array $material_id = [];
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

    public function updatedMaterialId($value, $key)
    {
        $material = $this->materials->where("id", $value)->first();
        $this->price[$key] = $material->price;

        $this->dispatchBrowserEvent('applySelect2', [
            "index" => $key
        ]);
    }

    public function addTransactions()
    {
        $lastIndex = count($this->forms) - 1;

        $this->dispatchBrowserEvent('applySelect2', [
            "index" => $lastIndex
        ]);

        array_push($this->forms, [
            "material_id" => null,
            "price_material" => 0,
            "quantity" => 0,
            "discount" => 0
        ]);
    }


}
