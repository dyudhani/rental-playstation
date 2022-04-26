<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Livewire\Component;

class TypeController extends Component
{
    public $idu;
    public $name;

    public function resetInputFields()
    {
        $this->name = "";
    }

    public function store()
    {
        $validateData = $this->validate([
            'name' => 'required'
        ]);
        Type::create($validateData);
        session()->flash('message','User Berhasil Ditambahkan');
        $this->resetInputFields();
        $this->emit('modalClose');
    }

    public function edit($id)
    {
        $type = Type::where('id',$id)->first();
        $this->idu = $type->id; 
        $this->name = $type->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required'
        ]);
        if($this->idu)
        {
            $type = Type::find($this->idu);
            $type->update([
                'name' => $this->name,
            ]);
            session()->flash('message','User Berhasil di Update');
            $this->resetInputFields();
            $this->emit('modalClose');
        }
    }

    public function delete($id)
    {
        if ($id){
            Type::where('id',$id)->delete();
            session()->flash('message', 'User berhasil di Hapus');
        }
    }

    public function render()
    {
        $types = Type::orderBy('id','desc')->get();
        return view('livewire.playstation.type.show', ['types' => $types]); 
    }
}
