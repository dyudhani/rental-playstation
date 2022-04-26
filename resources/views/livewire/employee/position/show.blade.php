<div>
    @include('livewire.employee.position.create')
    @include('livewire.employee.position.update')
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
                                All Position
                            </h3>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPositionModal">
                            Add New Position
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Nama Jabatan</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($positions as $position)
                                        <tr>
                                            <td>{{$position->name}}</td>
                                            <td>
                                                <div class="col-lg-3">
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updatePositionModal" wire:click.prevent="edit({{ $position->id }})">Edit</button>
                                                    <button type="button" class="btn btn-danger" wire:click.prevent="delete({{ $position->id }})">Delete</button>
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
