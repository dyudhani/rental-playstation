<div>
    @include('livewire.user.create')
    @include('livewire.user.update')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message')}}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                All User
                            </h3>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            Add New User
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Nama</td>
                                        <td>Email</td>
                                        <td>Alamat</td>
                                        <td>Nomor Telepon</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                <div class="col-lg-3">
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateUserModal" wire:click.prevent="edit({{ $user->id }})">Edit</button>
                                                    <button type="button" class="btn btn-danger" wire:click.prevent="delete({{ $user->id }})">Delete</button>
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
    </section>
</div>
