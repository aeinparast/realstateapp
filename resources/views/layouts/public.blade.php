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

<body class="font-sans antialiased" dir="rtl">
  <div class="lg:container md:mx-auto">
    <header class="">
      <nav class="flex items-center justify-between w-full h-12 px-1 rounded sm:px-8">
        <div class="flex items-center sm:gap-2 md:gap-2 lg:gap-6 xl:gap-12">
          <a href="/"
            class="flex items-center text-sm font-normal text-center transition-colors border-b-2 border-transparent sm:font-medium hover:text-mahdavi hover:border-b-mahdavi">
            هلدینگ سرمایه‌گذاری مهدوی</a>

          <ul class="items-center hidden px-4 lg:gap-6 xl:gap-12 md:gap-2 md:flex md:px-2">
            <li class=" text-sm hover:text-mahdavi transition-colors border-b-2  
                        @if (request()->routeIs('home'))
                            border-b-mahdavi text-mahdavi font-normal
                        @else
                        border-b-transparent
                        font-light
                        @endif">
              <a href="{{route('home')}}">خانه</a>
            </li>
            <li class="text-sm font-light">املاک</li>
            <li class="text-sm font-light">شهرها</li>
            <li class=" text-sm hover:text-mahdavi transition-colors border-b-2  
                        @if (request()->routeIs('public-agents'))
                            border-b-mahdavi text-mahdavi font-normal
                        @else
                        border-b-transparent
                        font-light
                        @endif">
              <a href="{{route('public-agents')}}">مشاوران</a>
            <li class="text-sm font-light">ارتباط با ما</li>
            <li class="text-sm font-light">درباره ما</li>
          </ul>
        </div>
        <div class="relative flex items-center gap-1 sm:gap-2 lg:gap-4">

          <a href="" class="navigation__btn navigation__btn--primary group">مشاوره
            خرید
            <span
              class="absolute inline-flex w-2 h-2 bg-white rounded-full opacity-75 animate-ping sm:right-2 sm:top-2 right-1 top-1 group-hover:bg-mahdavi"></span>

          </a>
          <a href="" class="navigation__btn navigation__btn--secondery">مشاوره
            فروش</a>
        </div>
      </nav>
    </header>
    <main class="">
      {{ $slot }}

    </main>
    <footer class="flex flex-col items-center p-12 sm:flex-row min-h-40">
      <a href="/"><img class="w-32" src="/img/logo.webp" alt="Mahdavi holding Logo"></a>

      <div class="flex flex-wrap justify-center gap-4 text-sm text-gray-600 sm:justify-normal md:text-base">
        <div class="transition-colors hover:text-gray-800"><a href="/">صفحه اصلی</a></div>
        <div class="">خرید ملک</div>
        <div class="">فروش ملک</div>
        <div class="">مشاوران</div>
        <div class="">همکاری با ما</div>
        <div class="">درباره ما</div>
        <div class="">تماس با ما</div>
      </div>
    </footer>
    <section>
      <div class="text-xs text-center text-white rounded-sm sm:text-sm bg-mahdavi">تمامی حقوق این وبسایت برای
        هلدینگ
        سرمایه‌گذاری مهدوی
        محفوظ
        است.</div>
    </section>
  </div>
</body>

</html>