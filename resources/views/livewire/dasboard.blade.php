<div>
    <h1 class="text-3xl font-semibold">Dashboard</h1>
    <div class="flex flex-row gap-4 mt-2">
        <div
            class="flex gap-3 p-3 w-64 bg-red-300 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div>
                <h2 class="text-2xl font-semibold">Data Barang</h2>
                <h1 class="text-4xl font-semibold text-white">{{$dataBarang}}</h1>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-20" opacity="0.3">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
        </div>
        <div
            class="max-w-xs w-64 p-3 bg-blue-300 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-2xl font-semibold">Barang Masuk</h2>
            <h1 class="text-3xl font-semibold text-white">{{$barangMasuk}}</h1>
        </div>
        <div
            class="max-w-xs w-64 p-3 bg-green-300 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-2xl font-semibold">Barang Keluar</h2>
            <h1 class="text-3xl font-semibold text-white">{{$barangKeluar}}</h1>
        </div>
    </div>
</div>