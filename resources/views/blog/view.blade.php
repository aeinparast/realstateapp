<x-public-layout title="وبلاگ هلدینگ سرمایه‌گذاری مهدوی - {{$blog['title']}}" keywords="{{$blog['keywords']}}">
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="min-h-screen">
        <div class="relative w-full pt-3 bg-mahdavi h-44">
            <div class="absolute w-56 h-56 transform -translate-x-1/2 bg-no-repeat bg-cover border-2 rounded -bottom-32 left-1/2 border-mahdavi"
                style="background-image: url('{{env('BUCKET_FULL_URL').'/'.$blog['logo']}}')" id="logo"></div>
        </div>
        <div class="flex flex-col items-center justify-center w-full ">
            <div class="max-w-lg ">
                <h1 class="text-3xl font-bold text-center text-slate-700 mt-36">{{$blog['title']}}</h1>
                <div class="flex justify-center gap-2 text-slate-600">
                    <div class="">نویسنده:</div>
                    <div class="">رایان آیین پرست</div>
                </div>
                <div class="flex flex-col gap-2 items-center justify-center mt-4 text-center">
                    @foreach ($articles['blocks'] as $article)
                    @if (isset($article['data']['text']))
                    @if ($article['type']=='header')
                    <h2>{{ $article['data']['text'] }}</h2>
                    @continue
                    @endif
                    @if ($article['type']=='paragraph')
                    <p class="w-full mt-2 text-center blog_p">{!! $article['data']['text'] !!}</p>
                    @continue
                    @endif
                    @if ($article['type']=='quote')
                    <section class="component p-10 mx-1  ">
                        <blockquote class="relative text-black font-medium text-center p-10 w-full ">
                            {{$article['data']['text']}}
                            <br><cite> - {{$article['data']['caption']}}</cite>
                        </blockquote>
                    </section>
                    @continue
                    @endif
                    @endif
                    @if ($article['type']=='image')
                    <div class="w-full">
                        <img src="{{$article['data']['url']}}" alt="" class="h-auto">
                        <div class="text-sm"><i class="text-gray-600">{{$article['data']['caption']}}</i></div>
                    </div>
                    @continue
                    @endif
                    @if ($article['type']=='list')
                    <ul class="w-full list-disc text-right">
                        @foreach ($article['data']['items'] as $listitem)
                        <li>{{$listitem}}</li>
                        @endforeach
                    </ul>
                    @continue
                    @endif
                    @endforeach


                </div>
            </div>
        </div>
    </div>

</x-public-layout>