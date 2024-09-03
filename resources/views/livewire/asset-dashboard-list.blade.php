<div class="w-full">
    <div class="flex flex-col justify-center w-full gap-2">
        @foreach ($assets as $asset)
        <div wire:key="{{ $asset['key']}}"
            class="flex justify-between gap-2 px-2 py-4 transition-transform border-2 rounded border-mahdavi hover:border-dashed hover:scale-95">
            <div class="flex gap-2">
                <div class="hidden">
                    {{ $img= explode("*", $asset['img'])[0]; }}
                </div>
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
                href="tel:{{$asset['seller_phone']}}">{{$asset['seller_phone']}}</a></div>
        <div class="flex gap-2 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-geo-alt-fill text-mahdavi" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>{{config('cityAreas')[$asset['city']]}}</div>
    </div>
</div>
<div class="flex flex-col justify-between ">
    <a href="" class="text-sm text-white ">
        <button class="w-full px-2 bg-green-500 rounded">عمومی سازی</button>
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