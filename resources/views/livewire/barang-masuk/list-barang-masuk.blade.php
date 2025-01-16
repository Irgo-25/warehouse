<div class="fixed w-[81%]">
    <div class="flex justify-between items-center ">
        <h2 class="text-3xl font-semibold">List Barang Masuk</h2>
        @livewire('components.modal-barang-masuk')
    </div>
    <div class=" py-2 px-2 my-2 h-23 rounded-md h-[35rem] bg-gray-100">
        {{-- searh and paginate --}}
        <div class=" flex justify-between items-center">
            <div>
                <input wire:model.live.debounce.300ms="search" class="rounded-md" type="text"
                    placeholder="Masukan Kata Kunci">
            </div>
            {{-- Button dropdown --}}
            <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="3000"
                data-dropdown-trigger="hover"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Export <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            {{-- end button dropdown --}}
            <!-- Dropdown menu -->
            <div id="dropdownDelay"
                class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
                    <li>
                        <a href="{{route('listBarangPdf')}}" target="_blank"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PDF</a>
                    </li>

                </ul>
            </div>
            {{-- end dropdown menu --}}
            {{-- paginate --}}
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
            {{-- end pafinate --}}
        </div>
        <div class="h-[27rem] scrollbar-hide overflow-y-auto shadow-md sm:rounded-lg">
            <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead
                    class=" sticky top-0 z-10 text-xs h-11 text-white uppercase bg-[#4535C1] dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center">
                        @include('livewire.components.tableheader-sort',[
                        'name' => 'id_barang_masuk',
                        'displayName'=> 'BATCH NUMBER'
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
                    <tr class="bg-white border-b dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                        <th scope="row" class="p-4">{{$item->id_barang_masuk}}</th>
                        <th scope="row" class="p-4">{{$item->tanggal_masuk}}</th>
                        <td scope="row" class="p-4"> {{$item->barang->nama_barang}} </td>
                        <td scope="row" class="p-4"> {{$item->jumlah_masuk}} {{$item->unit->name}}
                        </td>
                        <td scope="row" class="p-4">{{$item->keterangan}}</td>
                        <td class="py-4 border-b text-center flex">
                            <a href="{{route('editBarangMasuk', $item->id_barang_masuk)}}"
                                class="mr-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                                            focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs p-1
                                            text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                    <path
                                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>
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
        </div>
        <div class="py-4 px-3">
            {{$items->links()}}
        </div>
    </div>
</div>