<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updatePlaystationModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserModalLabel">Update Playstation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" wire:model="idu">
                    <div class="form-group">
                        <label for="name">Nama Playstation</label>
                        <input type="text" name="name" class="form-control" wire:model="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type_id">Pilih Tipe</label>
                        <select name="type_id" id="" class="form-control" wire:model="type_id">
                            <option value="">Select a Type</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        {{-- {{ $type_id }} --}}
                        @error('type_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="storage_id">Pilih Kapasitas</label>
                        <select name="storage_id" id="" class="form-control" wire:model="storage_id">
                            <option value="">Select a Type</option>
                            @foreach($storages as $storage)
                                <option value="{{ $storage->id }}">{{ $storage->capacity }}</option>
                            @endforeach
                        </select>
                        {{-- {{ $storage_id }} --}}
                        @error('storage_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <select name="brand" id="" class="form-control" wire:model="brand">
                            <option value="">select a option</option>
                            <option value="Sony Interactive Entertainment">Sony Interactive Entertainment</option>
                        </select>
                        @error('brand')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="color">Warna</label>
                        <select name="color" id="" class="form-control" wire:model="color">
                            <option value="">select a option</option>
                            <option value="Hitam">Hitam</option>
                        </select>
                        @error('color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" wire:model="stock">
                        @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="condition">Kondisi</label>
                        <select name="condition" id="" class="form-control" wire:model="condition">
                            <option value="">select a option</option>
                            <option value="good">Baik</option>
                            <option value="broken">Rusak</option>
                        </select>
                        @error('condition')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price_rate">Tarif per hari</label>
                        <input type="number" name="price_rate" class="form-control" wire:model="price_rate">
                        @error('price_rate')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="update()">Update Playstation</button>
            </div>
        </div>
    </div>
</div>