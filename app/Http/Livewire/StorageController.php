<?php

namespace App\Http\Livewire;

use App\Models\Storage;
use Livewire\Component;

class StorageController extends Component
{
    public $idu;
    public $capacity;

    public function resetInputFields()
    {
        $this->capacity = "";
    }

    public function store()
    {
        $validateData = $this->validate([
            'capacity' => 'required'
        ]);
        Storage::create($validateData);
        session()->flash('message','User Berhasil Ditambahkan');
        $this->resetInputFields();
        $this->emit('modalClose');
    }

    public function edit($id)
    {
        $storage = Storage::where('id',$id)->first();
        $this->idu = $storage->id; 
        $this->capacity = $storage->capacity;
    }

    public function update()
    {
        $this->validate([
            'capacity' => 'required'
        ]);
        if($this->idu)
        {
            $storage = Storage::find($this->idu);
            $storage->update([
                'capacity' => $this->capacity,
            ]);
            session()->flash('message','User Berhasil di Update');
            $this->resetInputFields();
            $this->emit('modalClose');
        }
    }

    public function delete($id)
    {
        if ($id){
            Storage::where('id',$id)->delete();
            session()->flash('message', 'User berhasil di Hapus');
        }
    }

    public function render()
    {
        $storages = Storage::orderBy('id','desc')->get();
        return view('livewire.playstation.storage.show', ['storages' => $storages]); 
    }
}
