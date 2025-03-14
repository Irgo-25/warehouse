<div>
    <h1 class="text-3xl my-2">Unit Barang</h1>
    <a href="{{route('addUnit')}}" type="button" class="rounded-md p-2 bg-blue-700 text-white text-xs font-bold
        hover:bg-blue-500">Tambah Unit</a>
    <div class=" py-2 my-2">
        <div class="max-w-3xl ">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-[#36C2CE] dark:bg-gray-700 dark:text-gray-400 ">
                            <tr class="text-center">
                                <th scope="col" class="border-r py-3">
                                    No
                                </th>
                                <th scope="col" class="border-r py-3 px-36">
                                    Unit
                                <th scope="col" class="border-r py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($units as $unit)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                <td scope="row" class="border-b">{{$units->firstItem()+$loop->index}}</td>
                                @if ($unitID == $unit->id_unit)
                                <td class="p-2">
                                    <input type="text" id="name" wire:model="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-32 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Default Unit">
                                    <div class="text-red-600">@error('name') {{ $message }} @enderror</div>
                                    <button wire:click="update" id="btn"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mt-2 px-2 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                <button wire:click="cancelEdit" id="btn"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm mt-2 px-2 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">batal</button>
                                </td>
                                @else
                                <td scope="row" class="border-b">{{$unit->name}}</td>
                                @endif
                                <td class="px-6 py-4 border-b text-center">
                                    <button wire:click="edit({{$unit->id_unit}})" class=" text-white mr-2 bg-blue-700 hover:bg-blue-800 focus:ring-4
                                        focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2
                                        text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Edit Unit
                                    </button>
                                    <a href="" wire:click.prevent="delete('{{$unit->id_unit}}')" class=" text-white bg-red-700 hover:bg-red-800 focus:ring-4
                                        focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2
                                        text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                        type="button">
                                        Deleter Unit
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <td colspan="5">
                                <p class="text-lg font-semibold text-center text-black ">Data Unit
                                    Kosong</p>
                            </td>
                            @endforelse
                            <tr>
                                <td colspan="5"> {{$units->links()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>