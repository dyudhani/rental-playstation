{{-- <div>
    @include('livewire.employee.create')
    @include('livewire.employee.update')
    <section> --}}
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <!-- Header -->
                <div class="header bg-primary pb-6">
                    <div class="container-fluid">
                        <div class="header-body">
                            <div class="row align-items-center py-4">
                            <div class="col-lg-6 col-7">
                                <h6 class="h2 text-white d-inline-block mb-0"></h6>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page content -->
                <div class="container-fluid mt--5">
                    <div class="row">
                        <div class="col">
                            <div class="card  bg-default shadow">
                                <!-- Card header -->
                                <div class="card-header mb-0 bg-transparent border-0">
                                    <h3 class="text-white mb-4">Seluruh Karyawan</h3>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                                        Tambah Karyawan
                                    </button>
                                    @if(session()->has('message'))
                                        <div class='alert alert-success mt-3'>{{session('message')}}</div>
                                    @endif
                                </div>
                                <!-- Dark table -->
                                <div class="table-responsive">
                                    <table class="table align-items-center table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jabatan</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Telephone</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="name mb-0 text-sm">{{$loop->iteration }}</td>
                                        <td class="name mb-0 text-sm">{{$employee->position->name}}</td>
                                        <td class="name mb-0 text-sm">{{$employee->username}}</td>
                                        <td class="name mb-0 text-sm">{{$employee->name}}</td>
                                        <td class="name mb-0 text-sm">{{$employee->phone}}</td>
                                        <td class="name mb-0 text-sm">{{$employee->gender}}</td>
                                        <td class="name mb-0 text-sm">
                                            <div class="col-lg-3">
                                                <button type="button" class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#updateEmployeeModal" wire:click.prevent="edit({{ $employee->id }})"><i class="ni ni-ruler-pencil text-light"></i></button>
                                                <button type="button" class="btn bg-danger" wire:click.prevent="delete({{ $employee->id }})"><i class="ni ni-fat-remove text-white"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal Create -->
<div wire:ignore.self class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addPositionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPositionModal">Tambah Karyawan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="position_id">Pilih Jabatan</label>
                    <select name="position_id" id="" class="form-control" wire:model="position_id">
                        <option value="">Select a Position</option>
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                    </select>
                    {{-- {{ $position_id }} --}}
                    @error('position_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" wire:model="username">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" wire:model="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" wire:model="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">No Telephone</label>
                    <input type="number" name="phone" class="form-control" wire:model="phone">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="" id="" class="form-control" wire:model="gender">
                        <option value="">Select a Gender</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" wire:click.prevent="store()">Tambah Karyawan</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Update -->
<div wire:ignore.self class="modal fade" id="updateEmployeeModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserModalLabel">Update Position</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" wire:model="idu">
                    <div class="form-group">
                        <label for="position_id">Pilih Jabatan</label>
                        <select name="position_id" id="" class="form-control" wire:model="position_id">
                            <option value="">Select a Position</option>
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                        @error('position_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" wire:model="username">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" wire:model="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" wire:model="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">No Telephone</label>
                        <input type="number" name="phone" class="form-control" wire:model="phone">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select name="" id="" class="form-control" wire:model="gender">
                            <option value="">Select a Gender</option>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="update()">Update Employee</button>
            </div>
        </div>
    </div>
</div>
    {{-- </section>
</div> --}}
