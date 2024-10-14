<div>
    <h2 class="text-3xl font-semibold">Form Unit</h2>
    <x-label-form>
        <form wire:submit="storeUnit">
            <div class="mb-5" id="input-fields">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Default
                    Unit :</label>
                <input type="text" id="name" wire:model="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Default Unit">
                    <div class="text-red-600">@error('name') {{ $message }} @enderror</div>
            </div>

            <button  type="submit" class="bg-yellow-400 text-sm p-1 rounded-md font-semibold text-white">Tambah unit lain</button>
            <button  type="button" wire:click="storeToIndex"
            class="bg-blue-600 text-sm p-1 rounded-md font-semibold text-white">Tambah</button>
        </form>
    </x-label-form>
</div>