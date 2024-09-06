<div class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    @if (!$cities->isEmpty())
    <h1 class="text-3xl font-medium text-center col-span-full text-mahdavi md:text-5xl md:font-bold">شهرهای تحت پوشش
        هلدینگ
        سرمایه‌گذاری مهدوی</h1>
    @foreach ($cities as $city)
    <a href="/amlak?city={{$city->id}}"
        class="flex flex-col items-center justify-center transition-transform rounded hover:scale-95">
        <div class="w-full h-64 bg-center bg-no-repeat bg-cover rounded-t"
            style="background-image: url('{{env('BUCKET_FULL_URL').'/'.$city->logo}}')">
        </div>
        <div
            class="flex flex-col items-center justify-center flex-1 w-full text-3xl font-bold text-white rounded-b bg-mahdavi">
            <h2>{{ $city->name }}</h2>
            <div class="text-lg font-medium ">تعداد فایل‌های این شهر {{ $city->assets_count }}
            </div>
        </div>

    </a>
    @endforeach
    @else
    <h2 class="text-4xl font-medium text-center text-slate-700 col-span-full">در این زمان چیزی برای نمایش وجود ندارد
    </h2>
    @endif
</div>