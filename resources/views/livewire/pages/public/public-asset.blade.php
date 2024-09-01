<div class="grid min-h-screen grid-cols-1 gap-4 md:grid-cols-4 xl:grid-cols-6 pt-4">
    <div class="flex flex-col gap-4 px-4 md:col-start-1 md:col-span-2 xl:col-start-2">
        <!-- Left Column Content -->
        <div class="flex flex-col gap-2">
            <h1 class="text-xl font-medium">{{$asset['title']}}</h1>
            <div class="flex gap-2 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-geo-alt-fill text-mahdavi" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>{{config('cityAreas')[$asset['city']]}}
            </div>
        </div>

        <div class="flex flex-col">
            <!-- Pricing Information -->

            <div class="flex items-center justify-between py-2 border-b">
                <div class="text-gray-600">
                    @if ($asset['dealType'] != 2)
                    قیمت
                    @else
                    پول پیش
                    @endif
                </div>
                @if ($asset['price_public'] != 0)
                <div class="">{{ number_format($asset['price_public'], 0, ".", "،") }} تومان</div>
                @else
                <div class="">تماس بگیرید</div>
                @endif
            </div>

            @if ($asset['dealType'] == 2)
            <div class="flex items-center justify-between py-2 border-b">
                <div class="text-gray-600">اجاره</div>
                <div class="">{{ $asset['floor'] }}</div>
            </div>
            @endif

            @if ($asset['dealType'] != 2)
            <div class="flex items-center justify-between py-2 border-b">
                <div class="text-gray-600">قیمت هر متر</div>
                @if ($asset['price_public'] != 0)
                <div class="">{{ number_format($asset['price_public']/$asset['area'], 0, ".", "،") }} تومان
                </div>
                @else
                <div class="">تماس بگیرید</div>
                @endif
            </div>
            @endif

            <div class="flex items-center justify-between py-2 border-b">
                <div class="text-gray-600">متراژ</div>
                <div class="">{{ $asset['area'] }} متر</div>
            </div>
            @if ($asset['assetType']!=0)
            <div class="flex items-center justify-between py-2 border-b">
                <div class="text-gray-600">زیربنا</div>
                <div class="">{{ $asset['space'] }} متر</div>
            </div>
            @endif


            @if (in_array($asset->assetType, [3, 4, 8, 9, 11]))
            <div class="flex items-center justify-between py-2 border-b">
                <div class="text-gray-600">طبقه</div>
                <div class="">{{ $asset['floor'] }}</div>
            </div>
            @endif
        </div>

        <!-- Seller Information -->
        <div class="flex justify-center gap-4 px-2 py-2 border rounded-md border-mahdavi">
            @if ($pfp==null || $pfp=='')
            <div class="w-20 h-20  rounded-full bg-contain bg-center bg-no-repeat"
                style="background-image: url('/img/logo.webp');"></div>
            @else
            <div class="w-20 h-20  rounded-full bg-contain bg-center bg-no-repeat"
                style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$pfp}}');"></div>
            @endif
            <div class="flex flex-col">
                <div class="text-sm text-gray-600">مشاور:</div>
                <div class="">{{ $asset->user->name }}</div>
                <button x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="py-1 mt-2 text-center text-white transition-opacity transition-transform rounded bg-mahdavi hover:opacity-90 hover:scale-105">تماس
                    </ذ>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="flex flex-col gap-2">
            <div class="">توضیحات:</div>
            <p class="">{!! nl2br($asset['notes']) !!}</p>
        </div>

        <!-- Facilities -->
        <div>

            <div class="flex flex-col gap-2 p-2 text-mahdavi ">
                @if ($asset['elevator']==1)
                <div class="public-asset__facility--main">
                    <svg fill="currentColor" width="24px" height="24px" viewBox="0 0 8 8"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 0l-3 3h6l-3-3zm-3 5l3 3 3-3h-6z" transform="translate(1)" />
                    </svg>
                    <p class="text-sm font-bold">آسانسور</p>
                </div>
                @endif
                @if ($asset['storage']==1)
                <div class="public-asset__facility--main">
                    <svg fill=" currentColor" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                        viewBox="0 0 169.676 169.676" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M80.668,53.92c-4.303,0-7.336,0.383-8.981,0.758V83.26c2.027,0.63,4.427,0.758,7.591,0.758
			c11.633,0,18.713-5.815,18.713-15.679C97.99,58.852,91.409,53.92,80.668,53.92z" />
                                <path d="M84.841,0.002C37.99,0.002,0,37.982,0,84.835c0,46.854,37.99,84.839,84.841,84.839c46.846,0,84.835-37.985,84.835-84.839
			C169.676,37.987,131.687,0.002,84.841,0.002z M106.204,86.921c-6.314,6.198-15.924,9.236-26.927,9.236
			c-2.912,0-5.444-0.126-7.591-0.63v32.25H56.255V43.674c5.693-1.013,13.406-1.773,23.786-1.773c11.369,0,19.592,2.403,25.034,6.954
			c5.05,4.177,8.345,10.876,8.345,18.843C113.424,75.793,110.89,82.376,106.204,86.921z" />
                            </g>
                        </g>
                    </svg>
                    <p class="text-sm font-bold">پارکینگ</p>
                </div>
                @endif
                @if ($asset['parking']==1)
                <div class="public-asset__facility--main">
                    <svg width="24px" height="24px" fill="currentColor" viewBox="0 0 1000 1000" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        enable-background="new 0 0 1000 1000" xml:space="preserve">
                        <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                        <g>

                            <g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)">

                                <path
                                    d="M1852.4,4979.1c-60.4-16.1-155-54.3-211.3-84.5c-130.8-68.4-350.2-285.8-418.6-418.6c-124.8-231.4-116.7,42.3-116.7-4365.3c0-4393.4-6-4125.8,112.7-4363.3c68.4-134.8,289.8-356.2,424.7-424.7c235.5-118.7,64.4-112.7,3357-112.7c3292.5,0,3121.5-6,3357,112.7c134.8,68.4,356.2,289.8,424.7,424.7c118.7,237.5,112.7-30.2,112.7,4363.3c0,4393.4,6,4125.8-112.7,4363.3c-68.4,134.8-289.8,356.2-424.7,424.7c-235.5,118.7-62.4,112.7-3367,110.7C2409.8,5009.3,1945,5005.2,1852.4,4979.1z M8127.6,4371.3c38.2-18.1,88.5-60.4,110.7-90.6c42.3-56.4,42.3-80.5,48.3-1203.5l4-1145.2H5000H1709.5l4,1145.2c6,1123,6,1147.2,48.3,1203.5c22.1,30.2,72.5,72.4,110.7,90.6c64.4,34.2,255.6,36.2,3127.5,36.2C7872,4407.5,8063.2,4405.5,8127.6,4371.3z M8290.6,120.7v-1207.5H5000H1709.5V120.7v1207.5H5000h3290.5V120.7z M8286.5-2845.8c-6-1133.1-6-1157.2-48.3-1213.6c-22.1-30.2-72.5-72.4-110.7-90.6c-64.4-34.2-255.6-36.2-3127.5-36.2c-2871.9,0-3063.1,2-3127.5,36.2c-38.2,18.1-88.6,60.4-110.7,90.6c-42.3,56.3-42.3,80.5-48.3,1213.6l-4,1155.2H5000h3290.5L8286.5-2845.8z" />

                                <path d="M4607.6,3652.8v-392.5H5000h392.4v392.5v392.5H5000h-392.5V3652.8z" />

                                <path d="M3923.3,2676.7v-301.9H5000h1076.7v301.9v301.9H5000H3923.3V2676.7z" />

                                <path d="M4607.6,543.4V161H5000h392.4v382.4v382.4H5000h-392.5V543.4z" />

                                <path d="M3923.3-442.8v-301.9H5000h1076.7v301.9v301.9H5000H3923.3V-442.8z" />

                                <path d="M4607.6-2465.4v-392.5H5000h392.4v392.5v392.5H5000h-392.5V-2465.4z" />

                                <path d="M3923.3-3441.5v-301.9H5000h1076.7v301.9v301.9H5000H3923.3V-3441.5z" />

                            </g>

                        </g>
                    </svg>
                    <p class="text-sm font-bold">انبار</p>
                </div>
                @endif
                <div class="grid grid-cols-2 gap-2">
                    @if ($asset['water']!=0)
                    <div class="public-asset__facility--main">
                        <i class="bi bi-droplet"></i>
                        <p class="text-sm font-bold">{{config('water')[$asset['water']]}}</p>
                    </div>
                    @endif
                    @if ($asset['elec']!=0)
                    <div class="public-asset__facility--main">
                        <i class="bi bi-lightning-charge"></i>
                        <p class="text-sm font-bold">برق {{config('elec')[$asset['elec']]}}</p>
                    </div>
                    @endif
                    @if ($asset['gas']!=0)
                    <div class="public-asset__facility--main">
                        <i class="bi bi-fire"></i>
                        <p class="text-sm font-bold">گاز</p>
                    </div>
                    @endif
                    @if ($asset['landline']!=0)
                    <div class="public-asset__facility--main">
                        <i class="bi bi-telephone-fill"></i>
                        <p class="text-sm font-bold">تلفن {{config('landline')[$asset['landline']]}}</p>
                    </div>
                    @endif
                    @if ($asset['heating']!=0)
                    <div class="public-asset__facility--main">
                        <i class="bi bi-thermometer-sun"></i>
                        <p class="text-sm font-bold">{{config('heating')[$asset['heating']]}}</p>
                    </div>
                    @endif
                    @if ($asset['cooling']==1)
                    <div class="public-asset__facility--main">
                        <i class="bi bi-thermometer-snow"></i>
                        <p class="text-sm font-bold">{{config('cooling')[$asset['cooling']]}}</p>
                    </div>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap gap-1 mt-2">
                @foreach ($facilities_list as $facilitie)
                <div class="px-2 font-bold border-2 rounded-full border-mahdavi hover:border-dashed text-mahdavi">
                    {{ $facilities[$facilitie] }}
                </div>
                @endforeach
            </div>
        </div>
        <div class="block row-start-2 overflow-hidden rounded md:col-start-3 md:hidden" id="map">
            <iframe width="100%" height="200" src="https://map.ir/lat/35.724747/lng/51.421002/z/16/p/ملک"></iframe>
        </div>
    </div>

    <!-- Right Column Content -->
    <div class="flex flex-col row-start-1 md:col-start-3 md:col-span-2 xl:col-start-4" id="right-col">
        <div id="slide" class="">
            <div class="w-full" dir="ltr">
                <section id="main-carousel" class="rounded splide" aria-label="My Awesome Gallery">
                    <div class="splide__track">
                        <ul class="h-64 splide__list">
                            @foreach (explode("*", $asset['img']) as $img)
                            <picture class="w-full min-w-full splide__slide max-h-80">
                                <img src="https://mahdavi.storage.iran.liara.space/{{ $img }}" alt=""
                                    class="object-contain max-w-full mx-auto rounded max-h-80">
                            </picture>
                            @endforeach
                        </ul>
                    </div>
                </section>

                <ul id="thumbnails" class="hidden grid-cols-5 gap-2 mt-2 md:grid">
                    @foreach (explode("*", $asset['img']) as $img)
                    <li class="bg-center bg-no-repeat bg-contain thumbnail max-h-16 max-w-16 min-h-16 min-w-16"
                        style="background-image: url('https://mahdavi.storage.iran.liara.space/{{ $img }}')">
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="hidden row-start-2 overflow-hidden rounded md:col-start-3 md:block" id="map">
            <iframe width="100%" height="200" src="https://map.ir/lat/35.724747/lng/51.421002/z/16/p/ملک"></iframe>
        </div>
    </div>
    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                تماس با مشاور
            </h2>

            <div class="flex justify-center gap-4 px-2 py-2 border rounded-md border-mahdavi">
                @if ($pfp==null || $pfp=='')
                <div class="w-20 h-20  rounded-full bg-contain bg-center bg-no-repeat"
                    style="background-image: url('/img/logo.webp');"></div>
                @else
                <div class="w-20 h-20  rounded-full bg-contain bg-center bg-no-repeat"
                    style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$pfp}}');"></div>
                @endif
                <div class="flex flex-col">
                    <div class="text-sm text-gray-600">مشاور:</div>
                    <div class="">{{ $asset->user->name }}</div>
                    <div class="text-sm text-gray-600">تلفن:</div>
                    <a href="tel:{{ $asset->user->phone }}" class="border-b-2 border-mahdavi">{{ $asset->user->phone
                        }}</a>
                    <div class="text-sm text-gray-600">همراه:</div>
                    <a href="tel:{{ $asset->user->mobile }}" class="border-b-2 border-mahdavi">{{ $asset->user->mobile
                        }}</a>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    <div class="!font-sans">بازگشت</div>
                </x-secondary-button>
            </div>
        </form>
    </x-modal>
</div>