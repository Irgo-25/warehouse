<div>
    <x-alert-toast />
    <div class="p-2">
        <h3 class="text-2xl">Form Barang Keluar</h3>
    </div>
    <div class="p-2">
        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-2 gap-3">
                <div class="mb-3">
                    <label class="text-base font-medium block mb-2" for="kode-barang">Batch Barang Keluar
                        :</label>
                    <x-input type="text" wire:model="id_barang_keluar" disabled />
                    <div class="text-red-600">@error('id_barang_keluar') {{ $message }} @enderror</div>
                </div>
                <div>
                    <label class="text-base font-medium block mb-2" for="tanggal_keluar">Tanggal Keluar :</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input wire:model="tanggal_keluar" type="Date" value="{{ old('tanggal_keluar',$tanggal_keluar) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                        Sekarang</label>
                    <div class="flex">
                        <input value="{{$stock}}" wire:model="stock" id="stock"
                            class="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-primary-500 focus:border-primary-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        <option value="">Pilih Unit</option>
                        @foreach($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->unit->name }}
                            ({{ $unit->conversion_unit }})</option>
                        @endforeach
                    </select>
                    <div class="text-red-600">@error('barang_id') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3">
                    <label class="text-base font-medium block mb-2" for="jumlah-keluar">Jumlah Keluar :</label>
                    <x-input type="number" wire:model="jumlah_keluar" />
                    <div class="text-red-600">@error('jumlah_keluar') {{ $message }} @enderror</div>
                </div>
                <div class="mb-3 col-span-2">
                    <label class="text-base font-medium block mb-2" for="keterangan">Keterangan :</label>
                    <x-input type="text" wire:model="keterangan" placeholder="Masukan Keterangan" />
                    <div class="text-red-600">@error('keterangan') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="flex flex-row items-center gap-2">
                <button type="submit" class="p-2 bg-blue-700 rounded-md font-medium text-white">Simpan</button>
                <a href="{{ route('listBarangKeluar') }}" class="p-2 bg-red-700 rounded-md font-medium text-white">Batal</a>
                <div wire:loading>
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                </div>
            </div>
        </form>
    </div>
</div>