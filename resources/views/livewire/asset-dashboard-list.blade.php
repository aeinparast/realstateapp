<div class="w-full">
    <div class="">
        <div class="flex flex-wrap mb-6 -mx-3">
            <div class="w-full px-3 mb-6 md:w-1/5 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="name">
                    نام فایل
                </label>
                <input wire:model='title' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="name" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="seller_name">
                    نام مالک
                </label>
                <input wire:model='seller_name' wire:change='$refresh'
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    id="seller_name" type="text">
            </div>
            <div class="w-full px-3 mb-6 md:w-1/5 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="seller_mobile">
                    همراه مالک
                </label>
                <input wire:model='seller_mobile' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="seller_mobile" type="text">
            </div>
            <div class="w-full px-3 md:w-1/5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="seller_phone">
                    تلفن ثابت مالک
                </label>
                <input wire:model='seller_phone' wire:change='$refresh'
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    id="seller_phone" type="text">
            </div>
            <div class="w-full px-3 mb-6 md:w-1/5 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="city">
                    شهر
                </label>
                <div class="relative">
                    <select wire:model='city_id' wire:change='$refresh'
                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        id="city">
                        <option value="">همه موارد</option>
                        @foreach ($cityAreas as $cityArea)
                        <option value="{{$cityArea->id}}">{{$cityArea->name}}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                    </div>
                </div>
            </div>
            <div class="w-full px-3 mb-6 md:w-1/5 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="assetType">
                    نوع ملک
                </label>
                <div class="relative">
                    <select wire:model='assetType' wire:change='$refresh'
                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        id="assetType">
                        <option value="">همه موارد</option>
                        <option value="0">زمین</option>
                        <option value="1">خانه</option>
                        <option value="2">ویلا</option>
                        <option value="3">تجاری</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                    </div>
                </div>
            </div>
            <div class="w-full px-3 mb-6 md:w-1/5 md:mb-0 md:col-start-1">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="buildingType">
                    نوع
                    @if ($assetType==0)
                    زمین
                    @else
                    ساختمان
                    @endif </label>
                <div class="relative">
                    <select wire:model='buildingType' wire:change='$refresh'
                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        id="buildingType">
                        <option value="">همه موارد</option>
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
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                    </div>
                </div>
            </div>
            <div class="w-full px-3 mb-6 md:w-1/5 md:mb-0 md:col-start-1">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="dealType">
                    نوع معامله
                </label>
                <div class="relative">
                    <select wire:model='dealType' wire:change='$refresh'
                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        id="dealType">
                        <option value="">همه موارد</option>
                        <option value="0">فروش</option>
                        <option value="1">پروژه</option>
                        <option value="2">اجاره</option>
                        <option value="3">رهن</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                    </div>
                </div>
            </div>

            <div class="w-full px-3 mb-6 md:w-1/5 md:mb-0 md:col-start-1">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="fileType">
                    وضعیت فایل </label>
                <div class="relative">
                    <select wire:model='fileType' wire:change='$refresh'
                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        id="fileType">
                        <option value="">همه موارد</option>
                        <option value="0">ذخیره شخصی</option>
                        <option value="1">آماده معامله</option>
                        <option value="2">معامله شده</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                    </div>
                </div>
            </div>
            <div class="w-full px-3 mb-6 md:w-1/5 md:mb-0 md:col-start-1">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="public">
                    وضعیت نمایش </label>
                <div class="relative">
                    <select wire:model='public' wire:change='$refresh'
                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        id="public">
                        <option value="">همه موارد</option>
                        <option value="0">خصوصی</option>
                        <option value="1">عمومی</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                    </div>
                </div>
            </div>
            <div class="w-full px-3 mb-6 md:w-1/4 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="name">
                    کف قیمت
                </label>
                <input wire:model='price_min' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="price_min" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
            <div class="w-full px-3 mb-6 md:w-1/4 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="name">
                    سقف قیمت
                </label>
                <input wire:model='price_max' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="price_max" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
            @if ($dealType==2)
            <div class="w-full px-3 mb-6 md:w-1/4 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="rent_min">
                    کف اجاره
                </label>
                <input wire:model='rent_min' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="rent_min" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
            <div class="w-full px-3 mb-6 md:w-1/4 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="rent_max">
                    سقف اجاره
                </label>
                <input wire:model='rent_max' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="rent_max" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
            @endif
            <div class="w-full px-3 mb-6 md:w-1/6 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="area">
                    مساحت
                </label>
                <input wire:model='area' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="area" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
            <div class="w-full px-3 mb-6 md:w-1/6 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="space">
                    زیربنا
                </label>
                <input wire:model='space' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="space" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
            <div class="w-full px-3 mb-6 md:w-1/6 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="beds">
                    اتاق خواب
                </label>
                <input wire:model='beds' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="beds" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
            <div class="w-full px-3 mb-6 md:w-1/6 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="wcs">
                    سرویس بهداشتی
                </label>
                <input wire:model='wcs' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="wcs" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
            <div class="w-full px-3 mb-6 md:w-1/6 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="parking">
                    پارکینگ
                </label>
                <input wire:model='parking' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="parking" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
            <div class="w-full px-3 mb-6 md:w-1/5 md:mb-0 md:col-start-1">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="storage">
                    انبار </label>
                <div class="relative">
                    <select wire:model='storage' wire:change='$refresh'
                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        id="storage">
                        <option value="">همه موارد</option>
                        <option value="0">ندارد</option>
                        <option value="1">دارد</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                    </div>
                </div>
            </div>
            <div class="w-full px-3 mb-6 md:w-1/5 md:mb-0 md:col-start-1">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="elevator">
                    آسانسور </label>
                <div class="relative">
                    <select wire:model='elevator' wire:change='$refresh'
                        class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        id="elevator">
                        <option value="">همه موارد</option>
                        <option value="0">ندارد</option>
                        <option value="1">دارد</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                    </div>
                </div>
            </div>
            <div class="w-full px-3 mb-6 md:w-1/6 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="cooks">
                    آشپرخانه
                </label>
                <input wire:model='cooks' wire:change='$refresh'
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                    id="cooks" type="text">
                {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
            </div>
        </div>
    </div>
    <div class="flex flex-col justify-center w-full gap-2">
        @foreach ($assets as $asset)
        <div wire:key="{{ $asset['key']}}"
            class="flex flex-col sm:flex-row items-center sm:items-stretch sm:justify-between gap-2 px-2 py-4 transition-transform border-2 rounded border-mahdavi hover:border-dashed hover:scale-95">
            <div class="flex gap-2 flex-col sm:flex-row items-center sm:items-stretch">
                @php
                $img= explode("*", $asset['img'])[0];
                @endphp
                <div class="w-20 h-20 bg-center bg-no-repeat bg-cover rounded"
                    style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$img}}'">
                </div>
                <div class="flex flex-col justify-between">
                    <div class="">{{ $asset['title'] }} -
                        @switch($asset['fileType'])
                        @case(0)
                        <span class="px-2 text-xs text-white bg-blue-500 rounded-md">ذخیره شخصی</span>
                    </div>
                    @break
                    @case(1)
                    <span class="px-2 text-xs text-white bg-green-400 rounded-md">آماده معامله</span>
                </div>
                @break
                @case(2)
                <span class="px-2 text-xs text-white rounded-md bg-mahdavi">معامله شده</span>
            </div>
            @break
            @default
            <span class="px-2 text-xs text-white bg-gray-400 rounded-md">نامشخص</span>
        </div>
        @endswitch
        <div class="text-sm">{{ $asset['seller_name'] }} - <a
                href="tel:{{$asset['seller_phone']}}">{{$asset['seller_phone']}}</a>-
            <a href="tel:{{$asset['seller_mobile']}}">{{$asset['seller_mobile']}}</a>
        </div>
        <div class="flex gap-2 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-geo-alt-fill text-mahdavi" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>{{$asset->city->name}} - {{$asset['created_at']->locale('fa')->diffForHumans()}}
        </div>
    </div>
</div>
<div class="flex flex-col justify-between ">
    <a href="" class="text-sm text-white ">
        <button wire:click.prevent='publish({{$asset->id}})' class="w-full px-2 bg-green-500 rounded">
            @if ($asset->isPublic==0)
            عمومی سازی
            @else
            خصوصی سازی
            @endif
        </button>
    </a>
    <a href="{{route('asset-update',$asset->id)}}" class="text-sm text-white ">
        <button class="w-full px-2 bg-yellow-500 rounded">ویرایش</button>
    </a>
    <a href="/view?id={{$asset['id']}}" target="__blank" class="text-sm text-white ">
        <button class="w-full px-2 bg-blue-500 rounded">لینک عمومی</button>
    </a>
</div>
</div>
@endforeach
</div>
{{$assets->links()}}
</div>