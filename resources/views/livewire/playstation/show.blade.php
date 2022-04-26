{{-- <div>
    @include('livewire.playstation.create')
    @include('livewire.playstation.update')
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
                                All Playstation
                            </h3>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlaystationModal">
                            Add New Playstation
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Playstation</td>
                                        <td>Type</td>
                                        <td>Kapasitas</td>
                                        <td>Brand</td>
                                        <td>Warna</td>
                                        <td>Stock</td>
                                        <td>Kondisi</td>
                                        <td>Tarif per Hari</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($playstations as $playstation)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$playstation->type->name}}</td>
                                            <td>{{$playstation->storage->capacity}}</td>
                                            <td>{{$playstation->brand}}</td>
                                            <td>{{$playstation->color}}</td>
                                            <td>{{$playstation->stock}}</td>
                                            <td>{{$playstation->condition}}</td>
                                            <td>{{$playstation->price_rate}}</td>
                                            <td>
                                                <div class="col-lg-3">
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updatePlaystationModal" wire:click.prevent="edit({{ $playstation->id }})">Edit</button>
                                                    <button type="button" class="btn btn-danger" wire:click.prevent="delete({{ $playstation->id }})">Delete</button>
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
</div> --}}
{{-- @extends('layouts.app')

@section('content') --}}
    
    <div>
        @include('livewire.playstation.create')
        @include('livewire.playstation.update')
        <section>
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
                                        <h3 class="text-white mb-4">Seluruh Playstation</h3>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlaystationModal">
                                        Tambah Playstation
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
                                        <th>Nama Playstation</th>
                                        <th>Type</th>
                                        <th>Kapasitas</th>
                                        <th>Brand</th>
                                        <th>Warna</th>
                                        <th>Stock</th>
                                        <th>Kondisi</th>
                                        <th>Tarif per Hari</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($playstations as $playstation)
                                        <tr>
                                            <td class="name mb-0 text-sm">{{ $loop->iteration }}</td>
                                            <td class="name mb-0 text-sm">{{$playstation->name}}</td>
                                            <td class="name mb-0 text-sm">{{$playstation->type->name}}</td>
                                            <td class="name mb-0 text-sm">{{$playstation->storage->capacity}} Gb</td>
                                            <td class="name mb-0 text-sm">{{$playstation->brand}}</td>
                                            <td class="name mb-0 text-sm">{{$playstation->color}}</td>
                                            <td class="name mb-0 text-sm">{{$playstation->stock}}</td>
                                            <td class="name mb-0 text-sm">{{$playstation->condition}}</td>
                                            <td class="name mb-0 text-sm">{{currency_IDR($playstation->price_rate)}} </td>
                                            <td class="name mb-0 text-sm">
                                                <div class="col-lg-3">
                                                    <button type="button" class="btn bg-primary" data-bs-toggle="modal" data-bs-target="#updatePlaystationModal" wire:click.prevent="edit({{ $playstation->id }})"><i class="ni ni-ruler-pencil text-light"></i></button>
                                                    <button type="button" class="btn bg-danger" wire:click.prevent="delete({{ $playstation->id }})"><i class="ni ni-fat-remove text-white"></i></button>
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
{{-- @endsection --}}