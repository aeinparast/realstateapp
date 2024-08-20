<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      <a href="{{route('asset')}}" wire:navigate class="transition-colors hover:text-gray-400">Assets</a> >
      {{ __('Create Asset') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          {{ __("Create an asset") }}
        </div>
      </div>
      <div class="mt-2 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">

        <form class="w-full">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 text-gray-900  dark:text-gray-100">
            <div>
              <div class="flex flex-wrap mb-6 -mx-3">
                <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                  <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                    for="grid-first-name">
                    Asset Name
                  </label>
                  <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-red-500 rounded appearance-none focus:outline-none focus:bg-white"
                    id="grid-first-name" type="text">
                  <p class="text-xs italic text-red-500">Please fill out this field.</p>
                </div>
                <div class="w-full px-3 md:w-1/2">
                  <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                    for="grid-last-name">
                    Seller Name
                  </label>
                  <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text">
                </div>
              </div>
              <div class="flex flex-wrap mb-6 -mx-3 ">
                <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                  <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                    for="grid-first-name">
                    Seller Phone
                  </label>
                  <input
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border-gray-200  rounded appearance-none focus:outline-none focus:bg-white"
                    id="grid-first-name" type="text" placeholder="01154000000">
                </div>
                <div class="w-full px-3 md:w-1/2">
                  <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                    for="grid-last-name">
                    Seller Mobile
                  </label>
                  <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="0911000000">
                </div>
              </div>
              <div class="flex flex-wrap mb-6 -mx-3 ">
                <div class="w-full px-3">
                  <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-password">
                    Notes
                  </label>
                  <textarea
                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none h-36 focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="text"> </textarea>
                  <p class="text-xs italic text-gray-600">For reminder or for your teammates!</p>
                </div>
              </div>
              <div class="flex flex-wrap mb-2 -mx-3 ">
                <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                  <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-city">
                    City
                  </label>
                  <input
                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-city" type="text" placeholder="Tonekabon">
                </div>
                <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                  <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-state">
                    Asset Type
                  </label>
                  <div class="relative">
                    <select
                      class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                      id="grid-state">
                      <option>Land</option>
                      <option>Home</option>
                      <option>Villa home</option>
                      <option>Apartmant</option>
                      <option>Shop</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">

                    </div>
                  </div>
                </div>

                <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                  <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-state">
                    Deal Type
                  </label>
                  <div class="relative">
                    <select
                      class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                      id="grid-state">
                      <option>Sell</option>
                      <option>Sell-Presell</option>
                      <option>Rent</option>
                      <option>Nightly rent</option>
                      <option>Yearly rent</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex flex-col items-center justify-center w-full gap-4 ">
              <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                  </svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                      upload</span> or drag and drop</p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">WEBP, PNG, JPG (MAX. 2MB)</p>
                </div>
                <input id="dropzone-file" type="file" class="hidden" />
              </label>
              <!-- Photo Items -->
              <div
                class="items-center outline-none flex-1 w-full flex gap-2 px-2 overflow-x-auto border border-gray-300 border-dashed rounded-md h-28 max-h-28">
                <!-- Photo Item -->
                <div class="w-24 h-24 border-gray-400 border border-dashed rounded flex-shrink-0 relative">
                  <!-- Photo Item DELETE -->
                  <div
                    class="absolute h-7 w-7 p-1 border-2 border-dashed transition-colors bg-red-600 border-red-600 hover:bg-white hover:text-red-600 rounded-full top-1 right-1 flex items-center justify-center text-white cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-trash" viewBox="0 0 16 16">
                      <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                      <path
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                    </svg>
                  </div>
                  <!-- Photo Item IMAGE! -->
                  <img src="/img/melika.jpg" class="rounded" alt="">
                </div>

              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>