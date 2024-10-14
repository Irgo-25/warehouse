<form class="p-4 md:p-5" wire:submit="update">
    <div class="mb-3">
        <label for="kode_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Barang</label>
        <input type="text" wire:model="kode_barang" id="kode_barang"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
           >
        <div class="text-red-600">@error('kode_barang') {{ $message }} @enderror</div>
    </div>
    <div class="mb-3">
        <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
        <input type="text" wire:model="nama_barang" id="nama_barang"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            >
        <div class="text-red-600">@error('nama_barang') {{ $message }} @enderror</div>
    </div>

    <div class="mb-3">
        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
        <select id="category_id" wire:model="kategori_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option >Masukan kategori</option>
            @foreach ($kategoris as $kategori)
            <option value="{{$kategori->id_kategori}}"> {{$kategori->kategori}} </option>
            @endforeach
        </select>
        <div class="text-red-600">@error('kategori_id') {{ $message }} @enderror</div>
    </div>
    <div class="mb-3">
        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Default Unit</label>
        <select id="category_id" wire:model="unit_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option >Masukan kategori</option>
            @foreach ($units as $unit)
            <option value="{{$unit->id_unit}}"> {{$unit->name}} </option>
            @endforeach
        </select>
        <div class="text-red-600">@error('unit_id') {{ $message }} @enderror</div>
    </div>
    <button type="submit"
        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Edit Barang
    </button>
    <a href="{{route('listBarang')}}" type="button"
        class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
        Batal
    </a>
</form>