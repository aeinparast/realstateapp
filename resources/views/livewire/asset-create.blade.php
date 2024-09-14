<x-slot name="header">
    <h2 class="font-sans text-xl font-medium text-gray-800 dark:text-gray-200">
        <a href="{{route('asset')}}" wire:navigate class="transition-colors hover:text-gray-400">فایل‌ها</a> >
        ساخت فایل
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="mt-2 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">

            <div class="grid grid-cols-1 gap-6 p-6 text-gray-900 md:grid-cols-2 dark:text-gray-100">
                <form class="w-full" wire:submit='save' wire:confirm='آیا از ثبت اطمینان دارید؟'>

                    <div>
                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="name">
                                    نام فایل
                                </label>
                                <input wire:model='title'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="name" type="text">
                                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="seller_name">
                                    نام مالک
                                </label>
                                <input wire:model='seller_name'
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="seller_name" type="text">
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-6 -mx-3 ">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="seller_phone">
                                    شماره ثابت مالک
                                </label>
                                <input wire:model='seller_phone'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="seller_phone" type="text" placeholder="01154000000">
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="seller_mobile">
                                    شماره همراه مالک
                                </label>
                                <input wire:model='seller_mobile'
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="seller_mobile" type="text" placeholder="0911000000">
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-6 -mx-3 ">
                            <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="notes">
                                    توضیحات
                                </label>
                                <textarea wire:model='notes'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none h-36 focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="notes" type="text"> </textarea>

                            </div>
                        </div>
                        <div class="flex flex-wrap mb-2 -mx-3 ">

                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="city">
                                    شهر
                                </label>
                                <div class="relative">
                                    <select wire:model='city_id'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="city">
                                        @foreach ($cityAreas as $cityArea)
                                        <option value="{{$cityArea->id}}">{{$cityArea->name}}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="assetType">
                                    نوع ملک
                                </label>
                                <div class="relative">
                                    <select wire:model='assetType' wire:change='updateBuildingType()'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="assetType">
                                        <option value="0">زمین</option>
                                        <option value="1">خانه</option>
                                        <option value="2">ویلا</option>
                                        <option value="3">تجاری</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>

                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="dealType">
                                    نوع معامله
                                </label>
                                <div class="relative">
                                    <select wire:model='dealType' wire:change='$refresh'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="dealType">
                                        <option value="0">فروش</option>
                                        @if ($assetType!=0)
                                        <option value="1">پروژه</option>
                                        @endif
                                        <option value="2">اجاره</option>
                                        <option value="3">رهن</option>

                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 md:w-1/2">
                                </p>
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="price_public">
                                    قیمت عمومی
                                    @if ($dealType==3)
                                    <span class="font-light">
                                        (رهن سالانه)
                                    </span>
                                    @endif
                                    @if ($dealType==2)
                                    <span class="font-light">
                                        (پول پیش)
                                    </span>
                                    @endif
                                </label>
                                <input wire:model='price_public' wire:change='$refresh'
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="price_public" type="text">
                                <p class="text-xs italic ">معادل {{ number_format((int)$price_public, 0, ".","،") }}
                                    تومانءء
                                </p>

                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="price_private">
                                    قیمت پنهان
                                </label>
                                <input wire:model='price_private' wire:change='$refresh'
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="price_private" type="text">
                                <p class="text-xs italic ">معادل {{ number_format((int)$price_private, 0, ".","،") }}
                                    تومانءء
                                </p>


                            </div>

                            <div class="w-full px-3 md:w-1/2
                             @if ($dealType!=2)
                                hidden
                            @endif">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="rent">
                                    اجاره </label>
                                <input wire:model='rent'
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="rent" type="text">
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                </p>
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="price_per_meter">
                                    قیمت هر متر
                                </label>
                                <input wire:model='price_per_meter' wire:change='$refresh'
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="price_per_meter" type="text">
                                <p class="text-xs italic ">معادل {{ number_format((int)$price_per_meter, 0, ".","،") }}
                                    تومانءء
                                </p>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="area">
                                    مساحت
                                </label>
                                <input wire:model='area'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="area" type="text">
                                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
                            </div>
                            <div class="w-full px-3 md:w-1/3">
                                <label class="block mb-2 text-xs font-bold tracking-wide  uppercase 
                                @if ($assetType==0)
                                    text-gray-500
                                @endif" for="space">
                                    زیربنا </label>
                                <input wire:model='space'
                                    class="
                                    @if ($assetType==0)
                                    cursor-not-allowed
                                @endif
                                    block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="space" type="text" @if ($assetType==0) disabled @endif>
                            </div>
                            <div class="w-full px-3 md:w-1/3" hidden>
                                <label class="block mb-2 text-xs font-bold tracking-wide uppercase ""
                                 for='map'>
                                    مختصات </label>
                                <input wire:model='map'
                                    class=" block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border
                                    border-gray-200 rounded appearance-none focus:outline-none focus:bg-white
                                    focus:border-gray-500" id="map" type="text">
                                    <p class="text-xs italic text-blue-400"><a
                                            href="https://neshan.org/maps/#c36.822-50.873-13z-0p" target="_blank"
                                            rel="noopener noreferrer">بازکردن نقشه</a></p>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="buildingType">
                                    نوع
                                    @if ($assetType==0)
                                    زمین
                                    @else
                                    ساختمان
                                    @endif </label>
                                <div class="relative">
                                    <select wire:model='buildingType'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="buildingType">
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
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>


                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="floor">
                                    طبقه
                                </label>
                                <input wire:model='floor'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="floor" type="text">
                                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="floors">
                                    طبقات
                                </label>
                                <input wire:model='floors'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="floor" type="text">
                                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="direction">
                                    جهت ساختمان </label>
                                <div class="relative">
                                    <select wire:model='direction'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="direction">
                                        <option value="0">پنهان</option>
                                        <option value="1">شمال</option>
                                        <option value="2">شرق</option>
                                        <option value="3">جنوب</option>
                                        <option value="4">غرب</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>


                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="beds">
                                    تعداد اتاق خواب
                                </label>
                                <input wire:model='beds'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="beds" type="text">
                                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="wcs">
                                    تعداد سرویس بهداشتی
                                </label>
                                <input wire:model='wcs'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="wcs" type="text">
                                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="cooks">
                                    تعداد آشپزخانه
                                </label>
                                <input wire:model='cooks'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="cooks" type="text">
                                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="parking">
                                    پارکینگ
                                </label>
                                <input wire:model='parking'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="parking" type="text">
                                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="direction">
                                    سرمایش </label>
                                <div class="relative">
                                    <select wire:model='cooling'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="direction">
                                        @foreach (config('cooling') as $key => $cooling_val)
                                        <option value="{{$key}}">{{$cooling_val}}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="heating">
                                    گرمایش </label>
                                <div class="relative">
                                    <select wire:model='heating'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="heating">
                                        @foreach (config('heating') as $key => $heating_val)
                                        <option value="{{$key}}">{{$heating_val}}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="water">
                                    آب </label>
                                <div class="relative">
                                    <select wire:model='water'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="water">
                                        @foreach (config('water') as $key => $water)
                                        <option value="{{$key}}">{{$water}}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="elec">
                                    برق </label>
                                <div class="relative">
                                    <select wire:model='elec'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="elec">
                                        @foreach (config('elec') as $key => $elec_var)
                                        <option value="{{$key}}">{{$elec_var}}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="gas">
                                    گاز </label>
                                <div class="relative">
                                    <select wire:model='gas'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="gas">
                                        <option value="0">ندارد</option>
                                        <option value="1">دارد</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="landline">
                                    تلفن </label>
                                <div class="relative">
                                    <select wire:model='landline'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="landline">
                                        @foreach (config('landline') as $key => $landline_var )
                                        <option value="{{$key}}">{{$landline_var }}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="elevator">
                                    آسانسور </label>
                                <div class="relative">
                                    <select wire:model='elevator'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="elevator">
                                        <option value="0">ندارد</option>
                                        <option value="1">دارد</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="storage">
                                    انبار </label>
                                <div class="relative">
                                    <select wire:model='storage'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="storage">
                                        <option value="0">ندارد</option>
                                        <option value="1">دارد</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>

                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="fileType">
                                    وضعیت فایل </label>
                                <div class="relative">
                                    <select wire:model='fileType'
                                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="fileType">
                                        <option value="0">ذخیره شخصی</option>
                                        <option value="1">آماده معامله</option>
                                        <option value="2">معامله شده</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>
                            </div>
                            <div class="px-3">
                                <p>امکانات:</p>
                                <div class="flex flex-wrap w-full gap-2">
                                    @foreach ($facilities as $key => $facilitie)
                                    <div class="flex items-center mb-1">
                                        <input id="facilities-{{$key}}" type="checkbox" value="{{$key}}"
                                            wire:model='facilities_list' class="public-search__btn-radio ">
                                        <label for="facilities-{{$key}}"
                                            class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">{{$facilitie}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>



                    </div>

                    @if ($photos)
                    <button type="submit"
                        class="w-full px-4 py-2 font-bold text-white transition-colors bg-blue-500 rounded hover:bg-blue-400">ثبت</button>
                    @endif
                </form>

                <form wire:submit='uploadImage' class="flex flex-col items-center justify-center w-full gap-4 ">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">برای
                                    آپلود کلیک کنید</span> یا فایل را در اینجا بکشید</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">WEBP, PNG, JPG (بیشترین حجم: ۲ مگابایت)
                            </p>
                            <div wire:loading wire:target="file">درحال آپلود...</div>
                        </div>
                        <input wire:model='file' id="dropzone-file" type="file" class="hidden" />
                    </label>
                    @if ($file)
                    <div
                        class="flex flex-row justify-between w-full h-64 gap-4 p-2 border-2 border-gray-300 border-dashed rounded">
                        <div class="">
                            <img src="{{$file->temporaryUrl()}}" class="w-full h-full rounded"
                                alt="temporary image for preview">
                        </div>
                        <div class="flex flex-col items-center justify-center w-1/2 gap-4 p-4">
                            <p class="text-center">لطفا عکس رو تایید کنید.</p>
                            <button type="submit"
                                class="flex items-center justify-center w-full h-12 gap-4 px-4 py-2 text-white bg-blue-500 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708z" />
                                    <path
                                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                </svg>
                                <div>آپلود</div>
                            </button>
                            <button type="button" wire:click='deleteFile' wire:confirm='Are You sure?'
                                class="flex items-center justify-center w-full h-12 gap-4 px-4 py-2 text-white bg-red-500 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                                <div>حذف</div>
                            </button>

                        </div>
                    </div>
                    @endif
                    @if ($photos)
                    <!-- Photo Items -->
                    <div
                        class="flex items-center flex-1 w-full gap-2 px-2 overflow-x-auto border-2 border-gray-300 border-dashed rounded-md outline-none h-36 max-h-36">
                        <!-- Photo Item -->

                        @foreach ($photos as $key=> $photo)

                        <div class="relative flex-shrink-0 w-28 h-28   border-dashed rounded  bg-no-repeat bg-contain bg-center 
                        @if ($key===0)
                        border-green-400 border-4
                        @else
                        border-gray-400 border-2
                        @endif
                        " wire:key='{{$key}}' wire:click='setAsPrimary({{$key}})'
                            style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$photo}}')">
                            <!-- Photo Item DELETE -->
                            <div wire:click='deleteImage({{$key}})' wire:confirm='Are You sure?'
                                class="absolute flex items-center justify-center p-1 text-white transition-colors bg-red-600 border-2 border-red-600 border-dashed rounded-full cursor-pointer h-7 w-7 hover:bg-white hover:text-red-600 top-1 right-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg>
                            </div>
                            <!-- Photo Item IMAGE! -->
                        </div>
                        @endforeach
                    </div>
                    @endif


                </form>


            </div>
        </div>
    </div>

</div>