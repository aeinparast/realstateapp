<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('کاربران') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between p-6 text-gray-900 dark:text-gray-100 bg-white shadow">
                    <div>
                        لیست تمام مشاوران و نویسندگان
                    </div>
                    <a href="{{route('admin-users-create')}}" wire:navigate
                        class="sm:px-4 sm:py-2 sm:font-bold text-white text-center transition-colors bg-blue-500 border-2 border-transparent rounded hover:bg-transparent hover:border-blue-500 hover:text-blue-500 ">
                        کاربر جدید</a>
                </div>

                <div class="mt-2 w-full p-4">
                    <ul class="flex flex-col gap-4">
                        @foreach ($users as $user)
                        <li
                            class="shadow px-2 py-1 border-b border-b-mahdavi rounded bg-white flex justify-between items-center">
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
                                    class="bg-green-500 rounded text-white px-2 py-1 font-medium hover:bg-green-600 transition-colors">ویرایش</button>
                                <button
                                    class="bg-red-500 rounded text-white px-2 py-1 font-medium hover:bg-red-600 transition-colors">حذف</button>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>