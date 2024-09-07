<x-app-layout>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <form id="blog-submit" method="POST" action="{{route('blog.update', $blog->id)}}" class="min-h-screen">
        @csrf
        @method('PUT')
        <textarea name="content" id="blogpost" hidden class="!hidden"></textarea>
        <div class="text-center">
            <label for="heading">عنوان</label>
            <input class="rounded w-96 border-mahdavi outline-none focus-within:ring focus-within:ring-mahdavi"
                type="text" id="title" name="title" value="{{$blog['title']}}" />
            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">آپلود عکس
            </x-primary-button>
        </div>

        <div id="editorjs"></div>
        <div class="w-full flex justify-center gap-2">
            <select name="public" id="public">
                <option value="0">پیش‌نویس</option>
                <option value="1">انتشار</option>
            </select>
            <button id="save-button" type="button"
                class="bg-blue-500 text-white px-2 py-1 rounded hover:scale-95 transition-transform">ذخیره</button>
            <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')">حذف پست
            </x-danger-button>
        </div>
    </form>
    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <livewire:image-upload-component />
    </x-modal>
    <x-modal name="confirm-post-deletion" :show="$errors->isNotEmpty()" focusable>
        <form action="{{route('blog.destroy',$blog->id)}}" method="POST" class="p-6">
            @csrf
            @method("DELETE")
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                آیا از حذف این پست اطمینان دارید؟
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                این کار قابل بازگشت نیست! </p>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    بازگشت
                </x-secondary-button>

                <x-danger-button type="submit" class="ms-3">
                    پاکسازی
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>