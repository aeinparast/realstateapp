<x-app-layout>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <form id="blog-submit" method="POST" action="{{route('blog.update', $blog->id)}}" class="min-h-screen">
        @csrf
        @method('PUT')
        <textarea name="content" id="blogpost" hidden class="!hidden"></textarea>
        <div class="text-center">
            <label for="heading">عنوان</label>
            <input class="rounded outline-none w-96 border-brand focus-within:ring focus-within:ring-brand" type="text"
                id="title" name="title" value="{{$blog['title']}}" />
            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">آپلود عکس
            </x-primary-button>
        </div>

        <div id="editorjs"></div>

        <div class="flex justify-center w-full gap-2 ">
            <select name="public" id="public">
                <option value="0" {{ $blog->public == 0 ? 'selected' : '' }}>پیش‌نویس</option>
                <option value="1" {{ $blog->public == 1 ? 'selected' : '' }}>انتشار</option>
            </select>
            <button id="save-button" type="button"
                class="px-2 py-1 text-white transition-transform bg-blue-500 rounded hover:scale-95">ذخیره</button>
            <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')">حذف پست
            </x-danger-button>
        </div>
    </form>
    <form action="{{route('blog.update', $blog->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex justify-center w-full my-2">
            <div class="flex flex-col max-w-md gap-4 text-center">
                <label for="image"
                    class="px-2 text-white bg-yellow-600 border border-yellow-600 rounded cursor-pointer">
                    برای تغییر بنر کلیک کنید
                </label>
                <input type="file" name="image" id="image" hidden onchange="previewImage(event)" accept="image/*">
                <img class="w-full h-auto" src="" alt="" id="image-preview">
                <button id="image-preview_btn" type="submit"
                    class="hidden px-2 py-1 text-white transition-transform bg-blue-500 rounded hover:scale-95">ذخیره</button>
            </div>
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
            <div class="flex justify-end mt-6">
                <x-secondary-button x-on:click="$dispatch('close')">
                    بازگشت
                </x-secondary-button>

                <x-danger-button type="submit" class="ms-3">
                    پاکسازی
                </x-danger-button>
            </div>
        </form>
    </x-modal>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                var save_btn=document.getElementById('image-preview_btn');
                output.src = reader.result;
                output.style.display = 'block';
                save_btn.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>