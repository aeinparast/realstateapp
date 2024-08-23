<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans" dir="rtl">
    <div class="lg:container md:mx-auto">
        <header class="">
            <nav class="h-12 w-full  rounded flex items-center justify-between px-8">
                <div class="flex items-center lg:gap-6 xl:gap-12">
                    <div
                        class=" font-medium flex items-center border-b-2 border-transparent hover:text-mahdavi hover:border-b-mahdavi transition-colors">
                        هلدینگ سرمایه‌گذاری مهدوی</div>
                    <ul class="flex lg:gap-12 md:gap-6 px-4 items-center">
                        <li class=" text-sm hover:text-mahdavi transition-colors border-b-2  
                        @if (request()->routeIs('home'))
                            border-b-mahdavi text-mahdavi font-normal
                        @else
                        border-b-transparent
                        font-light
                        @endif">
                            <a href="{{route('home')}}">خانه</a>
                        </li>
                        <li class="font-light text-sm">املاک</li>
                        <li class="font-light text-sm">شهرها</li>
                        <li class="font-light text-sm">مشاوران</li>
                        <li class="font-light text-sm">ارتباط با ما</li>
                        <li class="font-light text-sm">درباره ما</li>
                    </ul>
                </div>
                <div class="flex items-center gap-4 relative">

                    <a href=""
                        class="bg-mahdavi group text-white py-1 px-4 rounded hover:bg-transparent border-2 border-mahdavi transition-colors hover:text-mahdavi">مشاوره
                        خرید
                        <span
                            class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-white opacity-75 right-2 top-2 group-hover:bg-mahdavi"></span>

                    </a>
                    <a href=""
                        class="py-1 px-4 rounded hover:bg-transparent border-2 border-mahdavi transition-colors text-mahdavi hover:border-dashed">مشاوره
                        فروش</a>
                </div>
            </nav>
        </header>
        <main class="">
            <section class="hero min-h-screen px-8 py-14 bg-mahdavi m-2 rounded-lg grid grid-cols-2 relative" id="hero">
                <div class="">
                    <h1 class="font-black text-9xl text-white" style="line-height: 1.3">ورود به قلب بازار ملک!</h1>

                </div>
                <div class="rounded-lg p-6 h-[90%] grid grid-cols-1 gap-4">
                    <div class="grid grid-cols-4 gap-4 text-white font-black">
                        <div
                            class="border-4 border-white rounded-lg grid grid-cols-1 text-center  content-center gap-4 hover:scale-105 transition-transform hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                                class="bi bi-houses mx-auto" viewBox="0 0 16 16">
                                <path
                                    d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z" />
                            </svg>
                            <div class="">مشاهده املاک</div>
                        </div>
                        <div
                            class="border-4 border-white rounded-lg grid grid-cols-1 text-center  content-center gap-4 hover:scale-105 transition-transform hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                                class="bi bi-telephone-outbound mx-auto" viewBox="0 0 16 16">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5" />
                            </svg>
                            <div class="">تماس با مشاورین</div>
                        </div>
                        <div
                            class="border-4 border-white rounded-lg grid grid-cols-1 text-center  content-center gap-4 hover:scale-105 transition-transform hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                                class="bi bi-book-half mx-auto" viewBox="0 0 16 16">
                                <path
                                    d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                            </svg>
                            <div class="">فروش ملک</div>
                        </div>
                        <div
                            class="border-4 border-white rounded-lg grid grid-cols-1 text-center  content-center gap-4 hover:scale-105 transition-transform hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                                class="bi bi-newspaper mx-auto" viewBox="0 0 16 16">
                                <path
                                    d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z" />
                                <path
                                    d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z" />
                            </svg>
                            <div class="">وبلاگ</div>
                        </div>

                    </div>
                    <livewire:hero-search />
                </div>

                <a href="#main" class="absolute bottom-10 left-1/2 text-white animate-bounce"><svg
                        xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor"
                        class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z" />
                    </svg></a>
            </section>
            <section id="main"></section>
        </main>
        <footer class="min-h-40  p-12 flex items-center">
            <img class="w-32" src="/img/logo.webp" alt="Mahdavi holding Logo">
            <div class="flex gap-4 text-gray-600">
                <div class="">صفحه اصلی</div>
                <div class="">آگهی‌ها</div>
                <div class="">فروش ملک</div>
                <div class="">اصول کاری</div>
                <div class="">مشاوران</div>
                <div class="">همکاری با ما</div>
                <div class="">درباره ما</div>
                <div class="">راه‌های تماس</div>
            </div>
        </footer>
        <section>
            <div class="bg-mahdavi text-white text-center text-sm rounded-sm">تمامی حقوق این وبسایت برای هلدینگ
                سرمایه‌گذاری مهدوی
                محفوظ
                است.</div>
        </section>
    </div>
</body>

</html>