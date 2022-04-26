<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserController extends Component
{
    public $idu;
    public $name;
    public $email;
    public $password;
    public $alamat;
    public $no_hp;

    public function resetInputFields()
    {
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->alamat = "";
        $this->no_hp = "";

    }

    public function store()
    {
        $validateData = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);
        User::create($validateData);
        session()->flash('message','User Berhasil Ditambahkan');
        $this->resetInputFields();
        $this->emit('modalClose');
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        $this->idu = $user->id; 
        $this->name = $user->name; 
        $this->email = $user->email;
        $this->password = $user->password;
        $this->alamat = $user->alamat;
        $this->no_hp = $user->no_hp;
    
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);
        if($this->ids)
        {
            $user = User::find($this->ids);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this-> password,
                'alamat' => $this->alamat,
                'no_hp' => $this->no_hp,
            ]);
            session()->flash('message','User Berhasil di Update');
            $this->resetInputFields();
            $this->emit('modalClose');
        }
    }

    public function delete($id)
    {
        if ($id){
            User::where('id',$id)->delete();
            session()->flash('message', 'User berhasil di Hapus');
        }
    }

    public function render()
    {
        $users = User::orderBy('id','desc')->get();
        return view('livewire.user.show', ['users' => $users]); 
    }
}
