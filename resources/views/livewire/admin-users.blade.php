<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('کاربران') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-200 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex items-center justify-between p-6 text-gray-900 bg-white shadow dark:text-gray-100">
                    <div>
                        لیست تمام مشاوران و نویسندگان
                    </div>
                    <a href="{{route('admin-users-create')}}" wire:navigate
                        class="text-center text-white transition-colors bg-blue-500 border-2 border-transparent rounded sm:px-4 sm:py-2 sm:font-bold hover:bg-transparent hover:border-blue-500 hover:text-blue-500 ">
                        کاربر جدید</a>
                </div>

                <div class="w-full p-4 mt-2">
                    <ul class="flex flex-col gap-4">
                        @foreach ($users as $user)
                        <li
                            class="flex items-center justify-between px-2 py-1 bg-white border-b rounded shadow border-b-mahdavi">
                            <div class="">
                                <p class="font-medium">{{$user->name}}</p>
                                <div class="text-sm text-gray-600">
                                    @if ($user->role==1)
                                    نقش: مشاور
                                    @else
                                    نقش: نویسنده
                                    @endif
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button wire:click='goToUpdatePage({{$user->id}})'
                                    class="px-2 py-1 font-medium text-white transition-colors bg-green-500 rounded hover:bg-green-600">مدیریت</button>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>