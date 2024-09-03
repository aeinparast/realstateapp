<div
    class="flex flex-col max-w-sm col-span-1 overflow-hidden transition-transform border-b-2 rounded shadow-xl border-b-mahdavi hover:scale-105">
    <img src="{{ env('BUCKET_FULL_URL').'/'.explode('*',$asset['img'])[0] }}" alt=""
        class="object-contain w-full rounded-t h-72">
    <div class="flex flex-col justify-between flex-1 px-6 py-4">
        <div class="">
            <div class="mb-2 text-xl font-bold text-cyan-800">{{ $asset['title'] }}</div>
            <div class="flex gap-2 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-geo-alt-fill text-mahdavi" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>{{ config('cityAreas')[$asset['city']] }}</div>
        </div>
        <div class="text-lg font-medium mt-7 ">
            @if ($asset['dealType']==2)
            <div
                class="flex items-center justify-between w-full px-2 py-1 text-base border-2 rounded-md border-mahdavi">
                <div class="">
                    @if ($asset['price_public']==0)
                    تماس بگیرید
                    @else
                    <div class="">
                        {{
                        number_format($asset['price_public'], 0,
                        ".","،") }}
                        <span class="text-sm">تومانءءء</span>
                    </div>
                    <div class="">
                        {{
                        number_format($asset['rent'], 0,
                        ".","،") }}
                        <span class="text-sm">تومانءءء</span> اجاره
                    </div>
                    @endif
                </div>
                <a target="_blank"
                    class="px-2 py-1 text-white border-2 rounded-md bg-mahdavi border-mahdavi hover:bg-white hover:text-mahdavi"
                    href="{{route('asset-view')}}?id={{$asset['id']}}">مشاهده</a>
            </div>
            @else
            <div class="flex items-center justify-between w-full px-2 py-1 border-2 rounded-md border-mahdavi">
                @if ($asset['price_public']==0)
                تماس بگیرید
                @else
                {{
                number_format($asset['price_public'], 0,
                ".","،") }}
                تومانءء
                @endif
                <a target="_blank"
                    class="px-2 py-1 text-white border-2 rounded-md bg-mahdavi border-mahdavi hover:bg-white hover:text-mahdavi"
                    href="{{route('asset-view')}}?id={{$asset['id']}}">مشاهده</a>
            </div>
            @endif


        </div>



    </div>
</div>