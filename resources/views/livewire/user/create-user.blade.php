<div>
    <form class="p-4 md:p-5" wire:submit="storeUser">
        <div class="mb-3">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <x-input type="text" wire:model="name" id="name" placeholder="Masukan Nama Lengkap" />
            <div class="text-red-600">@error('name') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <x-input type="email" wire:model="email" id="email" placeholder="Masukan Alamat Email"/>
            <div class="text-red-600">@error('email') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
            <select id="role" wire:model="role_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option selected="">Masukan Role</option>
                @foreach ($roles as $role)
                <option value="{{$role->id}}"> {{$role->name}} </option>
                @endforeach
            </select>
            <div class="text-red-600">@error('role_id') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Password</label>
            <x-input id="password" type="password" wire:model="password" placeholder="Masukan password"/>
            <div class="text-red-600">@error('password') {{ $message }} @enderror</div>
        </div>
        <button type="submit"
            class="text-white inline-flex items-center bg-[#402E7A] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-[#402E7A] dark:focus:ring-blue-800">
            Tambahkan User Lain
        </button>
        <button wire:click="storeUserToIndex"
            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Tambahkan User
        </button>
        <a href="{{route('user')}}" type="button"
            class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            Batal
        </a>
    </form>
</div>