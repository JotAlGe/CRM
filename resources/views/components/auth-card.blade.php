<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-800">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-900 shadow-md overflow-hidden sm:rounded-lg text-gray-900/75">
        {{ $slot }}
    </div>
</div>
