<div class="grid grid-cols-1 gap-4 lg:grid-cols-4 px-4 mt-8">
    @foreach ($assets as $asset)


    <div href='#'
        class="max-w-sm rounded overflow-hidden border-b-2 border-b-mahdavi  shadow-xl hover:scale-105 transition-transform flex flex-col">
        <div class="w-full h-72 bg-contain bg-center bg-no-repeat"
            style="background-image: url('https://mahdavi.storage.iran.liara.space/{{ $asset['img'] }}')"
            alt="Sunset in the mountains"></div>
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 text-cyan-800">{{ $asset['title'] }}</div>
            <div class="flex gap-2 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-geo-alt-fill text-mahdavi" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>مازندران - تنکابن - شهیدآباد</div>
            <div class="font-medium mt-7 text-lg  ">
                <div class="border-2 border-mahdavi rounded-md py-1 px-2 w-full flex justify-between items-center">{{
                    number_format($asset['price_public'], 0,
                    ".","،") }}
                    تومانءء</ی>
                    <button wire:click.prevent
                        class="bg-mahdavi border-2 border-mahdavi py-1 px-2 rounded-md text-white hover:bg-white hover:text-mahdavi"
                        href="">مشاهده</button>
                </div>

            </div>

            </a>

        </div>
    </div>
    @endforeach
</div>