<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Position;

class PositionController extends Component
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
        Position::create($validateData);
        session()->flash('message','Position Berhasil Ditambahkan');
        $this->resetInputFields();
        $this->emit('modalClose');
    }

    public function edit($id)
    {
        $position = Position::where('id',$id)->first();
        $this->idu = $position->id; 
        $this->name = $position->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required'
        ]);
        if($this->idu)
        {
            $position = Position::find($this->idu);
            $position->update([
                'name' => $this->name,
            ]);
            session()->flash('message','Position Berhasil di Update');
            $this->resetInputFields();
            $this->emit('modalClose');
        }
    }

    public function delete($id)
    {
        if ($id){
            position::where('id',$id)->delete();
            session()->flash('message', 'Position berhasil di Hapus');
        }
    }

    public function render()
    {
        $positions = Position::orderBy('id','desc')->get();
        return view('livewire.employee.position.show', ['positions' => $positions]); 
    }
}
