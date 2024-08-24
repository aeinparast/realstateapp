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

            <div class="grid grid-cols-1 gap-6 p-6 text-gray-900 md:grid-cols-2 dark:text-gray-100">
                <form class="w-full" wire:submit='save'>

                    <div>
                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="grid-first-name">
                                    Asset Name
                                </label>
                                <input wire:model='title'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-red-500 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text">
                                <p class="text-xs italic text-red-500">Please fill out this field.</p>
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="grid-last-name">
                                    Seller Name
                                </label>
                                <input wire:model='seller_name'
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
                                <input wire:model='seller_phone'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text" placeholder="01154000000">
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="grid-last-name">
                                    Seller Mobile
                                </label>
                                <input wire:model='seller_mobile'
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="0911000000">
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-6 -mx-3 ">
                            <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="grid-password">
                                    Notes
                                </label>
                                <textarea wire:model='notes'
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none h-36 focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-password" type="text"> </textarea>
                                <p class="text-xs italic text-gray-600">For reminder or for your teammates. (Private!)
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-2 -mx-3 ">
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="grid-city">
                                    City
                                </label>
                                <input wire:model='city'
                                    class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-city" type="text" placeholder="Tonekabon">
                            </div>
                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="grid-state">
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
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">

                                    </div>
                                </div>
                            </div>

                            <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0 md:col-start-1">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="grid-state">
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
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    </div>
                                </div>

                            </div>

                        </div>
                        @error('title') {{ $message }} <br> @enderror
                        @error('notes') {{ $message }} <br> @enderror
                        @error('seller_name') {{ $message }} <br> @enderror
                        @error('seller_mobile') {{ $message }} <br> @enderror
                        @error('seller_phone') {{ $message }} <br> @enderror
                        @error('city') {{ $message }} <br> @enderror
                        @error('*') {{ $message }} <br> @enderror

                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Submit</button>
                    </div>


                </form>

                <form wire:submit='uploadImage' class="flex flex-col items-center justify-center w-full gap-4 ">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to
                                    upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">WEBP, PNG, JPG (MAX. 2MB)</p>
                            <div wire:loading wire:target="file">Uploading...</div>
                        </div>
                        <input wire:model='file' id="dropzone-file" type="file" class="hidden" />
                    </label>
                    @if ($file)
                    <div
                        class="flex flex-row justify-between w-full h-64 gap-4 p-2 border-2 border-gray-300 border-dashed rounded">
                        <div class="">
                            <img src="{{$file->temporaryUrl()}}" class="w-full h-full rounded"
                                alt="temporary image for preview">
                        </div>
                        <div class="flex flex-col items-center justify-center w-1/2 gap-4 p-4">
                            <p class="text-center">Please Confirm the Image</p>
                            <button type="submit"
                                class="flex items-center justify-center w-full h-12 gap-4 px-4 py-2 text-white bg-blue-500 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708z" />
                                    <path
                                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                </svg>
                                <div>Upload</div>
                            </button>
                            <button type="button" wire:click='deleteFile' wire:confirm='Are You sure?'
                                class="flex items-center justify-center w-full h-12 gap-4 px-4 py-2 text-white bg-red-500 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                                <div>Cancel</div>
                            </button>

                        </div>
                    </div>
                    @endif
                    @if ($photos)
                    <!-- Photo Items -->
                    <div
                        class="flex items-center flex-1 w-full gap-2 px-2 overflow-x-auto border-2 border-gray-300 border-dashed rounded-md outline-none h-36 max-h-36">
                        <!-- Photo Item -->

                        @foreach ($photos as $key=> $photo)

                        <div class="relative flex-shrink-0 w-28 h-28   border-dashed rounded  bg-no-repeat bg-contain bg-center 
                        @if ($key===0)
                        border-green-400 border-4
                        @else
                        border-gray-400 border-2
                        @endif
                        " wire:key='{{$key}}' wire:click='setAsPrimary({{$key}})'
                            style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$photo}}')">
                            <!-- Photo Item DELETE -->
                            <div wire:click='deleteImage({{$key}})' wire:confirm='Are You sure?'
                                class="absolute flex items-center justify-center p-1 text-white transition-colors bg-red-600 border-2 border-red-600 border-dashed rounded-full cursor-pointer h-7 w-7 hover:bg-white hover:text-red-600 top-1 right-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg>
                            </div>
                            <!-- Photo Item IMAGE! -->
                        </div>
                        @endforeach
                    </div>


                    @endif


                </form>

                <section>
                    <div class="w-full">
                        <section id="main-carousel" class="splide rounded" aria-label="My Awesome Gallery">
                            <div class="splide__track">
                                <ul class="splide__list min-h-64">
                                    <li class="splide__slide">
                                        <div class="w-full h-full bg-contain bg-center bg-no-repeat"
                                            style="background-image: url('/img/test.jpg')">
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="w-full h-full bg-contain bg-center bg-no-repeat"
                                            style="background-image: url('/img/test2.jpg')">
                                        </div>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="w-full h-full bg-contain bg-center bg-no-repeat"
                                            style="background-image: url('/img/test3.jpg')">
                                        </div>
                                    </li>
                                    <li class="splide__slide rounded-md">
                                        <div class="w-full h-full bg-contain bg-center bg-no-repeat rounded-md"
                                            style="background-image: url('/img/test4.jpg')">
                                        </div>
                                        <img src="/img/test4.jpg" class="rounded-md" id="img-container" alt="">
                                    </li>

                                </ul>
                            </div>
                        </section>


                        <ul id="thumbnails" class="thumbnails">
                            <li class="thumbnail">
                                <img src="/img/test.jpg" class="rounded-md" alt="">
                            </li>
                            <li class="thumbnail">
                                <img src="/img/test2.jpg" class="rounded-md" alt="">
                            </li>
                            <li class="thumbnail">
                                <img src="/img/test3.jpg" class="rounded-md" alt="">
                            </li>
                            <li class="thumbnail flex justify-center items-center">
                                <img src="/img/test4.jpg" class="rounded-md" alt="">
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <x-modal name="confirm-image-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please
                enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input wire:model="password" id="password" name="password" type="password"
                    class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>