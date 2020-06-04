<div class="mt-6 md:mt-10">
    <div class="mx-auto">
        <label for="search-bar" class="mb-2 text-lg">Type any simplified Chinese characters:</label>
        <input 
        id="search-bar" 
        wire:model="search" 
        type="text" 
        class="appearance-none focus:outline-none border-2 border-white bg-white focus:border-silver w-full h-8 p-4 md:h-16 md:text-4xl text-darkBlue rounded-lg"
        placeholder="你好">
    </div>

<div class="flex flex-wrap justify-center -mx-4 mt-8 md:mt-10">
    @include('characters-partial')
</div>
</div>