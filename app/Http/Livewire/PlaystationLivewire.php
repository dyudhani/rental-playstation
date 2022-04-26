<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\Storage;
use Livewire\Component;
use App\Models\Playstation;

class PlaystationLivewire extends Component
{
    public $idu;
    public $name;
    public $type_id;
    public $storage_id;
    public $brand;
    public $color;
    public $stock;
    public $condition;
    public $price_rate;

    public function resetInputFields()
    {
        $this->name = "";
        $this->type_id = "";
        $this->storage_id = "";
        $this->brand = "";
        $this->color = "";
        $this->stock = "";
        $this->condition = "";
        $this->price_rate = "";

    }

    public function store()
    {
        $validateData = $this->validate([
            'name' => 'required',
            'type_id' => 'required',
            'storage_id' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'stock' => 'required',
            'condition' => 'required',
            'price_rate' => 'required'
        ]);
        Playstation::create($validateData);
        session()->flash('message','Playstation Berhasil Ditambahkan');
        $this->resetInputFields();
        $this->emit('modalClose');
    }

    public function edit($id)
    {
        $playstations = Playstation::where('id',$id)->first();
        $this->idu = $playstations->id; 
        $this->name = $playstations->name;
        $this->type_id = $playstations->type_id;
        $this->storage_id = $playstations->storage_id;
        $this->brand = $playstations->brand;
        $this->color = $playstations->color;
        $this->stock = $playstations->stock;
        $this->condition = $playstations->condition;
        $this->price_rate = $playstations->price_rate;
    
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'type_id' => 'required',
            'storage_id' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'stock' => 'required',
            'condition' => 'required',
            'price_rate' => 'required'
        ]);
        if($this->idu)
        {
            $playstations = Playstation::find($this->idu);
            $playstations->update([
                'name' => $this->name ,
                'type_id' => $this->type_id,
                'storage_id' => $this->storage_id,
                'brand' => $this->brand,
                'color' => $this->color,
                'stock' => $this->stock,
                'condition' => $this->condition,
                'price_rate' => $this->price_rate
            ]);
            session()->flash('message','playstations Berhasil di Update');
            $this->resetInputFields();
            $this->emit('modalClose');
        }
    }

    public function delete($id)
    {
        if ($id){
            Playstation::where('id',$id)->delete();
            session()->flash('message', 'playstations berhasil  di Hapus');
        }
    }

    public function render()
    {   
        return view('livewire.playstation.show', [
            'playstations' => Playstation::orderBy('id', 'desc')->get(),
            'types' => Type::all(),
            'storages' => Storage::all()
        ])->layout('layouts.app');   
    }
}
