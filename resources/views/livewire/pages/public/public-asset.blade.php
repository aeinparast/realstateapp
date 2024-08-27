<div class="grid min-h-screen grid-cols-4">
    <div class="col-start-2">
        <h1 class="text-xl font-bold">{{$asset['title']}}</h1>
        <p>{{$asset['notes']}}</p>
    </div>

    <div id="slide">
        <div class="w-full" dir="ltr">
            <section id="main-carousel" class="rounded splide" aria-label="My Awesome Gallery">
                <div class="splide__track">
                    <ul class="h-64 splide__list">
                        @foreach (explode("*", $asset['img']) as $img)
                        <picture class="min-w-full splide__slide" class="w-full max-h-80 ">
                            <img src="https://mahdavi.storage.iran.liara.space/{{$img}}" alt="" srcset=""
                                class="object-contain max-w-full mx-auto rounded max-h-80">
                        </picture>
                        @endforeach

                    </ul>
                </div>
            </section>


            <ul id="thumbnails" class="grid grid-cols-5 gap-2 mt-2">
                @foreach (explode("*", $asset['img']) as $img)
                <li class="bg-no-repeat bg-contain thumbnail max-h-16 max-w-16 min-h-16 min-w-16"
                    style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$img}}')">
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>