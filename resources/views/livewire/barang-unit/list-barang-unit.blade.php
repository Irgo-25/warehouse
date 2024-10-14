<div>
    <x-label-form>
        <div class="flex justify-between items-center">
            <h3 class="text-2xl font-semibold ">Add Schema Unit</h3>
        </div>
        <form wire:submit="store">
            <div class="flex gap-3">
                <div>
                    <label for="barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barang</label>
                    <select id="barang" wire:model="barang_id"
                        class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih barang</option>
                        @foreach ($items as $item)
                        <option value="{{$item->kode_barang}}">{{$item->nama_barang}}</option>
                        @endforeach
                    </select>
                    <div class="text-red-600 text-sm">@error('barang_id') {{ $message }} @enderror</div>
                </div>
                <div>
                    <label for="unit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit Barang</label>
                    <select id="unit" wire:model="unit_id"
                        class="block w-full p-2  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih unit konversi</option>
                        @foreach ($units as $unit)
                        <option value="{{$unit->id_unit}}">{{$unit->name}}</option>
                        @endforeach
                    </select>
                    <div class="text-red-600 text-sm">@error('unit_id') {{ $message }} @enderror</div>
                </div>
                <div>
                    <label for="konversi-value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rasio Konversi</label>
                    <input type="number" id="konversi-value" wire:model="conversion_unit"
                        class="block w-full p-[0.6rem] mr-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="konversi satuan terkecil">
                        <div class="text-red-600 text-sm">@error('conversion_unit') {{ $message }} @enderror</div>
                </div>
                <div>
                    <button type="submit" id="btn" class="border-solid border-2 border-indigo-600 rounded-md px-2">Add</button>
                </div>
            </div>
        </form>
    </x-label-form>
</div>