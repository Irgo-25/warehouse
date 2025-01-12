<div>
    <div class="flex justify-between gap-2">
        {{-- form edit barang --}}
        <div class="h-fit w-3/4 p-2 max-h-[35rem] my-2 bg-slate-300 border-[#4535C1] border-t-4 rounded-md">
            <form class="p-4 md:p-5" wire:submit="update">
                <div class="mb-3">
                    <label for="kode_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                        Barang</label>
                    <input type="text" wire:model="kode_barang" id="kode_barang"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <div class="text-red-600">@error('kode_barang') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Barang</label>
                    <input type="text" wire:model="nama_barang" id="nama_barang"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <div class="text-red-600">@error('nama_barang') {{ $message }} @enderror</div>
                </div>
    
                <div class="mb-3">
                    <label for="category_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="category_id" wire:model="kategori_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option>Masukan kategori</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{$kategori->id_kategori}}"> {{$kategori->kategori}} </option>
                        @endforeach
                    </select>
                    <div class="text-red-600">@error('kategori_id') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Default
                        Unit</label>
                    <select id="category_id" wire:model="unit_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option>Masukan kategori</option>
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
        </div>
        {{-- end form edit barang --}}
        {{-- form add barang unit --}}
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
                <div class="mt">
                    <button type="submit" id="btn" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mt-2 px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                </div>
            </form>
        </div>
        {{-- end form add barang unit --}}
    </div>
    {{-- list barang unit --}}
    <div class="max-w-full mx-auto">
        <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-[#36C2CE] dark:bg-gray-700 dark:text-gray-400 ">
                        <tr class="text-center">
                            <th scope="col" class="border-r py-3">
                                Satuan
                            </th>
                            <th scope="col" class="border-r py-3">
                                Unit Konversi
                            </th>
                            <th scope="col" class="border-r py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                            <td scope="row" class="border-b">{{$item->unit->name}}</td>
                            <td scope="row" class="border-b">{{$item->conversion_unit}}</td>
                            <td scope="row" class="py-4 border-b flex justify-center items-center">
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <p class="text-lg font-semibold text-center text-black ">Barang Unit
                                    Kosong</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end list barang unit --}}
</div>