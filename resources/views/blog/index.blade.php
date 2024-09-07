<x-app-layout>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    <x-slot name="header">
        <h2 class="text-xl font-medium text-gray-800 dark:text-gray-200">
            پست‌های وبلاگ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg mb-4">
                <div class="flex items-center justify-between p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        لیست پست‌هایی که به آن دسترسی دارید
                    </div>
                    <a href="{{route('blog.create')}}" wire:navigate
                        class="px-4 py-2 font-bold text-white transition-colors bg-blue-500 border-2 border-transparent rounded hover:bg-transparent hover:border-blue-500 hover:text-blue-500 ">
                        پست جدید</a>
                </div>
            </div>
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col items-center justify-between p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col justify-center w-full gap-2">
                        @foreach ($blogs as $post)
                        <div
                            class="flex justify-between gap-2 px-2 py-4 transition-transform border-2 rounded border-mahdavi hover:border-dashed hover:scale-95">
                            <div class="flex gap-2 justify-between">
                                <div class="w-20 h-20 bg-center bg-no-repeat bg-cover rounded"
                                    style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$post['logo']}}'">
                                </div>
                                <div class="flex flex-col justify-between">
                                    <a href="/blog/{{$post['id']}}" target="__blank" class="">{{ $post['title'] }}
                                    </a>
                                    <div class="flex gap-2 text-xs">ساخته شده در:
                                        {{$post['created_at']->locale('fa')->diffForHumans()}}
                                        - آخرین
                                        بروزرسانی: {{$post['updated_at']->locale('fa')->diffForHumans()}}
                                    </div>
                                </div>

                            </div>
                            <div class="flex items-center text-white">
                                <a href="" class="text-sm text-white ">
                                    <a href="{{route('blog.edit',$post->id)}}" class="w-full px-2 bg-green-500 rounded">
                                        ویرایش
                                    </a>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $blogs->links() }}
                </div>
            </div>
            <ul>

            </ul>
        </div>
    </div>
</x-app-layout>