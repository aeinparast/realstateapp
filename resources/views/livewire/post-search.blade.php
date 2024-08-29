<div class="grid grid-cols-1 gap-4 px-4 mt-8 lg:grid-cols-4" id="post-search">
    <div class="relative top-0 right-0 flex flex-col col-span-1 gap-2 p-2 border-2 rounded border-mahdavi">
        <div class="sticky right-0 w-full max-h-[100vh] py-5 top-0 overflow-y-auto no-scrollbar">
            <div class="flex mb-4">
                <div class="w-full px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                        for="grid-last-name">
                        قیمت از: </label>
                    <input wire:model='minPrice' wire:change='setPrice'
                        class="block w-full py-3 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                        id="grid-last-name" type="number" placeholder="کف قیمت">
                </div>
                <div class="w-full px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                        for="grid-last-name">
                        تا: </label>
                    <input wire:model='maxPrice' wire:change='setPrice'
                        class="block w-full py-3 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                        id="grid-last-name" type="number" placeholder="سقف قیمت">
                </div>
            </div>
            <p class="mb-2 text-lg font-bold text-gray-600">نوع ملک</p>
            <div class="flex flex-col gap-2 pr-4 mb-6">
                <div class="items-center">
                    <input id="land" type="radio" name="assetType" value="0" wire:model="assetType"
                        wire:change='$refresh' wire:change='$refresh' class="public-search__btn-radio">
                    <label for="land" class="font-medium text-gray-600 ms-2 dark:text-gray-300">زمین</label>
                </div>
                <div class="flex items-center">
                    <input id="home" type="radio" name="assetType" value="1" wire:model="assetType"
                        wire:change='$refresh' wire:change='$refresh' class="public-search__btn-radio">
                    <label for="home" class="font-medium text-gray-600 ms-2 dark:text-gray-300">خانه</label>
                </div>
                <div class="flex items-center">
                    <input id="villa" type="radio" name="assetType" value="2" wire:model="assetType"
                        wire:change='$refresh' wire:change='$refresh' class="public-search__btn-radio">
                    <label for="villa" class="font-medium text-gray-600 ms-2 dark:text-gray-300">ویلا</label>
                </div>
                <div class="flex items-center">
                    <input id="biz" type="radio" name="assetType" value="3" wire:model="assetType"
                        wire:change='$refresh' wire:change='$refresh' class="public-search__btn-radio">
                    <label for="biz" class="font-medium text-gray-600 ms-2 dark:text-gray-300">تجاری</label>
                </div>

            </div>
            <p class="mb-2 text-lg font-bold text-gray-600">نوع معامله</p>
            <div class="flex flex-col gap-2 pr-4">
                <div class="flex items-center mb-1">
                    <input id="sell" type="radio" name="dealType" value="0" wire:model="dealType"
                        class="public-search__btn-radio">
                    <label for="sell" class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">فروش</label>
                </div>
                <div class="flex items-center mb-1">
                    <input id="year" type="radio" name="dealType" value="1" wire:model="dealType"
                        class="public-search__btn-radio">
                    <label for="year" class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">رهن</label>
                </div>
                <div class="flex items-center mb-1">
                    <input id="rent" type="radio" name="dealType" value="2" wire:model="dealType"
                        class="public-search__btn-radio ">
                    <label for="rent" class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">اجاره</label>
                </div>
                <div class="flex items-center mb-1">
                    <input id="project" type="radio" name="dealType" value="3" wire:model="dealType"
                        class="public-search__btn-radio">
                    <label for="project" class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">پروژه و
                        مشارکت</label>
                </div>
            </div>

        </div>
    </div>

    <div class="grid grid-cols-3 col-span-3 gap-2">
        @foreach ($assets as $asset)
        <livewire:public-search-item :$asset wire:key="{{ $asset['id'] }}" />

        @endforeach
        <div class="col-span-full"> {{ $assets->links(data:['scrollTo' => '#post-search']) }}</div>
    </div>


</div>