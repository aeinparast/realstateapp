<div class="grid min-h-screen grid-cols-1 gap-4 md:grid-cols-4">
    <div class="flex flex-col gap-4 px-4 md:col-start-2">
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
                <div class="">{{ number_format($asset['price_public'], 0, ".", "،") }} تومان</div>
                @else
                <div class="">تماس بگیرید</div>
                @endif
            </div>
            @endif

            <div class="flex items-center justify-between py-2 border-b">
                <div class="text-gray-600">متراژ</div>
                <div class="">{{ $asset['area'] }}</div>
            </div>

            @if (in_array($asset->assetType, [3, 4, 8, 9, 11]))
            <div class="flex items-center justify-between py-2 border-b">
                <div class="text-gray-600">طبقه</div>
                <div class="">{{ $asset['floor'] }}</div>
            </div>
            @endif
        </div>

        <!-- Seller Information -->
        <div class="flex justify-center gap-4 px-2 py-2 border rounded-md border-mahdavi">
            <div class="w-20 h-20 bg-black rounded-full"></div>
            <div class="flex flex-col">
                <div class="text-sm text-gray-600">مشاور:</div>
                <div class="">{{ $asset->user->name }}</div>
                <a href=""
                    class="py-1 mt-2 text-center text-white transition-opacity rounded bg-mahdavi hover:opacity-90">تماس</a>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="flex flex-col gap-2">
            <div class="">توضیحات:</div>
            <p class="">{{ $asset['notes'] }}</p>
        </div>

        <!-- Facilities -->
        <div>
            <div>امکانات:</div>
            <div class="flex flex-wrap gap-1">
                @foreach ($facilities_list as $facilitie)
                <div class="px-2 font-bold border-2 rounded-full border-mahdavi hover:border-dashed text-mahdavi">
                    {{ $facilities[$facilitie] }}
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Right Column Content -->
    <div class="flex flex-col" id="right-col">
        <div id="slide" class="row-start-1 md:col-start-3">
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

        <div class="row-start-2 overflow-hidden rounded md:col-start-3" id="map">
            <iframe width="100%" height="200" src="https://map.ir/lat/35.724747/lng/51.421002/z/16/p/ملک"></iframe>
        </div>
    </div>
</div>