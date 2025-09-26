<div>
    <form class="p-4 md:p-5" wire:submit="update">
        <div class="mb-3">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
            <input type="text" wire:model="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Masukan Role">
            <div class="text-red-600">@error('name') {{ $message }} @enderror</div>
        </div>

        <div class="mt-4">
            <h4 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission</h4>
            <div class="my-3 grid grid-cols-2 md:grid-cols-3 gap-2 max-h-48 overflow-y-auto">
                @foreach($permissions as $permission)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" value="{{ $permission->name }}" wire:model.defer="selectedPermissions"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                    <span class="text-sm text-gray-600">{{ $permission->name }}</span>
                </label>
                @endforeach
            </div>
        </div>
        <button type="submit"
            class="text-white inline-flex items-center bg-[#402E7A] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-[#402E7A] dark:focus:ring-blue-800">
            Edit Role
        </button>
        <a href="{{route('role')}}"
            class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            Batal
        </a>
    </form>
</div>