<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ $description ?? '' }}">
  <meta name="keywords" content="{{ $keywords ?? '' }}">

  <title>{{ $title ?? 'هلدینگ سرمایه‌گذاری مهدوی' }}</title>

  <!-- Fonts -->

  <link rel="stylesheet" href="/fontiran.css">

  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative overflow-x-hidden font-sans antialiased" dir="rtl" id="body">
  <div class=" navigation md:hidden" id="nav">
    <input type="checkbox" class="navigation__checkbox" id="navi-toggle">

    <label for="navi-toggle" class="navigation__button">
      <span class="navigation__icon">&nbsp;</span>
    </label>

    <div class="navigation__background">&nbsp;</div>

    <nav class="navigation__nav">
      <ul class="navigation__list">
        <li class="navigation__item"><a href="{{route('home')}}" class="text-white
                            @if (request()->routeIs('home'))
                            border-b
                        @else
                        border-b-transparent
                        font-light
                        @endif
          ">خانه</a></li>
        <li class="navigation__item"><a href="{{route('amlak')}}" class="text-white
          @if (request()->routeIs('amlak'))
                            border-b
                        @else
                        border-b-transparent
                        font-light
                        @endif
          ">املاک</a></li>
        <li class="navigation__item"><a href="{{route('cities')}}" class="text-white
          @if (request()->routeIs('cities'))
                            border-b
                        @else
                        border-b-transparent
                        font-light
                        @endif">شهرها</a></li>
        <li class="navigation__item"><a href="{{route('public-agents')}}" class="text-white
          @if (request()->routeIs('public-agents'))
                            border-b
                        @else
                        border-b-transparent
                        font-light
                        @endif
          ">مشاوران</a></li>
        <li class="navigation__item"><a href="#" class="text-white">تماس با ما</a></li>


      </ul>
    </nav>
  </div>
  <div class="lg:container md:mx-auto">
    <header class="">
      <nav class="items-center justify-between hidden w-full h-12 px-1 rounded md:flex sm:px-8">
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
            <li class=" text-sm hover:text-mahdavi transition-colors border-b-2  
                        @if (request()->routeIs('amlak'))
                            border-b-mahdavi text-mahdavi font-normal
                        @else
                        border-b-transparent
                        font-light
                        @endif">
              <a href="{{route('amlak')}}">املاک</a>
            </li>
            <li class=" text-sm hover:text-mahdavi transition-colors border-b-2  
            @if (request()->routeIs('cities'))
                border-b-mahdavi text-mahdavi font-normal
            @else
            border-b-transparent
            font-light
            @endif">
              <a href="{{route('cities')}}">شهرها</a>
            </li>
            <li class=" text-sm hover:text-mahdavi transition-colors border-b-2  
                        @if (request()->routeIs('public-agents'))
                            border-b-mahdavi text-mahdavi font-normal
                        @else
                        border-b-transparent
                        font-light
                        @endif">
              <a href="{{route('public-agents')}}">مشاوران</a>
            </li>
            <li class=" text-sm hover:text-mahdavi transition-colors border-b-2  
            @if (request()->routeIs('weblog'))
                border-b-mahdavi text-mahdavi font-normal
            @else
            border-b-transparent
            font-light
            @endif">
              <a href="{{route('weblog')}}">وبلاگ</a>
            </li>
            <li class="text-sm font-light">ارتباط با ما</li>
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
        <div class="transition-colors hover:text-gray-800">
          <a href="/amlak" target="_blank" rel="noopener noreferrer">خرید ملک</a>
        </div>
        <div class="transition-colors hover:text-gray-800">
          <a href="/sell-property" target="_blank" rel="noopener noreferrer">فروش ملک</a>
        </div>
        <div class="transition-colors hover:text-gray-800">
          <a href="/agents" target="_blank" rel="noopener noreferrer">مشاوران</a>
        </div>
        <div class="/contact-us">تماس با ما</div>
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