<div>
    <div class="p-2">
        <h3 class="text-2xl font-semibold">Form Barang</h3>
    </div>
    <div class="p-2">
        <form wire:submit="submit">
            @csrf
            <div class="mb-3">
                <label class="text-base font-medium block mb-2" for="kode-barang">Kode Barang :</label>
                <x-input wire:model="kode_barang" disabled/>
                <div class="text-red-600">@error('kode_barang') {{ $message }} @enderror</div>
            </div>
            <div class="mb-3">
                <label class="text-base font-medium block mb-2" for="kode-barang">Nama Barang :</label>
                <x-input type="text" wire:model="nama_barang" placeholder="Masukan Nama Barang" />
                <div class="text-red-600">@error('nama_barang') {{ $message }} @enderror</div>
            </div>
            <div class="mb-3">
                <label for="kategori"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">kategori</label>
                <x-select-form id="kategori" wire:model="kategori_id">
                    <option>Masukan kategori</option>
                    @foreach ($categoris as $category)
                    <option value="{{$category->id_kategori}}"> {{$category->kategori}} </option>
                    @endforeach
                </x-select-form>
                <div class="text-red-600">@error('kategori_id') {{ $message }} @enderror</div>
            </div>
            <div class="mb-3">
                <label for="unit"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Default Unit</label>
                <x-select-form id="unit" wire:model="unit_id">
                    <option>Masukan Default Unit</option>
                    @foreach ($units as $unit)
                    <option value="{{$unit->id_unit}}"> {{$unit->name}} </option>
                    @endforeach
                </x-select-form>
                <div class="text-red-600">@error('unit_id') {{ $message }} @enderror</div>
            </div>
            <button type="submit" class="p-2 bg-[#36C2CE] rounded-md font-medium text-white">Simpan</button>
            <a href="{{route('listBarang')}}" class="p-2 bg-red-700 rounded-md font-medium text-white">Batal</a>
        </form>
    </div>