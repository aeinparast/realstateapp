<div
    class="flex flex-col max-w-sm col-span-1 overflow-hidden transition-transform border-b-2 rounded shadow-xl border-b-mahdavi hover:scale-105">
    <img src="https://mahdavi.storage.iran.liara.space/{{ explode('*',$asset['img'])[0] }}" alt=""
        class="object-contain w-full rounded-t h-72">
    <div class="px-6 py-4">
        <div class="mb-2 text-xl font-bold text-cyan-800">{{ $asset['title'] }}</div>
        <div class="flex gap-2 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-geo-alt-fill text-mahdavi" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>مازندران - تنکابن - شهیدآباد</div>
        <div class="text-lg font-medium mt-7 ">
            <div class="flex items-center justify-between w-full px-2 py-1 border-2 rounded-md border-mahdavi">
                {{
                number_format($asset['price_public'], 0,
                ".","،") }}
                تومانءء</ی>
                <a target="_blank"
                    class="px-2 py-1 text-white border-2 rounded-md bg-mahdavi border-mahdavi hover:bg-white hover:text-mahdavi"
                    href="{{route('asset-view')}}?id={{$asset['id']}}">مشاهده</a>
            </div>

        </div>



    </div>
</div>