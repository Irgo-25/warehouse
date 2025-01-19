<div>
    <div>
        <h2 class="text-3xl font-semibold">List Barang Keluar</h2>
    </div>
    @livewire('components.modal-barang-keluar')
        {{-- Button Export --}}
        <x-modal-laporan/>
    {{-- end button Export --}}
    <div class=" py-2 px-2 my-2 rounded-md bg-slate-50">
        {{-- searh and paginate --}}
        <div class=" my-2 flex justify-between">
            <div>
                <input wire:model.live.debounce.300ms="search" class="rounded-md" type="text"
                    placeholder="Masukan Kata Kunci">
            </div>
        </div>
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden">
                <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
                    <table
                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-[#36C2CE] dark:bg-gray-700 dark:text-gray-400 ">
                            <tr class="text-center">
                                @include('livewire.components.tableheader-sort',[
                                'name' => 'id_barang_keluar',
                                'displayName'=> 'BATCH NUMBER'
                                ])
                                @include('livewire.components.tableheader-sort',[
                                'name' => 'tanggal_keluar',
                                'displayName'=> 'TANGGAL KELUAR'
                                ])
                                @include('livewire.components.tableheader-sort',[
                                'name' => 'barang_id',
                                'displayName'=> 'NAMA BARANG'
                                ])
                                @include('livewire.components.tableheader-sort',[
                                'name' => 'jumlah_keluar',
                                'displayName'=> 'JUMLAH KELUAR'
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
                                <th scope="row" class="border-b">{{$item->id_barang_keluar}}</th>
                                <td scope="row" class="border-b">
                                    {{Carbon\Carbon::parse($item->tanggal_keluar)->translatedFormat('d F Y')}}</td>
                                <td scope="row" class="border-b">{{$item->barang->nama_barang}}</td>
                                <td scope="row" class="border-b">{{$item->jumlah_keluar}} {{$item->unit->name}}</td>
                                <td scope="row" class="border-b">{{$item->keterangan}}</td>
                                <td class="py-4 border-b text-center">
                                    <a href=""
                                        class="mr-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                                            focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs p-1
                                            text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Ubah Barang
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <p class="text-lg font-semibold text-center text-black ">Data Barang Keluar
                                        Kosong</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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