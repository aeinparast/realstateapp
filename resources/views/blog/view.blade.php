<x-public-layout title="وبلاگ هلدینگ سرمایه‌گذاری مهدوی − {{$blog['title']}}">
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="min-h-screen">
        <div class="relative w-full bg-mahdavi h-44 pt-3">
            <div class="absolute -bottom-32 left-1/2 transform -translate-x-1/2 bg-cover bg-no-repeat rounded border-mahdavi border-2 w-56 h-56"
                style="background-image: url('{{env('BUCKET_FULL_URL').'/'.$blog['logo']}}')" id="logo"></div>
        </div>
        <div class="w-full flex justify-center flex-col">
            <h1 class="text-center text-slate-700 text-3xl font-bold mt-36">{{$blog['title']}}</h1>
            <div class="flex gap-2 justify-center text-slate-600">
                <div class="">نویسنده:</div>
                <div class="">رایان آیین پرست</div>
            </div>
        </div>
    </div>

</x-public-layout>