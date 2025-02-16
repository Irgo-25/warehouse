<div class="max-w-full mx-auto">
    <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-[#36C2CE] dark:bg-gray-700 dark:text-gray-400 ">
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
                        <td scope="row" class="px-2 border-b">{{$item->unit->name}}</td>
                        @if ($barangUnitId === $item->id)
                        <td class="p-2">
                            <input type="number" id="konversi-value" wire:model="conversion_unit"
                                class="block w-16 p-[0.6rem] mr-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="konversi satuan terkecil">
                            <button wire:click="update" id="btn"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mt-2 px-2 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            <button wire:click="cancelEdit" id="btn"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm mt-2 px-2 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">batal</button>
                        </td>
                        @else
                        <td scope="row" class="border-b">{{$item->conversion_unit}}</td>
                        @endif
                        <td class="mx-2 py-4 border-b text-center flex">
                            <button wire:click="edit({{$item->id}})"
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
                            </button>
                            <button wire:click.prevent="delete('{{$item->id}}')"
                                class=" text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-md text-xs p-1 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5">
                                    <path fill-rule="evenodd"
                                        d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
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