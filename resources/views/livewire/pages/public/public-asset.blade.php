<div class="min-h-screen grid grid-cols-3">
    <div class="col-span-2">
        <h1 class="text-xl font-bold">{{$asset['title']}}</h1>
        <p>{{$asset['notes']}}</p>
    </div>

    <div id="slide">
        <div class="w-full" dir="ltr">
            <section id="main-carousel" class="rounded splide" aria-label="My Awesome Gallery">
                <div class="splide__track">
                    <ul class="h-64 splide__list">
                        @foreach (explode("*", $asset['img']) as $img)
                        <li class="splide__slide">
                            <div class="w-full h-64 bg-center bg-no-repeat bg-contain"
                                style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$img}}')">
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </section>


            <ul id="thumbnails" class="grid grid-cols-5 gap-2 mt-4">
                @foreach (explode("*", $asset['img']) as $img)
                <li class="thumbnail max-h-16 max-w-16 min-h-16 min-w-16 bg-no-repeat bg-contain "
                    style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$img}}')">
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>