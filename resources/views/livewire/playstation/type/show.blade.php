<div>
    @include('livewire.playstation.type.create')
    @include('livewire.playstation.type.update')
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
                                All Type
                            </h3>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTypeModal">
                            Add New Type
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Nama Tipe Playstation</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $type)
                                        <tr>
                                            <td>{{$type->name}}</td>
                                            <td>
                                                <div class="col-lg-3">
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateTypeModal" wire:click.prevent="edit({{ $type->id }})">Edit</button>
                                                    <button type="button" class="btn btn-danger" wire:click.prevent="delete({{ $type->id }})">Delete</button>
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
