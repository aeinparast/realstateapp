<div class="grid min-h-screen grid-cols-1 gap-4 pt-4 md:grid-cols-4 xl:grid-cols-6">
    <div class="flex flex-col gap-4 px-4 md:col-start-1 md:col-span-2 xl:col-start-2">
        <!-- Left Column Content -->
        <div class="flex flex-col gap-2">
            <div class=""></div>
            <h1 class="text-xl font-medium">{{$asset['title']}}</h1>
            <div class="flex gap-2 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-geo-alt-fill text-mahdavi" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg><a href="/amlak?city={{$asset->city_id}}">{{$asset->city->name}}</a> -
                {{$asset['created_at']->locale('fa')->diffForHumans()}}
            </div>
        </div>

        <div class="flex flex-col">
            <!-- Pricing Information -->
            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">کد ملک</div>
                <div class="">{{ $asset['id'] }}</div>
            </div>
            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">
                    معامله
                </div>
                <a href="/amlak?dt={{$asset['dealType']}}"
                    target="_blank">{{config('dealType')[$asset['dealType']]}}</a>
            </div>

            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">
                    نوع‌ملک
                </div>
                {{config('assetType')[$asset['assetType']][$asset['buildingType']]}}
            </div>

            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">
                    @if ($asset['dealType'] == 2 )
                    پول پیش
                    @elseif ($asset['dealType']==3)
                    رهن
                    @elseif ($asset['dealType']==1)
                    پیش‌ فروش
                    @else
                    قیمت
                    @endif
                </div>
                @if ($asset['price_public'] != 0)
                <div class="">{{ number_format($asset['price_public'], 0, ".", "،") }} تومان</div>
                @else
                <div class="">تماس بگیرید</div>
                @endif
            </div>

            @if ($asset['dealType'] == 2)
            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">اجاره</div>
                <div class="">{{ number_format($asset['rent'], 0, ".", "،") }} تومان</div>
            </div>
            @endif

            @if ($asset['price_per_meter'] != 0 && $asset['dealType'] != 2)
            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">قیمت هر متر</div>
                @if ($asset['price_public'] != 0)
                <div class="">{{ number_format($asset['price_per_meter'], 0, ".", "،") }} تومان
                </div>
                @else
                <div class="">تماس بگیرید</div>
                @endif
            </div>
            @endif
            @if ($asset['assetType']!=0)
            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">زیربنا</div>
                <div class="">{{ $asset['space'] }} متر</div>
            </div>
            @endif
            @if ($asset['area']!=0)
            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">متراژ</div>
                <div class="">{{ $asset['area'] }} متر</div>
            </div>
            @endif

            @if ($asset['beds']!=0)
            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">تعداد اتاق‌خواب</div>
                <div class="">{{ $asset['beds'] }} عدد</div>
            </div>
            @endif
            @if (in_array($asset->assetType, [3, 4, 8, 9, 11]))
            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">طبقه</div>
                <div class="">{{ $asset['floor'] }}
                    @if ($asset['floors']>0)
                    از
                    {{$asset['floors']}}
                    @endif

                </div>

            </div>
            @endif
            @if ($asset['wcs']!=0)
            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">سرویس بهداشتی</div>
                <div class="">{{ $asset['wcs'] }} عدد</div>
            </div>
            @endif
            @if ($asset['direction']!=0)
            <div class="flex items-center justify-between py-2 border-b list_item">
                <div class="text-gray-600">جهت</div>
                <div class="">
                    @switch($asset['direction'])
                    @case(1)
                    شمال
                    @break
                    @case(2)
                    شرق
                    @break
                    @case(3)
                    جنوب
                    @break
                    @default
                    غرب
                    @endswitch

                </div>
            </div>
            @endif
        </div>

        <!-- Seller Information -->
        <div class="flex justify-center gap-4 px-2 py-2 border rounded-md border-mahdavi list_item">
            @if ($pfp==null || $pfp=='')
            <div class="w-20 h-20 bg-center bg-no-repeat bg-contain rounded-full"
                style="background-image: url('/img/logo.webp');"></div>
            @else
            <div class="w-20 h-20 bg-center bg-no-repeat bg-contain rounded-full"
                style="background-image: url('{{ env('BUCKET_FULL_URL').'/'.$pfp }}');"></div>
            @endif
            <div class="flex flex-col">
                <div class="text-sm text-gray-600">مشاور:</div>
                <div class="">{{ $asset->user->name }}</div>
                <button x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="py-1 mt-2 text-center text-white transition-all rounded bg-mahdavi hover:opacity-90 hover:scale-105">تماس
                </button>
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
                @if ($asset['parking']!=0)
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
                @if ($asset['storage']==1)
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
                @if ($asset['cooks']!=0)
                <div class="public-asset__facility--main">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                        xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" id="Capa_1"
                        viewBox="0 0 511 511" xml:space="preserve">
                        <g>
                            <path
                                d="M391.5,0c-4.142,0-7.5,3.358-7.5,7.5v120c0,4.687-3.813,8.5-8.5,8.5s-8.5-3.813-8.5-8.5V7.5c0-4.142-3.358-7.5-7.5-7.5   S352,3.358,352,7.5v120c0,4.687-3.813,8.5-8.5,8.5s-8.5-3.813-8.5-8.5V7.5c0-4.142-3.358-7.5-7.5-7.5S320,3.358,320,7.5v120   c0,4.687-3.813,8.5-8.5,8.5s-8.5-3.813-8.5-8.5V7.5c0-4.142-3.358-7.5-7.5-7.5S288,3.358,288,7.5v160   c0,12.958,10.542,23.5,23.5,23.5c4.687,0,8.5,3.813,8.5,8.5v73.409c-13.759,3.374-24,15.806-24,30.591v160   c0,26.191,21.309,47.5,47.5,47.5s47.5-21.309,47.5-47.5v-160c0-14.785-10.241-27.216-24-30.591V199.5c0-4.687,3.813-8.5,8.5-8.5   c12.958,0,23.5-10.542,23.5-23.5V7.5C399,3.358,395.642,0,391.5,0z M376,303.5v160c0,17.92-14.58,32.5-32.5,32.5   S311,481.42,311,463.5v-160c0-9.098,7.402-16.5,16.5-16.5h32C368.598,287,376,294.402,376,303.5z M375.5,176   c-12.958,0-23.5,10.542-23.5,23.5V272h-17v-72.5c0-12.958-10.542-23.5-23.5-23.5c-4.687,0-8.5-3.813-8.5-8.5v-18.097   c2.638,1.027,5.503,1.597,8.5,1.597c6.177,0,11.801-2.399,16-6.31c4.199,3.911,9.823,6.31,16,6.31s11.801-2.399,16-6.31   c4.199,3.911,9.823,6.31,16,6.31c2.997,0,5.862-0.57,8.5-1.597V167.5C384,172.187,380.187,176,375.5,176z" />
                            <path
                                d="M183.5,0c-20.479,0-38.826,11.623-51.663,32.728C118.86,54.064,112,84.07,112,119.5c0,25.652,13.894,49.464,36.26,62.144   c7.242,4.105,11.74,12.106,11.74,20.88v70.385c-13.759,3.374-24,15.806-24,30.591v160c0,26.191,21.309,47.5,47.5,47.5   s47.5-21.309,47.5-47.5v-160c0-14.785-10.241-27.216-24-30.591v-70.385c0-8.774,4.499-16.775,11.74-20.88   C241.106,168.964,255,145.152,255,119.5c0-35.43-6.86-65.436-19.837-86.772C222.326,11.623,203.979,0,183.5,0z M216,303.5v160   c0,17.92-14.58,32.5-32.5,32.5S151,481.42,151,463.5v-160c0-9.098,7.402-16.5,16.5-16.5h32C208.598,287,216,294.402,216,303.5z    M211.343,168.595C199.412,175.359,192,188.36,192,202.524V272h-17v-69.476c0-14.164-7.412-27.165-19.342-33.929   C137.981,158.574,127,139.762,127,119.5c0-32.68,6.104-59.99,17.653-78.978C154.809,23.826,168.242,15,183.5,15   s28.691,8.826,38.847,25.522C233.896,59.51,240,86.82,240,119.5C240,139.762,229.019,158.574,211.343,168.595z" />
                            <path
                                d="M191.5,304c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C199,307.358,195.642,304,191.5,304z" />
                            <path
                                d="M191.5,352c-4.142,0-7.5,3.358-7.5,7.5v72c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-72   C199,355.358,195.642,352,191.5,352z" />
                            <path
                                d="M351.5,304c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16   C359,307.358,355.642,304,351.5,304z" />
                            <path
                                d="M351.5,352c-4.142,0-7.5,3.358-7.5,7.5v72c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-72   C359,355.358,355.642,352,351.5,352z" />
                        </g>
                    </svg>
                    <p class="text-sm font-bold">آشپزخانه</p>
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
                    @if ($asset['cooling']!=0)
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
        {{-- <div class="block row-start-2 overflow-hidden rounded md:col-start-3 md:hidden" id="map">

            <iframe width="100%" height="200"
                src="https://map.ir/lat/{{trim($map[0])}}/lng/{{trim($map[1])}}/z/16/p/ملک"></iframe>
        </div> --}}
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
                                <img src="{{ env('BUCKET_FULL_URL').'/'.$img }}" alt=""
                                    class="object-contain max-w-full mx-auto rounded cursor-pointer max-h-80"
                                    data-slide-index="{{ $loop->index }}">
                            </picture>
                            @endforeach
                        </ul>
                    </div>
                </section>

                <ul id="thumbnails" class="grid grid-cols-5 gap-2 mt-2">
                    @foreach (explode("*", $asset['img']) as $index => $img)
                    <li class="bg-center bg-no-repeat bg-contain cursor-pointer thumbnail max-h-16 max-w-16 min-h-16 min-w-16"
                        style="background-image: url('{{ env('BUCKET_FULL_URL').'/'.$img }}')"
                        data-slide-index="{{ $index }}">
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class=" mt-4 overflow-hidden rounded" id="map">

                <iframe width="100%" height="200"
                    src="https://map.ir/lat/{{trim($map[0])}}/lng/{{trim($map[1])}}/z/15/p/ملک"></iframe>
            </div>
        </div>
    </div>
    <div id="fullscreen-modal"
        class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-90">
        <div class="relative flex items-center justify-center w-full h-full max-w-screen-lg">
            <button id="close-modal" class="absolute text-3xl text-white top-2 right-2">&times;</button>
            <img id="fullscreen-image" class="w-auto max-h-full" src="" alt="Fullscreen Image">
            <button id="prev-slide"
                class="absolute left-0 px-4 text-4xl text-white transform -translate-y-1/2 top-1/2">&gt;</button>
            <button id="next-slide"
                class="absolute right-0 px-4 text-4xl text-white transform -translate-y-1/2 top-1/2">&lt;</button>
        </div>
    </div>
    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                تماس با مشاور
            </h2>

            <div
                class="flex flex-col items-center justify-center gap-4 px-2 py-2 text-center border rounded-md sm:flex-row sm:text-right sm:items-start border-mahdavi">
                @if ($pfp==null || $pfp=='')
                <div class="w-20 h-20 bg-center bg-no-repeat bg-contain rounded-full"
                    style="background-image: url('/img/logo.webp');"></div>
                @else
                <div class="w-20 h-20 bg-center bg-no-repeat bg-contain rounded-full"
                    style="background-image: url('{{ env('BUCKET_FULL_URL').'/'.$pfp }}');"></div>
                @endif
                <div class="flex flex-col">
                    <div class="text-sm text-gray-600">مشاور:</div>
                    <a href="/amlak?agent={{ $asset->user->id }}"
                        class="font-medium transition-colors hover:text-mahdavi">{{
                        $asset->user->name }}</a>
                    <div class="text-sm text-gray-600">تلفن:</div>
                    <a href="tel:{{ $asset->user->phone }}" class="border-b-2 border-mahdavi">{{ $asset->user->phone
                        }}</a>
                    <div class="text-sm text-gray-600">همراه:</div>
                    <a href="tel:{{ $asset->user->mobile }}" class="border-b-2 border-mahdavi">{{ $asset->user->mobile
                        }}</a>
                    <div class="flex justify-center gap-2 mt-2 sm:justify-normal">
                        @if ($asset->user->instagram!='')
                        <a href="https://www.instagram.com/{{$asset->user->instagram}}" target="_blank"
                            rel="noopener noreferrer" class="w-6 h-6 transition-transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 102 102">
                                <defs>
                                    <radialGradient id="a" cx="6.601" cy="99.766" r="129.502"
                                        gradientUnits="userSpaceOnUse">
                                        <stop offset=".09" stop-color="#fa8f21" />
                                        <stop offset=".78" stop-color="#d82d7e" />
                                    </radialGradient>
                                    <radialGradient id="b" cx="70.652" cy="96.49" r="113.963"
                                        gradientUnits="userSpaceOnUse">
                                        <stop offset=".64" stop-color="#8c3aaa" stop-opacity="0" />
                                        <stop offset="1" stop-color="#8c3aaa" />
                                    </radialGradient>
                                </defs>
                                <path fill="url(#a)"
                                    d="M25.865 101.639A34.341 34.341 0 0 1 14.312 99.5a19.329 19.329 0 0 1-7.154-4.653A19.181 19.181 0 0 1 2.5 87.694 34.341 34.341 0 0 1 .364 76.142C.061 69.584 0 67.617 0 51s.067-18.577.361-25.14A34.534 34.534 0 0 1 2.5 14.312a19.4 19.4 0 0 1 4.654-7.158A19.206 19.206 0 0 1 14.309 2.5 34.341 34.341 0 0 1 25.862.361C32.422.061 34.392 0 51 0s18.577.067 25.14.361A34.534 34.534 0 0 1 87.691 2.5a19.254 19.254 0 0 1 7.154 4.653 19.267 19.267 0 0 1 4.655 7.156 34.341 34.341 0 0 1 2.14 11.553c.3 6.563.361 8.528.361 25.14s-.061 18.577-.361 25.14a34.5 34.5 0 0 1-2.14 11.552A20.6 20.6 0 0 1 87.691 99.5a34.342 34.342 0 0 1-11.553 2.14c-6.557.3-8.528.361-25.14.361s-18.577-.058-25.134-.361"
                                    data-name="Path 16" />
                                <path fill="url(#b)"
                                    d="M25.865 101.639A34.341 34.341 0 0 1 14.312 99.5a19.329 19.329 0 0 1-7.154-4.653A19.181 19.181 0 0 1 2.5 87.694 34.341 34.341 0 0 1 .364 76.142C.061 69.584 0 67.617 0 51s.067-18.577.361-25.14A34.534 34.534 0 0 1 2.5 14.312a19.4 19.4 0 0 1 4.654-7.158A19.206 19.206 0 0 1 14.309 2.5 34.341 34.341 0 0 1 25.862.361C32.422.061 34.392 0 51 0s18.577.067 25.14.361A34.534 34.534 0 0 1 87.691 2.5a19.254 19.254 0 0 1 7.154 4.653 19.267 19.267 0 0 1 4.655 7.156 34.341 34.341 0 0 1 2.14 11.553c.3 6.563.361 8.528.361 25.14s-.061 18.577-.361 25.14a34.5 34.5 0 0 1-2.14 11.552A20.6 20.6 0 0 1 87.691 99.5a34.342 34.342 0 0 1-11.553 2.14c-6.557.3-8.528.361-25.14.361s-18.577-.058-25.134-.361"
                                    data-name="Path 17" />
                                <path fill="#fff"
                                    d="M38.477 51.217a12.631 12.631 0 1 1 12.629 12.632 12.631 12.631 0 0 1-12.629-12.632m-6.829 0a19.458 19.458 0 1 0 19.458-19.458 19.457 19.457 0 0 0-19.458 19.458m35.139-20.229a4.547 4.547 0 1 0 4.549-4.545 4.549 4.549 0 0 0-4.547 4.545m-30.99 51.074a20.943 20.943 0 0 1-7.037-1.3 12.547 12.547 0 0 1-7.193-7.19 20.923 20.923 0 0 1-1.3-7.037c-.184-3.994-.22-5.194-.22-15.313s.04-11.316.22-15.314a21.082 21.082 0 0 1 1.3-7.037 12.54 12.54 0 0 1 7.193-7.193 20.924 20.924 0 0 1 7.037-1.3c3.994-.184 5.194-.22 15.309-.22s11.316.039 15.314.221a21.082 21.082 0 0 1 7.037 1.3 12.541 12.541 0 0 1 7.193 7.193 20.926 20.926 0 0 1 1.3 7.037c.184 4 .22 5.194.22 15.314s-.037 11.316-.22 15.314a21.023 21.023 0 0 1-1.3 7.037 12.547 12.547 0 0 1-7.193 7.19 20.925 20.925 0 0 1-7.037 1.3c-3.994.184-5.194.22-15.314.22s-11.316-.037-15.309-.22m-.314-68.509a27.786 27.786 0 0 0-9.2 1.76 19.373 19.373 0 0 0-11.083 11.083 27.794 27.794 0 0 0-1.76 9.2c-.187 4.04-.229 5.332-.229 15.623s.043 11.582.229 15.623a27.793 27.793 0 0 0 1.76 9.2 19.374 19.374 0 0 0 11.083 11.083 27.813 27.813 0 0 0 9.2 1.76c4.042.184 5.332.229 15.623.229s11.582-.043 15.623-.229a27.8 27.8 0 0 0 9.2-1.76 19.374 19.374 0 0 0 11.083-11.083 27.716 27.716 0 0 0 1.76-9.2c.184-4.043.226-5.332.226-15.623s-.043-11.582-.226-15.623a27.786 27.786 0 0 0-1.76-9.2 19.379 19.379 0 0 0-11.08-11.083 27.748 27.748 0 0 0-9.2-1.76c-4.041-.185-5.332-.229-15.621-.229s-11.583.043-15.626.229"
                                    data-name="Path 18" />
                            </svg>
                        </a>
                        @endif
                        @if ($asset->user->telegram!='')
                        <a href="https://t.me/{{$asset->user->telegram}}" target="_blank" rel="noopener noreferrer"
                            class="w-6 h-6 transition-transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" data-name="7" viewBox="0 0 64 64">
                                <path fill="#21a7db" fill-rule="evenodd"
                                    d="m60,12c0-4.42-3.58-8-8-8H12C7.58,4,4,7.58,4,12v40c0,4.42,3.58,8,8,8h40c4.42,0,8-3.58,8-8V12h0Z" />
                                <path fill="#fff" fill-rule="evenodd"
                                    d="m45.15,23.1c.13-.77-.17-1.55-.78-2.04-.61-.48-1.44-.59-2.16-.29-6.61,2.82-20.58,8.77-26.84,11.44-.48.2-.78.69-.75,1.21.03.52.38.96.88,1.11,1.71.51,3.74,1.12,5.17,1.54,1.15.35,2.4.16,3.4-.5,3.38-2.22,11.11-7.29,12.73-8.35.18-.12.41-.11.58.03,0,0,0,0,0,0,.11.09.17.22.18.36,0,.14-.05.28-.15.37-1.48,1.42-6.68,6.39-9.19,8.8-.34.32-.51.78-.47,1.25.04.47.28.89.67,1.16,2.31,1.59,6.66,4.57,9.58,6.57.64.44,1.47.52,2.19.22.72-.3,1.23-.95,1.37-1.73.92-5.38,2.65-15.59,3.6-21.17h0Z" />
                            </svg>
                        </a>
                        @endif
                        @if ($asset->user->whatsup!='')
                        <a href="https://wa.me/{{$asset->user->whatsup}}" target="_blank" rel="noopener noreferrer"
                            class="w-6 h-6 text-green-500 transition-transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 102 102">
                                <defs>
                                    <linearGradient id="a" x1=".5" x2=".5" y2="1" gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#61fd7d" />
                                        <stop offset="1" stop-color="#2bb826" />
                                    </linearGradient>
                                </defs>
                                <path fill="currentColor"
                                    d="M101.971 77.094c0 .558-.017 1.77-.051 2.705a53.717 53.717 0 0 1-.538 6.589 21.949 21.949 0 0 1-1.847 5.521 19.654 19.654 0 0 1-8.653 8.644 21.993 21.993 0 0 1-5.552 1.847 53.913 53.913 0 0 1-6.539.528c-.936.033-2.148.05-2.7.05l-50.223-.008c-.558 0-1.769-.017-2.705-.051a53.744 53.744 0 0 1-6.589-.538 21.951 21.951 0 0 1-5.521-1.847A19.654 19.654 0 0 1 2.4 91.881a21.988 21.988 0 0 1-1.843-5.552 53.954 53.954 0 0 1-.528-6.539 92.845 92.845 0 0 1-.05-2.7l.008-50.224c0-.558.017-1.77.051-2.705a53.738 53.738 0 0 1 .538-6.589 21.946 21.946 0 0 1 1.847-5.521A19.655 19.655 0 0 1 11.076 3.4a22 22 0 0 1 5.552-1.848 53.912 53.912 0 0 1 6.539-.528c.936-.033 2.148-.05 2.7-.05l50.228.012c.559 0 1.77.017 2.705.051a53.744 53.744 0 0 1 6.589.538 21.946 21.946 0 0 1 5.521 1.847 19.653 19.653 0 0 1 8.644 8.653 21.988 21.988 0 0 1 1.848 5.552 53.974 53.974 0 0 1 .528 6.539c.033.936.05 2.148.05 2.7l-.008 50.223Z"
                                    data-name="Path 19" transform="translate(.021 -.978)" />
                                <g data-name="Group 2">
                                    <path fill="#fff"
                                        d="M78.02 24.131A36.58 36.58 0 0 0 20.452 68.25l-5.189 18.948 19.39-5.085a36.561 36.561 0 0 0 17.479 4.451h.015A36.578 36.578 0 0 0 78.02 24.131ZM52.15 80.388h-.012a30.361 30.361 0 0 1-15.473-4.236l-1.11-.659-11.506 3.017 3.071-11.215-.723-1.15a30.4 30.4 0 1 1 25.754 14.242Zm16.67-22.761c-.914-.457-5.407-2.668-6.245-2.973s-1.447-.457-2.056.457-2.361 2.973-2.894 3.582-1.066.686-1.98.229a24.963 24.963 0 0 1-7.349-4.535 27.531 27.531 0 0 1-5.084-6.329c-.533-.915-.057-1.409.4-1.865.411-.409.914-1.067 1.371-1.6a6.23 6.23 0 0 0 .914-1.524 1.682 1.682 0 0 0-.076-1.6c-.228-.457-2.056-4.954-2.818-6.783-.742-1.782-1.5-1.541-2.056-1.568a36.004 36.004 0 0 0-1.752-.032 3.358 3.358 0 0 0-2.437 1.143 10.246 10.246 0 0 0-3.2 7.622c0 4.5 3.275 8.841 3.732 9.451s6.444 9.838 15.612 13.8a52.582 52.582 0 0 0 5.21 1.925 12.535 12.535 0 0 0 5.756.362c1.756-.262 5.407-2.21 6.169-4.344a7.635 7.635 0 0 0 .533-4.344c-.229-.381-.838-.61-1.752-1.067Z"
                                        data-name="Path 20" />
                                </g>
                            </svg>
                        </a>
                        @endif
                        @if ($asset->user->eta!='')
                        <a href="https://eitaa.com/{{$asset->user->eta}}" target="_blank" rel="noopener noreferrer"
                            class="w-6 h-6 transition-transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3584.55 3673.6">
                                <g id="Isolation_Mode" data-name="Isolation Mode">
                                    <path
                                        d="M1071.43,2.75H2607.66C3171,2.75,3631.82,462.91,3631.82,1026.2v493.93c-505,227-1014.43,1348.12-1756.93,1104.51-61.16,43.46-202.11,222.55-212,358.43-257.11-34.24-553.52-328.88-517.95-646.62C717,2026.91,1070.39,1455.5,1409.74,1225.51c727.32-492.94,1737.05-69,1175.39,283.45-341.52,214.31-1071.84,355.88-995.91-170.24-200.34,57.78-328.58,431.34-87.37,626-223.45,219.53-180.49,623.07,58.36,755.57,241.56-625.87,1082.31-544.08,1422-1291.2,255.57-562-123.34-1202.37-880.91-1104C1529.56,399.34,993.64,881.63,725.62,1453.64,453.68,2034,494.15,2811.15,1052.55,3202.82c657.15,460.92,1356.78,34.13,1780.52-523.68,249.77-328.78,468-693,798.75-903.37v875.72c0,563.28-460.88,1024.86-1024.16,1024.86H1071.43c-563.29,0-1024.16-460.87-1024.16-1024.16V1026.9C47.27,463.61,508.14,2.74,1071.43,2.74Z"
                                        transform="translate(-47.27 -2.74)" fill="#ee7f22" fill-rule="evenodd" />
                                </g>
                            </svg>
                        </a>
                        @endif
                        {{-- @if ($asset->user->bale!='')
                        <a href="" target="_blank" rel="noopener noreferrer"
                            class="w-6 h-6 transition-transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 1000 999.72">
                                <defs>
                                    <linearGradient id="linear-gradient" x1="800.4" y1="93.39" x2="93.57" y2="800.23"
                                        gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="#4cebb4" />
                                        <stop offset="1" stop-color="#2e2e74" />
                                    </linearGradient>
                                </defs>
                                <g id="File">
                                    <g>
                                        <path
                                            d="M1010.36,547.36c-.73,17.77-2.6,36-6.85,53.41-1.54,16.48-6.36,32.54-10.76,48.52-5.14,19.5-12.48,38.33-19.9,57.17-6.77,15.66-14.35,30.91-22.26,46.08C942.92,766,934.93,779.2,926.29,792q-14.32,21-30.5,40.45c-11.18,13.13-22.68,26.09-35.15,37.92a503.68,503.68,0,0,1-51.3,43.55,453.44,453.44,0,0,1-48.44,31.56C742.06,956.74,722.16,966,702,974.6a548,548,0,0,1-65.89,21.86c-19.49,4.32-39,9.21-58.88,10.76-37,5.71-74.86,5.79-112.13,2.2-33.6-2.61-66.87-9.78-99.25-19.32l-.08-.58C210.19,944.18,82.32,816.07,34.94,661.2c-10.36-33.35-17.62-67.93-20.31-102.83-3.83-33.85-2-68-2.2-102q-.37-40.74-.08-81.64-.26-41.83,0-83.83c-.17-24-.08-47.95-.08-71.93s-.17-48.19.16-72.25c-.33-23.82-.08-47.63-.16-71.44-1.64-17.94,4.24-36.7,17.86-48.85C44.48,13.44,65.68,8.55,84,14.91c11.09,3.75,20.71,10.6,30.58,16.72,36,23.4,70.54,48.85,104.71,74.78a86.74,86.74,0,0,0,10.68-6.77A426.86,426.86,0,0,1,272.58,73.3a483.59,483.59,0,0,1,45.75-22.1c16.39-6.85,33.19-12.8,50.15-18.1,18.1-5,36.29-10.11,55-12.72a392.65,392.65,0,0,1,61.82-7.26,451.46,451.46,0,0,1,76.41,1.71A413.36,413.36,0,0,1,619,24c128.53,27,244.08,108.3,314.46,219a493,493,0,0,1,66.47,159.76c4.73,20.95,8.48,42.32,9.7,63.77A411.89,411.89,0,0,1,1010.36,547.36Z"
                                            transform="translate(-12 -12.14)" fill="url(#linear-gradient)" />
                                        <path
                                            d="M705.69,273.2a107.59,107.59,0,0,1,62.37,1.3c25.62,9.82,46.29,29.94,57.5,54.9,8.34,22.86,9.31,48.42.91,71.44-6.06,16.2-16.76,30.09-29.4,41.74q-16.7,16.49-33.21,33.14c-11.79,11.79-23.64,23.5-35.33,35.35-11.3,11.28-22.62,22.49-33.85,33.81-12.32,12.34-24.68,24.61-36.95,37-14,14-28.06,27.94-42,42-13.24,13.29-26.55,26.49-39.8,39.78s-26.77,26.71-40.1,40.11c-12.27,11.85-23.51,24.94-37.35,35.06a106.69,106.69,0,0,1-57.95,16C417,753.28,393.79,744,376.87,727.33q-78.53-78.44-157-156.94c-12.82-12.66-21.38-29.07-26-46.38-4.75-23.86-1.94-49.51,10.31-70.75,9.37-16.54,23.79-29.65,40.19-39a107.52,107.52,0,0,1,57.86-9.73c21.38,3.21,42,13,56.91,28.76Q401.7,476,444.37,518.5c8.63-8.18,16.9-16.73,25.19-25.27q18-17.31,35.24-35.35c11.36-10.68,22.33-21.82,33.07-33.12,7.74-6.88,14.75-14.51,22.07-21.8,12-11.68,23.75-23.59,35.49-35.51,11.21-10.83,22.11-21.95,33.07-33,11.79-11.5,23.28-23.28,35-34.87a105.75,105.75,0,0,1,42.21-26.37Z"
                                            transform="translate(-12 -12.14)" fill="#fff" />
                                    </g>
                                </g>
                            </svg>
                        </a>
                        @endif --}}



                    </div>
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <x-secondary-button x-on:click="$dispatch('close')">
                    <div class="!font-sans">بازگشت</div>
                </x-secondary-button>
            </div>
        </form>
    </x-modal>

</div>