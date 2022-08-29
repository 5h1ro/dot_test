<?php

namespace App\Http\Livewire;

use App\Models\Item as ModelsItem;
use App\Models\ItemType;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Livewire\Component;

class Item extends Component
{
    public $items, $name, $description, $quantity, $fk_type, $types, $item_id;

    public $isStore = 0;

    public $isModalOpen = 0;

    public function render()
    {
        $this->items = ModelsItem::orderBy('id', 'ASC')->get();
        $this->types = ItemType::all();
        return view('livewire.item');
    }

    public function create()
    {
        $this->isStore = true;
        $this->fk_type = ItemType::first()->id;
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetForm()
    {
        $this->item_id = '';
        $this->name = '';
        $this->description = '';
        $this->quantity = '';
        $this->fk_type = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'fk_type' => 'required',
        ]);

        if ($this->quantity < 0) {
            $this->quantity = 0;
        }

        $type = ItemType::find($this->fk_type);

        $item = new ModelsItem;
        $item->id = IdGenerator::generate(['table' => 'items', 'length' => 5, 'prefix' => $type->code, 'reset_on_prefix_change' => true]);
        $item->name = $this->name;
        $item->description = $this->description;
        $item->quantity = $this->quantity;
        $item->fk_type = $this->fk_type;
        $item->save();

        session()->flash('message', 'Barang berhasil ditambahkan');

        $this->closeModal();
        $this->resetForm();
    }

    public function edit(ModelsItem $item)
    {
        $this->item_id = $item->id;
        $this->name = $item->name;
        $this->fk_type = $item->fk_type;
        $this->description = $item->description;
        $this->quantity = $item->quantity;
        $this->isStore = false;
        $this->openModal();
    }

    public function update(ModelsItem $item)
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'fk_type' => 'required',
        ]);
        if ($this->quantity < 0) {
            $this->quantity = 0;
        }
        $item->name = $this->name;
        $item->description = $this->description;
        $item->quantity = $this->quantity;
        $item->fk_type = $this->fk_type;
        $item->save();

        session()->flash('message', 'Barang berhasil diubah');

        $this->closeModal();
        $this->resetForm();
    }

    public function delete(ModelsItem $item)
    {
        $item->delete();
    }
}
