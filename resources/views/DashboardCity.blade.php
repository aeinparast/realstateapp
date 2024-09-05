<x-app-layout>
    <!-- It is never too late to be what you might have been. - George Eliot -->
    <x-slot name="header">
        <h2 class="font-sans text-xl font-medium text-gray-800 dark:text-gray-200">
            <a href="{{route('city.index')}}" wire:navigate class="transition-colors hover:text-gray-400">مدیریت
                شهرها</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-200 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex items-center justify-between p-6 text-gray-900 bg-white shadow dark:text-gray-100">
                    <div>
                        لیست تمام شهرها
                    </div>
                    <a href="{{route('city.create')}}"
                        class="text-center text-white transition-colors bg-blue-500 border-2 border-transparent rounded sm:px-4 sm:py-2 sm:font-bold hover:bg-transparent hover:border-blue-500 hover:text-blue-500 ">
                        شهر جدید</a>
                </div>
                @if (session('success'))
                <div
                    class="flex items-center justify-between p-6 bg-green-500 border-2 rounded mt-2 text-gray-900  shadow dark:text-gray-100">
                    <div>
                        <div class="text-white font-bold">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
                @endif
                @if (session('edited'))
                <div
                    class="flex items-center justify-between p-6 bg-blue-500 border-2 rounded mt-2 text-gray-900  shadow dark:text-gray-100">
                    <div>
                        <div class="text-white font-bold">
                            {{ session('edited') }}
                        </div>
                    </div>
                </div>
                @endif
                @if (session('removed'))
                <div
                    class="flex items-center justify-between p-6 bg-red-500 border-2 rounded mt-2 text-gray-900  shadow dark:text-gray-100">
                    <div>
                        <div class="text-white font-bold">
                            {{ session('removed') }}
                        </div>
                    </div>
                </div>
                @endif
                <div class="w-full p-4 mt-2">
                    <ul class="flex flex-col gap-4">
                        @foreach ($cities as $city)
                        <li
                            class="flex items-center justify-between px-2 py-1 bg-white border-b rounded shadow border-b-mahdavi">
                            <div class="">
                                <p class="font-medium">{{$city->name}} - {{ $city->assets_count }} ملک</p>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{route('city.edit', $city->id)}}"
                                    class="px-2 py-1 font-medium text-white transition-colors bg-green-500 rounded hover:bg-green-600">مدیریت</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>