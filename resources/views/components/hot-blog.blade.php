<div class="grid grid-cols-1  gap-4 lg:grid-cols-3 justify-center place-items-center  w-full">
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    @foreach ($blogs as $blog)

    <article
        class="relative  isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 transition-all hover:pb-12 w-[300px] h-80 sm:w-96 lg:w-80 xl:w-96  mt-10">
        <img src="{{env('BUCKET_FULL_URL').'/'.$blog['logo']}}" alt="University of Southern California"
            class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
        <a href="{{route('blog.show',$blog->id)}}" target="__blank"
            class="z-10 mt-3 text-3xl font-bold text-white">{{$blog['title']}}</a>
        <div class="z-10 gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">{{$blog->user->name}}</div>
    </article>
    @endforeach
</div>