<div class="grid grid-cols-1 gap-4 px-4 mt-8 lg:grid-cols-4">
    <div
        class="relative top-0 right-0 flex flex-col col-span-1 gap-2 p-2 border-2 rounded row-span-full border-mahdavi">
        <div class="sticky right-0 w-full pt-5 top-5">
            <div class="flex mb-4">
                <div class="w-full px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                        for="grid-last-name">
                        قیمت از: </label>
                    <input wire:model='seller_name'
                        class="block w-full py-3 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                        id="grid-last-name" type="text" placeholder="کف قیمت">
                </div>
                <div class="w-full px-3 md:w-1/2">
                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                        for="grid-last-name">
                        تا: </label>
                    <input wire:model='seller_name'
                        class="block w-full py-3 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none border-mahdavi focus:outline-none focus:bg-white focus:border-mahdavi"
                        id="grid-last-name" type="text" placeholder="سقف قیمت">
                </div>
            </div>
            <p class="mb-2 text-lg font-bold text-gray-600">نوع ملک</p>
            <div class="flex flex-col gap-2 pr-4 mb-6">
                <div class="items-center">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-mahdavi focus:ring-mahdavi focus:ring-2 ">
                    <label for="default-checkbox" class="font-medium text-gray-600 ms-2 dark:text-gray-300">زمین</label>
                </div>
                <div class="flex items-center">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-mahdavi focus:ring-mahdavi focus:ring-2 ">
                    <label for="default-checkbox" class="font-medium text-gray-600 ms-2 dark:text-gray-300">خانه</label>
                </div>
                <div class="flex items-center">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-mahdavi focus:ring-mahdavi focus:ring-2 ">
                    <label for="default-checkbox" class="font-medium text-gray-600 ms-2 dark:text-gray-300">ویلا</label>
                </div>
                <div class="flex items-center">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-mahdavi focus:ring-mahdavi focus:ring-2 ">
                    <label for="default-checkbox"
                        class="font-medium text-gray-600 ms-2 dark:text-gray-300">تجاری</label>
                </div>

            </div>
            <p class="mb-2 text-lg font-bold text-gray-600">نوع معامله</p>
            <div class="flex flex-col gap-2 pr-4">

                <div class="flex items-center mb-1">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-mahdavi focus:ring-mahdavi focus:ring-2 ">
                    <label for="default-checkbox"
                        class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">فروش</label>
                </div>
                <div class="flex items-center mb-1">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-mahdavi focus:ring-mahdavi focus:ring-2 ">
                    <label for="default-checkbox"
                        class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">رهن</label>
                </div>
                <div class="flex items-center mb-1">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-mahdavi focus:ring-mahdavi focus:ring-2 ">
                    <label for="default-checkbox"
                        class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">اجاره</label>
                </div>
                <div class="flex items-center mb-1">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-mahdavi focus:ring-mahdavi focus:ring-2 ">
                    <label for="default-checkbox"
                        class="text-sm font-medium text-gray-600 ms-2 dark:text-gray-300">پروژه و
                        مشارکت</label>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 col-span-3 gap-2">
        @foreach ($assets as $asset)
        <div
            class="flex flex-col max-w-sm col-span-1 overflow-hidden transition-transform border-b-2 rounded shadow-xl border-b-mahdavi hover:scale-105">
            <div class="w-full bg-center bg-no-repeat bg-contain rounded-t h-72"
                style="background-image: url('https://mahdavi.storage.iran.liara.space/{{ $asset['img'] }}')"
                alt="Sunset in the mountains"></div>
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
                        <a class="px-2 py-1 text-white border-2 rounded-md bg-mahdavi border-mahdavi hover:bg-white hover:text-mahdavi"
                            href="https://mahdavi.storage.iran.liara.space/{{ $asset['img']   }}">مشاهده</a>
                    </div>

                </div>



            </div>
        </div>
        @endforeach
    </div>

</div>