<div>
    <form action="" wire:submit.prevent="generateEncurtador()">
        <div class="mb-3 mt-[50px]">
            @csrf
            <label class="font-semibold text-sm text-white pb-1 block mt-4" for="fullname">URL</label>
            <input wire:model="url" placeholder="http://www.example.com"
                class="w-96 bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                type="text">

            <button type="submit"
                class="w-32 bg-blue-500 text-gray-100 border-0 rounded-md p-2 mb-4 focus:bg-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 ml-3">
                Encurtar
            </button>
        </div>
        @error('url')
            <span class="text-red-500 text-[10px]">{{ $message }}</span>
        @enderror
    </form>
    @if ($createURL)
        <div class="flex">
            <p class="font-semibold">Sua URL encurtada: </p>
            <a class="ml-2 font-medium text-blue-700 underline-offset-2 hover:underline focus:underline focus:outline-none dark:text-blue-600" href="{{ $createURL->short_url }}">{{ $createURL->short_url }}</a>
        </div>
    @endif
</div>
