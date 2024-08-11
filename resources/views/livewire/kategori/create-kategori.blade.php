<div>
    <form class="p-4 md:p-5" wire:submit="storeKategori">
        <div class="mb-3">
            <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
            <input type="text" wire:model="kategori" id="kategori"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Masukan kategori">
            <div class="text-red-600">@error('kategori') {{ $message }} @enderror</div>
        </div>
        <button type="submit"
            class="text-white inline-flex items-center bg-[#402E7A] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-[#402E7A] dark:focus:ring-blue-800">
            Tambah Kategori Lain
        </button>
        <button wire:click="storeKategoriToIndex"
            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Tambah Kategori
        </button>
        <a href="{{route('kategoriBarang')}}"
            class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            Batal
        </a>
    </form>
</div>