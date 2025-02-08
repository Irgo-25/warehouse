<div>
    <a href="{{route('addBarangKeluar')}}" wire:click="toogle" class="px-4 py-2 bg-blue-700 text-white rounded">
        Tambah
    </a>
    <!-- Modal -->
    @if ($show)
    <x-alert-toast />
    <div class="fixed z-50 overflow-y-auto inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-1/2">
            <div class="p-2">
                <h3 class="text-2xl">Form Barang Keluar</h3>
            </div>
            <div class="p-2">
                <form wire:submit.prevent="submit">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mb-3">
                            <label class="text-base font-medium block mb-2" for="kode-barang">Batch Barang Keluar
                                :</label>
                            <x-input type="text" wire:model="id_barang_keluar" disabled />
                            <div class="text-red-600">@error('id_barang_keluar') {{ $message }} @enderror</div>
                        </div>
                        <div class="">
                            <label class="text-base font-medium block mb-2" for="tanggal_keluar">Tanggal Keluar :</label>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input wire:model="tanggal_keluar" type="Date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Pilih Tanggal Masuk">
                            </div>
                            <div class="text-red-600">@error('tanggal_keluar') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                            <label for="Barang"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barang</label>
                            <select id="barang" wire:model.live="selectedbarang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Pilih Barang</option>
                                @foreach ($items as $item)
                                <option value="{{ $item->kode_barang }}">{{ $item->kode_barang }} ||
                                    {{ $item->nama_barang }}</option>
                                @endforeach
                            </select>
                            <div class="text-red-600">@error('barang_id') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                            <label for="stock"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                                Sekarang</label>
                            <div class="flex">
                                <input value="{{$stock}}" wire:model="stock" id="stock"
                                    class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    disabled>
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                                    disabled>
                                    {{$unitName}}
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="selectedunit" class="block mb-3 text-sm font-medium text-gray-700">Unit
                                Konversi</label>
                            <select wire:model="selectedunit" id="selectedunit"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Pilih Unit</option>
                                @foreach($units as $unit)
                                <option value="{{ $unit->unit_id }}">{{ $unit->unit->name }}
                                    ({{ $unit->conversion_unit }})</option>
                                @endforeach
                            </select>
                            <div class="text-red-600">@error('barang_id') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                            <label class="text-base font-medium block mb-2" for="jumlah-keluar">Jumlah Keluar :</label>
                            <x-input type="number" wire:model="jumlah_keluar"/>
                            <div class="text-red-600">@error('jumlah_keluar') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3 col-span-2">
                            <label class="text-base font-medium block mb-2" for="keterangan">Keterangan :</label>
                            <x-input type="text" wire:model="keterangan" placeholder="Masukan Keterangan" />
                            <div class="text-red-600">@error('keterangan') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <button type="submit" class="p-2 bg-[#36C2CE] rounded-md font-medium text-white">Simpan</button>
                    <a href="{{ route('listBarangKeluar') }}"
                        class="p-2 bg-red-700 rounded-md font-medium text-white">Batal</a>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>