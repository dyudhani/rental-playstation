<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Position;

class EmployeeController extends Component
{
    public $idu;
    public $position_id;
    public $username;
    public $name;
    public $password;
    public $phone;
    public $gender;

    public function resetInputFields()
    {
        $this->position_id = "";
        $this->username = "";
        $this->name = "";
        $this->password = "";
        $this->phone = "";
        $this->gender = "";

    }

    public function store()
    {
        $validateData = $this->validate([
            'position_id' => 'required',
            'username' => 'required',
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'gender' => 'required'
        ]);
        Employee::create($validateData);
        session()->flash('message','Karyawan Berhasil Ditambahkan');
        $this->resetInputFields();
        $this->emit('modalClose');
    }

    public function edit($id)
    {
        $employee = Employee::where('id',$id)->first();
        $this->idu = $employee->id; 
        $this->position_id = $employee->position_id;
        $this->username = $employee->username;
        $this->name = $employee->name;
        $this->password = $employee->password;
        $this->phone = $employee->phone;
        $this->gender = $employee->gender;
    
    }

    public function update()
    {
        $this->validate([
            'position_id' => 'required',
            'username' => 'required',
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'gender' => 'required'
        ]);
        if($this->idu)
        {
            $employee = Employee::find($this->idu);
            $employee->update([
                'position_id' => $this->position_id ,
                'username' => $this->username,
                'name' => $this->name,
                'password' => $this->password,
                'phone' => $this->phone,
                'gender' => $this->gender
            ]);
            session()->flash('message','Karyawan Berhasil di Update');
            $this->resetInputFields();
            $this->emit('modalClose');
        }
    }

    public function delete($id)
    {
        if ($id){
            Employee::where('id',$id)->delete();
            session()->flash('message', 'Karyawan berhasil  di Hapus');
        }
    }

    public function render()
    {
        $employees = Employee::orderBy('id','desc')->get();
        $positions = Position::all();
        return view('livewire.employee.show', ['positions' => $positions], ['employees' => $employees])
            ->layout('layouts.app'); 
    }
}
