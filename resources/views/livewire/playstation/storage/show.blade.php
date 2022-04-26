<div>
    @include('livewire.playstation.storage.create')
    @include('livewire.playstation.storage.update')
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
                                All Storage
                            </h3>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStorageModal">
                            Add New Storage
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Capacity</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($storages as $storage)
                                        <tr>
                                            <td>{{$storage->capacity}} Gb</td>
                                            <td>
                                                <div class="col-lg-3">
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateTypeModal" wire:click.prevent="edit({{ $storage->id }})">Edit</button>
                                                    <button type="button" class="btn btn-danger" wire:click.prevent="delete({{ $storage->id }})">Delete</button>
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
