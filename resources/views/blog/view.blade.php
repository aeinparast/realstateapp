<x-public-layout title="{{$blog['title']}} | وبلاگ عمارت آریا" keywords="{{$blog['keywords']}}">
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="min-h-screen">
        <div class="relative w-full pt-3 bg-brand h-44">
            <div class="absolute w-56 h-56 transform -translate-x-1/2 bg-no-repeat bg-cover border-2 rounded -bottom-32 left-1/2 border-brand"
                style="background-image: url('{{env('BUCKET_FULL_URL').'/'.$blog['logo']}}')" id="logo"></div>
        </div>
        <div class="flex flex-col items-center justify-center w-full ">
            <div class="max-w-lg ">
                <h1 class="text-3xl font-bold text-center text-slate-700 mt-36">{{$blog['title']}}</h1>
                <div class="flex justify-center gap-2 text-slate-600">
                    <div class="">نویسنده:</div>
                    <div class="">{{$blog->user->name}}</div>
                </div>
                <div class="flex flex-col items-center justify-center gap-2 mt-4 text-center">
                    @if (!empty($articles['blocks']) && is_array($articles['blocks']))
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
                    <section class="p-10 mx-1 component ">
                        <blockquote class="relative w-full p-10 font-medium text-center text-black ">
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
                    <ul class="w-full text-right list-disc">
                        @foreach ($article['data']['items'] as $listitem)
                        <li>{{$listitem}}</li>
                        @endforeach
                    </ul>
                    @continue
                    @endif
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>

</x-public-layout>