<div>
   <h1 class="text-3xl my-2">Kategori Barang</h1>
   <a href="{{route('addKategori')}}" type="button" class="rounded-md p-2 bg-blue-700 text-white text-xs font-bold
       hover:bg-blue-500">Tambah Kategori</a>
       <div class=" py-2 my-2">
         <div class="max-w-3xl ">
             <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                     <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                         <thead class="text-xs text-gray-700 uppercase bg-[#36C2CE] dark:bg-gray-700 dark:text-gray-400 ">
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
                               <td scope="row" class="border-b">{{$kategori->kategori}}</td>
                               <td class="px-6 py-4 border-b text-center">
                                   <a href="{{route('editKategori', $kategori->id_category)}}" class=" text-white mr-2 bg-blue-700 hover:bg-blue-800 focus:ring-4
                                       focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2
                                       text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                       type="button">
                                       Edit User
                                   </a>
                                   <a href="" wire:click.prevent="" class=" text-white bg-red-700 hover:bg-red-800 focus:ring-4
                                       focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2
                                       text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                       type="button">
                                       Deleter User
                                   </a>
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
</div>
