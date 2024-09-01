<div class="w-full">
    <div class="flex gap-2 w-full flex-col justify-center">
        @foreach ($assets as $asset)
        <div wire:key="{{ $asset['key']}}"
            class=" border-2 justify-between px-2 py-4 flex gap-2 rounded border-mahdavi hover:border-dashed hover:scale-95 transition-transform">
            <div class="flex gap-2">
                <div class="hidden">
                    {{ $img= explode("*", $asset['img'])[0]; }}
                </div>
                <div class="w-20 h-20 bg-cover bg-center bg-no-repeat rounded"
                    style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$img}}'">
                </div>
                <div class="flex flex-col justify-between">
                    <div class="">{{ $asset['title'] }} - <span
                            class="text-xs bg-green-400 text-white rounded-md px-2">آماده
                            فروش</span></div>
                    <div class="text-sm">{{ $asset['seller_name'] }} - <a
                            href="tel:{{$asset['seller_phone']}}">{{$asset['seller_phone']}}</a></div>
                    <div class="flex gap-2 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-geo-alt-fill text-mahdavi" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>{{config('cityAreas')[$asset['city']]}}</div>
                </div>
            </div>
            <div class=" justify-between flex flex-col">
                <a href="" class="text-white text-sm ">
                    <button class="bg-green-500 px-2 rounded w-full">عمومی سازی</button>
                </a>
                <a href="" class="text-white text-sm ">
                    <button class="bg-yellow-500 px-2 rounded w-full">ویرایش</button>
                </a>
                <a href="/view?id={{$asset['id']}}" target="__blank" class="text-white text-sm ">
                    <button class="bg-blue-500 px-2 rounded w-full">لینک عمومی</button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    {{$assets->links()}}
</div>