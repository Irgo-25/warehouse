<div class="fixed w-[95%] md:w-[81%]">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-semibold">User</h1>
        <a href="{{route('createUser')}}" type="button" class="rounded-md p-2.5 bg-blue-700 text-white text-sm font-bold
            hover:bg-blue-500">Add User</a>
    </div>
    <x-alert-toast />
    <div class=" py-2 px-2 my-2 h-23 rounded-md shadow-lg h-[35rem] bg-white">
        {{-- searh and paginate --}}
        <div class=" flex justify-between items-center">
            <div>
                <input wire:model.live.debounce.300ms="search" class="rounded-md" type="text"
                    placeholder="Enter keyword">
            </div>
            {{-- Button Export --}}
            <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="3000"
                data-dropdown-trigger="hover"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Export <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            {{-- end button Export --}}
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
            <div class="flex items-center mb-3">
                <label class="w-16 text-sm font-medium text-gray-900">Per Page</label>
                <select wire:model.live="perPage"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 ">
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
                    <tr>
                        @include('livewire.components.tableheader-sort',[
                        'name' => 'name',
                        'displayName'=> 'USERNAME'
                        ])
                        @include('livewire.components.tableheader-sort',[
                        'name' => 'email',
                        'displayName'=> 'EMAIL'
                        ])
                        @include('livewire.components.tableheader-sort',[
                        'name' => 'role_id',
                        'displayName'=> 'ROLE'
                        ])
                        <th scope="col" class="border-r py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr class="bg-white border-b-2 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                        <th scope="row" class="p-4">{{$user->name}}</th>
                        <td scope="row" class="p-4">{{$user->email}}</td>
                        <td scope="row" class="p-4"> @forelse($user->roles as $role)
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 mr-1">
                                {{ $role->name }}
                            </span>
                            @empty
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Tidak ada role
                            </span>
                            @endforelse
                        </td>
                        <td scope="row" class="flex p-4">
                            <a href="{{route('editUser', $user->id)}}"
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
                            <button data-swal-template="#my-template" data-id-user="{{$user->id}}"
                                class="delete-btn text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-md text-xs p-1 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
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
                            <p class="text-lg font-semibold text-center text-black ">User Empty</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="py-4 px-3">
            {{$users->links()}}
        </div>
    </div>
    <template id="my-template">
        <swal-title>
            Are you sure you want to delete?
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
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(){
                    const id = this.getAttribute("data-id-user");
                    Swal.fire({
                       template: "#my-template",
                    }).then((result)=>{
                        if(result.isConfirmed){
                            Livewire.dispatch('deleteConfirmed', {id});
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