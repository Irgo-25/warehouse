<div>
    <div>
        <h2 class="text-3xl font-semibold">List Barang Masuk</h2>
    </div>
    @livewire('components.modal-barang-masuk')
    <div class=" py-2 px-2 my-2 rounded-md bg-gray-100">
        {{-- searh and paginate --}}
        <div class=" my-2 flex justify-between">
            <div>
                <input wire:model.live.debounce.300ms="search" class="rounded-md" type="text"
                    placeholder="Masukan Kata Kunci">
            </div>
        </div>
        <div class="max-w-full mx-auto">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-[#36C2CE] dark:bg-gray-700 dark:text-gray-400 ">
                            <tr class="text-center">
                                @include('livewire.components.tableheader-sort',[
                                'name' => 'id_barang_masuk',
                                'displayName'=> 'KODE BARANG MASUK'
                                ])
                                @include('livewire.components.tableheader-sort',[
                                'name' => 'tanggal_masuk',
                                'displayName'=> 'TANGGAL MASUK'
                                ])
                                @include('livewire.components.tableheader-sort',[
                                'name' => 'barang_id',
                                'displayName'=> 'NAMA BARANG'
                                ])
                                @include('livewire.components.tableheader-sort',[
                                'name' => 'jumlah_masuk',
                                'displayName'=> 'JUMLAH MASUK'
                                ])
                                @include('livewire.components.tableheader-sort',[
                                'name' => 'keterangan',
                                'displayName'=> 'KETERANGAM'
                                ])
                                <th scope="col" class="border-r py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                <th scope="row" class="border-b">{{$item->id_barang_masuk}}</th>
                                <td scope="row" class="border-b">{{$item->tanggal_masuk}}</td>
                                <td scope="row" class="border-b"> {{$item->barang->nama_barang}} </td>
                                <td scope="row" class="border-b"> {{$item->jumlah_masuk}} {{$item->barang->satuan}} </td>
                                <td scope="row" class="border-b">{{$item->keterangan}}</td>
                                <td class="py-4 border-b text-center">
                                    <a href="{{route('editBarangMasuk', $item->id_barang_masuk)}}"
                                        class="mr-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                                            focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs p-1
                                            text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                        Ubah Barang
                                    </a>
                                    <a href="" wire:click.prevent="delete('{{$item->id_barang_masuk}}')" class=" text-white bg-red-700 hover:bg-red-800 focus:ring-4
                                            focus:outline-none focus:ring-red-300 font-medium rounded-md text-xs p-1
                                            text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                        type="button">
                                        Hapus Barang
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <p class="text-lg font-semibold text-center text-black ">Data Barang Masuk
                                        Kosong</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="py-4 px-3">
                        <div class="flex ">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                <select wire:model.live="perPage"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            {{$items->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>