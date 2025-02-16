<div class="h-fit w-fit p-2 max-h-[35rem] my-2 bg-slate-300 border-[#4535C1] border-t-4 rounded-md">
    <div class="flex justify-between items-center">
        <h3 class="text-2xl font-semibold ">Add Schema Unit</h3>
    </div>
    <form wire:submit="storeBarangUnit">
        <div class="flex gap-3">
            <div>
                <label for="barang"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barang</label>
                <input type="text" wire:model="kode_barang" id="kode_barang"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <div class="text-red-600 text-sm">@error('kode_barang') {{ $message }} @enderror</div>
            </div>
            <div>
                <label for="unit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit
                    Barang</label>
                <select id="unit" wire:model="unit_barang"
                    class="block w-full p-2  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Pilih unit konversi</option>
                    @foreach ($units as $unit)
                    <option value="{{$unit->id_unit}}">{{$unit->name}}</option>
                    @endforeach
                </select>
                <div class="text-red-600 text-sm">@error('unit_barang') {{ $message }} @enderror</div>
            </div>
            <div>
                <label for="konversi-value"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rasio Konversi</label>
                <input type="number" id="konversi-value" wire:model="conversion_unit"
                    class="block w-full p-[0.6rem] mr-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="konversi satuan terkecil">
                <div class="text-red-600 text-sm">@error('conversion_unit') {{ $message }} @enderror</div>
            </div>
        </div>
        <div class="">
            <button type="submit" id="btn" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mt-2 px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
        </div>
    </form>
</div>