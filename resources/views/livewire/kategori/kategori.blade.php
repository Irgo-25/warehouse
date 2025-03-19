<div>
    <h1 class="text-3xl my-2">Kategori Barang</h1>
    <a href="{{route('addKategori')}}" type="button" class="rounded-md p-2 bg-blue-700 text-white text-xs font-bold
       hover:bg-blue-500">Tambah Kategori</a>
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
                                    Nama Kategori
                                <th scope="col" class="border-r py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategoris as $kategori)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                <td scope="row" class="border-b">{{$kategoris->firstItem()+$loop->index}}</td>
                                @if ($kategoriID == $kategori->id_kategori)
                                <td class="p-2">
                                    <input type="text" id="name" wire:model="kategori"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-32 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500"
                                        placeholder="Default Unit">
                                    <div class="text-red-600">@error('name') {{ $message }} @enderror</div>
                                    <button wire:click="update" id="btn"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mt-2 px-2 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                    <button wire:click="cancelEdit" id="btn"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm mt-2 px-2 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">batal</button>
                                </td>
                                @else
                                <td scope="row" class="border-b">{{$kategori->kategori}}</td>
                                @endif
                                <td class="px-6 py-4 border-b text-center">
                                    <button wire:click="edit({{$kategori->id_kategori}})" class=" text-white mr-2 bg-blue-700 hover:bg-blue-800 focus:ring-4
                                       focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm p-1
                                       text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Edit
                                    </button>
                                    <button data-id-kategori="{{$kategori->id_kategori}}" class="delete-btn text-white bg-red-700 hover:bg-red-800 focus:ring-4
                                       focus:outline-none focus:ring-red-300 font-medium rounded-md text-sm p-1
                                       text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                        type="button">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <td colspan="5">
                                <p class="text-lg font-semibold text-center text-black ">Data Kategori
                                    Kosong</p>
                            </td>
                            @endforelse
                            <tr>
                                <td colspan="5"> {{$kategoris->links()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <template id="my-template">
        <swal-title>
            Yakin Ingin Menghapus??
        </swal-title>
        <swal-icon type="warning" color="red"></swal-icon>
        <swal-button type="confirm" color="red">
            Delete
        </swal-button>
        <swal-button type="cancel">
            Cancel
        </swal-button>
        <swal-param name="allowEscapeKey" value="false" />
        <swal-param name="customClass" value='{ "popup": "my-popup" }' />
        <swal-function-param name="didOpen" value="popup => console.log(popup)" />
    </template>
    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
        // Swal.bindClickHandler("data-swal-template")

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(){
                const id_kategori = this.getAttribute("data-id-kategori");
                Swal.fire({
                   template: "#my-template",
                }).then((result)=>{
                    if(result.isConfirmed){
                        Livewire.dispatch('deleteConfirmed', {id_kategori});
                        // console.log("Test");
                    }
                });
                
                
            });
        });
        Livewire.on('swal:deleted', () => {
        Swal.fire('Dihapus!', 'Data telah dihapus.', 'success');
        });
    });
    </script>
</div>