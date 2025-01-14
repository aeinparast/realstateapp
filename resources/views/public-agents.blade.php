<x-public-layout title="لیست مشاوران | عمارت آریا">
  <section class="min-h-screen grid-cols-1 px-8 m-2 border-b rounded-lg lg:grid-cols-2 hero py-14" id="hero">
    <div class="flex flex-col items-center justify-center mb-2">
      <h1 class="text-5xl font-medium text-center text-brand md:text-6xl md:font-bold">مشاوران املاک عمارت آریا
      </h1>
      <h2
        class="px-4 py-1 mt-3 text-lg text-white transition-all rounded-sm cursor-default bg-brand hover:ring-4 ring-brand ring-offset-4">
        از ابتدا تا
        انتها با شما هستیم
      </h2>
    </div>
    <livewire:agents-public-list>
  </section>

</x-public-layout>