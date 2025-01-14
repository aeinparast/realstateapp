<div class="grid grid-cols-1 gap-4 px-4 mt-8 overflow-hidden lg:grid-cols-4 sm:grid-cols-2 md:grid-cols-3"
    id="post-search">
    <div class="fixed z-20 invisible p-2 text-white transition-opacity duration-300 rounded-full opacity-0 top-2 right-2 md:hidden bg-brand"
        id="search-nav">
        <div class="flex justify-between w-full">
            <div class="flex items-center justify-center p-2 border-2 border-white rounded-full" id="search-btn">
                <i class="flex items-center justify-center cursor-pointer bi bi-search"></i>
            </div>
        </div>
    </div>
    <!-- Mobile Search nav -->
    <div class="fixed top-0 right-0 z-50 w-full h-screen transition-transform translate-x-full bg-white"
        id="search-modal">
        <div class="relative w-full h-screen">
            <div class="fixed z-30 flex items-center justify-center rounded-full top-2 left-2 h-7 w-7 bg-brand"
                wire:click='$refresh'>
                <i class="flex items-center justify-center text-white bi bi-x-circle"></i>
            </div>
            <div class="sticky right-0 w-full max-h-[100vh] py-5 top-0 overflow-y-auto no-scrollbar">
                @if ($agentInfo!=null&&$agent!='')
                <div
                    class="border-brand border rounded w-full mt-4 px-2 py-1 mb-2 flex justify-between items-center text-brand">
                    <div class="font-medium">{{$agentInfo->name}}</div>
                    <i class="bi bi-x-circle-fill flex justify-between items-center cursor-pointer"
                        wire:click='clearAgent'></i>
                </div>
                @endif
                <div class="mt-4">
                    <div class=""> {{ $assets->links(data:['scrollTo' => '#post-search']) }}</div>
                </div>

                <div class="w-full"></div>
                <div class="w-full mt-8">
                    <div class="relative inline-flex w-full">
                        <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                        <select id="city-dropdown_mobile"
                            class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0"
                            wire:model='City' wire:change='changeCity'>
                            <option value="">انتخاب شهر</option> <!-- Default option -->
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <p class="my-2 text-lg font-bold text-gray-600">نوع ملک</p>
                <div class="flex flex-col gap-2 pr-4 mb-6">
                    <div class="items-center">
                        <input id="bt_all_mobile" type="radio" name="assetType_mobile" value="" wire:model="assetType"
                            wire:change='changeAsset' class="public-search__btn-radio">
                        <label for="bt_all_mobile" class="font-medium text-gray-600 ms-2 dark:text-gray-300">همه
                            موارد</label>
                    </div>
                    <div class="items-center">
                        <input id="land_mobile" type="radio" name="assetType_mobile" value="0" wire:model="assetType"
                            wire:change='changeAsset' class="public-search__btn-radio">
                        <label for="land_mobile" class="font-medium text-gray-600 ms-2 dark:text-gray-300">زمین</label>
                    </div>
                    <div class="flex items-center">
                        <input id="home_mobile" type="radio" name="assetType_mobile" value="1" wire:model="assetType"
                            wire:change='changeAsset' class="public-search__btn-radio">
                        <label for="home_mobile" class="font-medium text-gray-600 ms-2 dark:text-gray-300">خانه</label>
                    </div>
                    <div class="flex items-center">
                        <input id="villa_mobile" type="radio" name="assetType_mobile" value="2" wire:model="assetType"
                            wire:change='changeAsset' class="public-search__btn-radio">
                        <label for="villa_mobile" class="font-medium text-gray-600 ms-2 dark:text-gray-300">ویلا</label>
                    </div>
                    <div class="flex items-center">
                        <input id="biz_mobile" type="radio" name="assetType_mobile" value="3" wire:model="assetType"
                            wire:change='changeAsset' class="public-search__btn-radio">
                        <label for="biz_mobile" class="font-medium text-gray-600 ms-2 dark:text-gray-300">تجاری</label>
                    </div>
                </div>
                <div class="w-full mt-4">
                    <div class="relative inline-flex w-full">
                        <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                        <select id="city-dropdown_mobile" wire:model='bt'
                            class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0">
                            <option value="">دسته بندی ملک</option> <!-- Default option -->
                            @if ($assetType==0)
                            @foreach (config('assetType')[0] as $key=> $at)
                            <option value="{{$key}}">{{$at}}</option>
                            @endforeach
                            @endif
                            @if ($assetType==1)
                            @foreach (config('assetType')[1] as $key=> $at)
                            <option value="{{$key}}">{{$at}}</option>
                            @endforeach
                            @endif
                            @if ($assetType==2)
                            @foreach (config('assetType')[2] as $key=> $at)
                            <option value="{{$key}}">{{$at}}</option>
                            @endforeach
                            @endif
                            @if ($assetType==3)
                            @foreach (config('assetType')[3] as $key=> $at)
                            <option value="{{$key}}">{{$at}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <p class="mb-2 text-lg font-bold text-gray-600">نوع معامله</p>
                <div class="flex flex-col gap-2 pr-4">
                    <div class="flex items-center mb-1">
                        <input id="at_all" type="radio" name="dealType_mobile" value="" wire:model="dealType"
                            wire:change='$refresh' class="public-search__btn-radio">
                        <label for="at_all" class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">همه
                            موارد</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="sell_mobile" type="radio" name="dealType_mobile" value="0" wire:model="dealType"
                            wire:change='$refresh' class="public-search__btn-radio">
                        <label for="sell_mobile"
                            class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">فروش</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="year_mobile" type="radio" name="dealType_mobile" value="3" wire:model="dealType"
                            wire:change='$refresh' class="public-search__btn-radio">
                        <label for="year_mobile"
                            class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">رهن</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="rent_mobile" type="radio" name="dealType_mobile" value="2" wire:model="dealType"
                            wire:change='$refresh' class="public-search__btn-radio ">
                        <label for="rent_mobile"
                            class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">اجاره</label>
                    </div>
                    @if ($assetType!=0)
                    <div class="flex items-center mb-1">
                        <input id="project_mobile" type="radio" name="dealType_mobile" value="1" wire:model="dealType"
                            wire:change='$refresh' class="public-search__btn-radio">
                        <label for="project_mobile"
                            class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">پروژه و
                            مشارکت</label>
                    </div>
                    @endif
                </div>
                <div class="flex mb-4">
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="minPrice_mobile">
                            @switch($dealType)
                            @case(3)
                            رهن
                            @break
                            @case(2)
                            وعدیه
                            @break
                            @case(1)
                            پیش‌فروش
                            @break
                            @default
                            قیمت
                            @endswitch
                            از: </label>
                        <input wire:model='minPrice' wire:change='setPrice'
                            class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-brand focus:outline-none focus:bg-white focus:border-brand"
                            id="minPrice_mobile" type="number" placeholder="کف قیمت">
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="maxPrice">
                            تا: </label>
                        <input wire:model='maxPrice' wire:change='setPrice'
                            class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-brand focus:outline-none focus:bg-white focus:border-brand"
                            id="maxPrice" type="number" placeholder="سقف قیمت">
                    </div>
                </div>

                @if ($dealType==2)
                <div class="flex mb-4">
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="rent_min">
                            اجاره از: </label>
                        <input wire:model='rentMinPrice' wire:change='setPrice'
                            class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-brand focus:outline-none focus:bg-white focus:border-brand"
                            id="rent_min" type="number" placeholder="کف قیمت">
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="rent_max">
                            تا: </label>
                        <input wire:model='rentMaxPrice' wire:change='setPrice'
                            class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-brand focus:outline-none focus:bg-white focus:border-brand"
                            id="rent_max" type="number" placeholder="سقف قیمت">
                    </div>
                </div>
                @endif
                @if ($assetType!=0 && $assetType!='')
                <div class="relative inline-flex w-full">
                    <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                    <select id="elevator_mobile" wire:model='elevator'
                        class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0">
                        <option value="">آسانسور</option> <!-- Default option -->
                        <option value="0">ندارد</option> <!-- Default option -->
                        <option value="1">دارد</option> <!-- Default option -->
                    </select>
                </div>
                <div class="relative inline-flex w-full mt-2">
                    <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                    <select id="parking_mobile" wire:model='parking'
                        class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0">
                        <option value="">پارکینگ</option> <!-- Default option -->
                        <option value="0">ندارد</option> <!-- Default option -->
                        <option value="1">دارد</option> <!-- Default option -->
                    </select>
                </div>
                <div class="relative inline-flex w-full mt-2">
                    <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                    <select id="storage_mobile" wire:model='storage'
                        class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0">
                        <option value="">انبار</option> <!-- Default option -->
                        <option value="0">ندارد</option> <!-- Default option -->
                        <option value="1">دارد</option> <!-- Default option -->
                    </select>
                </div>
                <div class="relative inline-flex w-full mt-2">
                    <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                    <select id="wcs_mobile" wire:model='wcs'
                        class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0">
                        <option value="">سرویس بهداشتی</option> <!-- Default option -->
                        <option value="0">ندارد</option> <!-- Default option -->
                        <option value="1">دارد</option> <!-- Default option -->
                    </select>
                </div>
                @endif
                <button class="w-full py-1 font-medium text-white border-2 rounded bg-brand"
                    wire:click='$refresh'>جستوجو</button>
            </div>
        </div>
    </div>
    <!-- Mobile Search nav-end -->

    <div class="top-0 right-0 flex-col hidden col-span-1 gap-2 p-2 border-2 rounded sm:flex border-brand">
        <div class="sticky right-0 w-full max-h-[100vh] py-5 top-0 overflow-y-auto no-scrollbar">
            <div class="w-full">
                @if ($agentInfo!=null&&$agent!='')
                <div
                    class="border-brand border rounded w-full px-2 py-1 mb-2 flex justify-between items-center text-brand">
                    <div class="font-medium">{{$agentInfo->name}}</div>
                    <i class="bi bi-x-circle-fill flex justify-between items-center cursor-pointer"
                        wire:click='clearAgent'></i>
                </div>
                @endif
                <div class="relative inline-flex w-full">
                    <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                    <select id="city-dropdown"
                        class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0"
                        wire:model='City' wire:change='changeCity'>
                        <option value="">انتخاب شهر</option> <!-- Default option -->
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p class="my-2 text-lg font-bold text-gray-600">نوع ملک</p>
            <div class="flex flex-col gap-2 pr-4 mb-6">
                <div class="items-center">
                    <input id="bt_all" type="radio" name="assetType" value="" wire:model="assetType"
                        wire:change='changeAsset' class="public-search__btn-radio">
                    <label for="bt_all" class="font-medium text-gray-600 ms-2 dark:text-gray-300">همه موارد</label>
                </div>
                <div class="items-center">
                    <input id="land_mobile" type="radio" name="assetType" value="0" wire:model="assetType"
                        wire:change='changeAsset' class="public-search__btn-radio">
                    <label for="land_mobile" class="font-medium text-gray-600 ms-2 dark:text-gray-300">زمین</label>
                </div>
                <div class="flex items-center">
                    <input id="home_mobile" type="radio" name="assetType" value="1" wire:model="assetType"
                        wire:change='changeAsset' class="public-search__btn-radio">
                    <label for="home_mobile" class="font-medium text-gray-600 ms-2 dark:text-gray-300">خانه</label>
                </div>
                <div class="flex items-center">
                    <input id="villa_mobile" type="radio" name="assetType" value="2" wire:model="assetType"
                        wire:change='changeAsset' class="public-search__btn-radio">
                    <label for="villa_mobile" class="font-medium text-gray-600 ms-2 dark:text-gray-300">ویلا</label>
                </div>
                <div class="flex items-center">
                    <input id="biz_mobile" type="radio" name="assetType" value="3" wire:model="assetType"
                        wire:change='changeAsset' class="public-search__btn-radio">
                    <label for="biz_mobile" class="font-medium text-gray-600 ms-2 dark:text-gray-300">تجاری</label>
                </div>
            </div>
            <div class="w-full mt-4">
                <div class="relative inline-flex w-full">
                    <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                    <select id="city-dropdown" wire:model='bt' wire:change='$refresh'
                        class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0">
                        <option value="">دسته بندی ملک</option> <!-- Default option -->
                        @if ($assetType==0)
                        @foreach (config('assetType')[0] as $key=> $at)
                        <option value="{{$key}}">{{$at}}</option>
                        @endforeach
                        @endif
                        @if ($assetType==1)
                        @foreach (config('assetType')[1] as $key=> $at)
                        <option value="{{$key}}">{{$at}}</option>
                        @endforeach
                        @endif
                        @if ($assetType==2)
                        @foreach (config('assetType')[2] as $key=> $at)
                        <option value="{{$key}}">{{$at}}</option>
                        @endforeach
                        @endif
                        @if ($assetType==3)
                        @foreach (config('assetType')[3] as $key=> $at)
                        <option value="{{$key}}">{{$at}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <p class="mb-2 text-lg font-bold text-gray-600">نوع معامله</p>
            <div class="flex flex-col gap-2 pr-4">
                <div class="flex items-center mb-1">
                    <input id="at_all" type="radio" name="dealType" value="" wire:model="dealType"
                        wire:change='$refresh' class="public-search__btn-radio">
                    <label for="at_all" class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">همه
                        موارد</label>
                </div>
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
                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="minPrice">
                        @switch($dealType)
                        @case(3)
                        رهن
                        @break
                        @case(2)
                        وعدیه
                        @break
                        @case(1)
                        پیش‌فروش
                        @break
                        @default
                        قیمت
                        @endswitch
                        از: </label>
                    <input wire:model='minPrice' wire:change='setPrice'
                        class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-brand focus:outline-none focus:bg-white focus:border-brand"
                        id="minPrice" type="number" placeholder="کف قیمت">
                </div>
                <div class="w-full px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="maxPrice">
                        تا: </label>
                    <input wire:model='maxPrice' wire:change='setPrice'
                        class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-brand focus:outline-none focus:bg-white focus:border-brand"
                        id="maxPrice" type="number" placeholder="سقف قیمت">
                </div>
            </div>
            @if ($dealType==2)
            <div class="flex mb-4">
                <div class="w-full px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="rent_min">
                        اجاره از: </label>
                    <input wire:model='rentMinPrice' wire:change='setPrice'
                        class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-brand focus:outline-none focus:bg-white focus:border-brand"
                        id="rent_min" type="number" placeholder="کف قیمت">
                </div>
                <div class="w-full px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="rent_max">
                        تا: </label>
                    <input wire:model='rentMaxPrice' wire:change='setPrice'
                        class="block w-full py-3 pl-0 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-brand focus:outline-none focus:bg-white focus:border-brand"
                        id="rent_max" type="number" placeholder="سقف قیمت">
                </div>
            </div>
            @endif
            @if ($assetType!=0 && $assetType!='')
            <div class="relative inline-flex w-full">
                <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                <select id="elevator" wire:model='elevator' wire:change='$refresh'
                    class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0">
                    <option value="">آسانسور</option> <!-- Default option -->
                    <option value="0">ندارد</option> <!-- Default option -->
                    <option value="1">دارد</option> <!-- Default option -->
                </select>
            </div>
            <div class="relative inline-flex w-full mt-2">
                <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                <select id="parking" wire:model='parking' wire:change='$refresh'
                    class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0">
                    <option value="">پارکینگ</option> <!-- Default option -->
                    <option value="0">ندارد</option> <!-- Default option -->
                    <option value="1">دارد</option> <!-- Default option -->
                </select>
            </div>
            <div class="relative inline-flex w-full mt-2">
                <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                <select id="storage" wire:model='storage' wire:change='$refresh'
                    class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0">
                    <option value="">انبار</option> <!-- Default option -->
                    <option value="0">ندارد</option> <!-- Default option -->
                    <option value="1">دارد</option> <!-- Default option -->
                </select>
            </div>
            <div class="relative inline-flex w-full mt-2">
                <!-- Standard HTML select dropdown with RTL support and no blue border on focus -->
                <select id="wcs" wire:model='wcs' wire:change='$refresh'
                    class="w-full py-3 text-sm font-medium text-right text-gray-800 bg-white border rounded-lg shadow-sm px-7 border-brand focus:outline-none focus:ring-0">
                    <option value="">سرویس بهداشتی</option> <!-- Default option -->
                    <option value="0">ندارد</option> <!-- Default option -->
                    <option value="1">دارد</option> <!-- Default option -->
                </select>
            </div>
            @endif
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
        <div class="text-center text-gray-500 md:hidden">برای تغییر جستوجو از نوار گزینه ذره‌بین را انتخاب کنید</div>
        @endif
        @foreach ($assets as $asset)
        <livewire:public-search-item :$asset wire:key="{{ $asset['id'] }}" />

        @endforeach
        <div class="col-span-full"> {{ $assets->links(data:['scrollTo' => '#post-search']) }}</div>
    </div>


</div>