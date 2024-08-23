<div>
    <button wire:click="toogle" class="px-4 py-2 bg-blue-500 text-white rounded">
        Tambah
    </button>
    <!-- Modal -->
    @if ($show)
    <div class="fixed z-50 overflow-y-auto inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-3/4 lg:w-1/4 sm:w-1/2 md:w-1/4">
            <div class="p-2">
                <h3 class="text-2xl">Form Barang Masuk</h3>
            </div>
            <div class="p-2">
                <form wire:submit.prevent="submit">
                    <div class="mb-3">
                        <label class="text-base font-medium block mb-2" for="kode-barang">Batch Barang Masuk :</label>
                        <x-input type="text"  disabled />
                        <div class="text-red-600">@error('id_barang_masuk') {{ $message }} @enderror</div>
                    </div>

                    <button type="submit" class="p-2 bg-[#36C2CE] rounded-md font-medium text-white">Simpan</button>
                    <a href="{{ route('listBarang') }}"
                        class="p-2 bg-red-700 rounded-md font-medium text-white">Batal</a>
                </form>
            </div>
        </div>
    </div>


    @endif
</div>