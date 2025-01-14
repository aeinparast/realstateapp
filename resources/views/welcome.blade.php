<x-public-layout>
  <section class="grid min-h-screen grid-cols-1 px-8 m-2 bg-no-repeat bg-cover rounded-lg hero py-14 bg-brand"
    id="hero">
    <div
      class="text-center transition-opacity duration-700 ease-in transform translate-y-10 opacity-0 lg:text-right scroll-section">
      <h1 class="hidden text-6xl font-bold text-center text-white md:block lg:text-right lg:text-9xl lg:font-black"
        style="line-height: 1.3">ورود به
        قلب بازار
        ملک!</h1>

      <h1 class="text-5xl font-bold text-center text-white md:hidden lg:text-right lg:text-9xl lg:font-black"
        style="line-height: 1.3">املاک عمارت آریا</h1>

    </div>
    <div class="flex items-center justify-center col-span-full sm:hidden">
      <a href="#main" class="text-white bottom-10 left-1/2 animate-bounce"><svg xmlns="http://www.w3.org/2000/svg"
          width="34" height="34" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z" />
        </svg></a>
    </div>

    <div class="items-center justify-center hidden col-span-full sm:flex">
      <a href="#main" class="text-white bottom-10 left-1/2 animate-bounce"><svg xmlns="http://www.w3.org/2000/svg"
          width="34" height="34" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z" />
        </svg></a>
    </div>
  </section>
  <section id="main">
    <h2 class="my-4 text-4xl font-bold text-center text-brand">تازه ترینها</h2>
    <x-latest-assets />
    <div class="flex justify-center w-full my-4">
      <a href="/amlak"
        class="px-4 py-1 font-medium text-center text-white transition-all border-2 rounded-full bg-brand ring-0 ring-brand border-brand hover:bg-white hover:text-brand hover:ring-4 hover:ring-offset-4">
        موارد بیشتر</a>
    </div>
  </section>
  <section id="blog">
    <h2 class="my-4 text-4xl font-bold text-center text-brand">آخرین‌های وبلاگ</h2>
    <x-hot-blog />
    <div class="flex justify-center w-full my-4">
      <a href="{{route('weblog')}}"
        class="px-4 py-1 font-medium text-center text-white transition-all border-2 rounded-full bg-brand ring-0 ring-brand border-brand hover:bg-white hover:text-brand hover:ring-4 hover:ring-offset-4">
        موارد بیشتر</a>
    </div>
  </section>
</x-public-layout>