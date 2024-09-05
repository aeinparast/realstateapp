<div class="grid grid-cols-1 gap-4 px-4 mt-8 overflow-hidden  lg:grid-cols-4 sm:grid-cols-2 md:grid-cols-3"
    id="post-search">
    <div class="fixed top-0 left-0 right-0 z-20 invisible px-4 py-2 text-white transition-opacity duration-300 opacity-0 md:hidden bg-mahdavi"
        id="search-nav">
        <div class="flex justify-between w-full">
            <div class="flex items-center justify-center p-2 border-2 border-white rounded-full" id="search-btn">
                <i class="flex items-center justify-center cursor-pointer bi bi-search"></i>
            </div>
            <div class="">
                <div class=""> {{ $assets->links(data:['scrollTo' => '#post-search']) }}</div>
            </div>
        </div>
    </div>
    <div class="fixed top-0 right-0 z-50 w-full h-screen transition-transform translate-x-full bg-white"
        id="search-modal">

        <div class="relative w-full h-screen">

            <div class="sticky right-0 w-full max-h-[100vh] py-5 top-0 overflow-y-auto no-scrollbar">
                <div class="fixed flex items-center justify-center rounded-full top-2 left-2 h-7 w-7 bg-mahdavi"
                    wire:click='$refresh'>
                    <i class="flex items-center justify-center text-white bi bi-x-circle"></i>
                </div>
                <p class="mb-2 text-lg font-bold text-gray-600">نوع ملک</p>
                <div class="flex flex-col gap-2 pr-4 mb-6">
                    <div class="items-center">
                        <input id="land-modal" type="radio" name="assetType-modal" value="0" wire:model="assetType"
                            class="public-search__btn-radio">
                        <label for="land-modal" class="font-medium text-gray-600 ms-2 dark:text-gray-300">زمین</label>
                    </div>
                    <div class="flex items-center">
                        <input id="home-modal" type="radio" name="assetType-modal" value="1" wire:model="assetType"
                            class="public-search__btn-radio">
                        <label for="home-modal" class="font-medium text-gray-600 ms-2 dark:text-gray-300">خانه</label>
                    </div>
                    <div class="flex items-center">
                        <input id="villa-modal" type="radio" name="assetType-modal" value="2" wire:model="assetType"
                            class="public-search__btn-radio">
                        <label for="villa-modal" class="font-medium text-gray-600 ms-2 dark:text-gray-300">ویلا</label>
                    </div>
                    <div class="flex items-center">
                        <input id="biz-modal" type="radio" name="assetType-modal" value="3" wire:model="assetType"
                            class="public-search__btn-radio">
                        <label for="biz-modal" class="font-medium text-gray-600 ms-2 dark:text-gray-300">تجاری</label>
                    </div>
                </div>
                <p class="mb-2 text-lg font-bold text-gray-600">نوع معامله</p>
                <div class="flex flex-col gap-2 pr-4">
                    <div class="flex items-center mb-1">
                        <input id="sell-modal" type="radio" name="dealType-modal" value="0" wire:model="dealType"
                            class="public-search__btn-radio">
                        <label for="sell-modal"
                            class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">فروش</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="year-modal" type="radio" name="dealType-modal" value="3" wire:model="dealType"
                            class="public-search__btn-radio">
                        <label for="year-modal"
                            class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">رهن</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="rent-modal" type="radio" name="dealType-modal" value="2" wire:model="dealType"
                            class="public-search__btn-radio ">
                        <label for="rent-modal"
                            class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">اجاره</label>
                    </div>
                    @if ($assetType!=0)
                    <div class="flex items-center mb-1">
                        <input id="project-modal" type="radio" name="dealType-modal" value="1" wire:model="dealType"
                            class="public-search__btn-radio">
                        <label for="project-modal"
                            class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">پروژه و
                            مشارکت</label>
                    </div>
                    @endif

                </div>
                <div class="flex mb-4">
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name-modal">
                            قیمت از: </label>
                        <input wire:model='minPrice' wire:change='setPrice'
                            class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                            id="grid-last-name-modal" type="number" placeholder="کف قیمت">
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name-modal">
                            تا: </label>
                        <input wire:model='maxPrice' wire:change='setPrice'
                            class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                            id="grid-last-name-modal" type="number" placeholder="سقف قیمت">
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name">
                            قیمت از: </label>
                        <input wire:model='minPrice' wire:change='setPrice'
                            class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                            id="grid-last-name" type="number" placeholder="کف قیمت">
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name">
                            تا: </label>
                        <input wire:model='maxPrice' wire:change='setPrice'
                            class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                            id="grid-last-name" type="number" placeholder="سقف قیمت">
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name">
                            قیمت از: </label>
                        <input wire:model='minPrice' wire:change='setPrice'
                            class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                            id="grid-last-name" type="number" placeholder="کف قیمت">
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name">
                            تا: </label>
                        <input wire:model='maxPrice' wire:change='setPrice'
                            class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                            id="grid-last-name" type="number" placeholder="سقف قیمت">
                    </div>

                </div>
                <button class="w-full py-1 font-medium text-white border-2 rounded bg-mahdavi"
                    wire:click='$refresh'>جستوجو</button>
            </div>
        </div>
    </div>
    <div class="relative top-0 right-0 flex-col hidden col-span-1 gap-2 p-2 border-2 rounded sm:flex border-mahdavi">
        <div class="sticky right-0 w-full max-h-[100vh] py-5 top-0 overflow-y-auto no-scrollbar">
            <p class="mb-2 text-lg font-bold text-gray-600">نوع ملک</p>
            <div class="flex flex-col gap-2 pr-4 mb-6">
                <div class="items-center">
                    <input id="land" type="radio" name="assetType" value="0" wire:model="assetType"
                        wire:change='$refresh' wire:change='$refresh' wire:change='$refresh'
                        class="public-search__btn-radio">
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
                    <input id="sell" type="radio" name="dealType" value="0" wire:model="dealType" wire:change='$refresh'
                        class="public-search__btn-radio">
                    <label for="sell" class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">فروش</label>
                </div>
                <div class="flex items-center mb-1">
                    <input id="year" type="radio" name="dealType" value="3" wire:model="dealType" wire:change='$refresh'
                        class="public-search__btn-radio">
                    <label for="year" class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">رهن</label>
                </div>
                <div class="flex items-center mb-1">
                    <input id="rent" type="radio" name="dealType" value="2" wire:model="dealType" wire:change='$refresh'
                        class="public-search__btn-radio ">
                    <label for="rent" class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">اجاره</label>
                </div>
                @if ($assetType!=0)
                <div class="flex items-center mb-1">
                    <input id="project" type="radio" name="dealType" value="1" wire:model="dealType"
                        wire:change='$refresh' class="public-search__btn-radio">
                    <label for="project" class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">پروژه و
                        مشارکت</label>
                </div>
                @endif

            </div>
            <div class="flex mb-4">
                <div class="w-full px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                        for="grid-last-name">
                        قیمت از: </label>
                    <input wire:model='minPrice' wire:change='setPrice'
                        class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                        id="grid-last-name" type="number" placeholder="کف قیمت">
                </div>
                <div class="w-full px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                        for="grid-last-name">
                        تا: </label>
                    <input wire:model='maxPrice' wire:change='setPrice'
                        class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                        id="grid-last-name" type="number" placeholder="سقف قیمت">
                </div>
            </div>

        </div>
    </div>

    <div class="relative grid justify-center col-span-1 gap-2 md:justify-normal md:grid-cols-2 md:col-span-2 xl:col-span-3 xl:grid-cols-3
        @if ($assets->isEmpty())
        h-screen !flex flex-col items-center
        @endif
        ">
        @if ($assets->isEmpty())
        <div class="text-3xl text-center text-gray-600 col-span-full">متاسفانه در این زمان آیتمی برای نمایش وجود ندارد.
        </div>
        <div class="text-center text-gray-500  md:hidden">برای تغییر جستوجو از نوار گزینه ذره‌بین را انتخاب کنید</div>
        @endif
        @foreach ($assets as $asset)
        <livewire:public-search-item :$asset wire:key="{{ $asset['id'] }}" />

        @endforeach
        <div class="col-span-full"> {{ $assets->links(data:['scrollTo' => '#post-search']) }}</div>
    </div>


</div>