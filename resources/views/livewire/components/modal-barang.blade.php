<div>
    <button wire:click="toogle" class="px-4 py-2 bg-blue-700 text-white rounded">
       Tambah
    </button>
    <!-- Modal -->
    @if ($show)
    <div class="fixed z-50 inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-3/4 lg:w-1/4 sm:w-1/2 md:w-1/4">
            <div class="p-2">
                <h3 class="text-2xl">Form Tambah Barang</h3>
            </div>
            <div class="p-2">
                <form wire:submit="submit">
                    <div class="mb-3">
                        <label class="text-base font-medium block mb-2" for="kode-barang">Kode Barang :</label>
                        <x-input wire:model="kode_barang" disabled/>
                        <div class="text-red-600">@error('kode_barang') {{ $message }} @enderror</div>
                    </div>
                    <div class="mb-3">
                        <label class="text-base font-medium block mb-2" for="kode-barang">Nama Barang :</label>
                        <x-input wire:model="nama_barang" placeholder="Masukan Nama Barang" />
                        <div class="text-red-600">@error('nama_barang') {{ $message }} @enderror</div>
                    </div>
                    <div class="mb-3">
                        <label for="kategori"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">kategori</label>
                        <select id="kategori" wire:model="kategori_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Masukan kategori</option>
                            @foreach ($categoris as $category)
                            <option value="{{$category->id_kategori}}"> {{$category->kategori}} </option>
                            @endforeach
                        </select>
                        <div class="text-red-600">@error('kategori_id') {{ $message }} @enderror</div>
                    </div>
                    <div class="mb-3">
                        <label for="unit"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Default Unit</label>
                        <select id="unit" wire:model="unit_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Masukan Default Unit</option>
                            @foreach ($units as $unit)
                            <option value="{{$unit->id_unit}}"> {{$unit->name}} </option>
                            @endforeach
                        </select>
                        <div class="text-red-600">@error('unit_id') {{ $message }} @enderror</div>
                    </div>
                    <button type="submit" class="p-2 bg-[#36C2CE] rounded-md font-medium text-white">Simpan</button>
                    <a href="{{route('listBarang')}}" class="p-2 bg-red-700 rounded-md font-medium text-white">Batal</a>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>