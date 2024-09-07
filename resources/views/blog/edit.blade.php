<x-app-layout>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <form id="blog-submit" method="POST" action="{{route('blog.store')}}" class="min-h-screen">
        @csrf
        <textarea name="content" id="blogpost" hidden class="!hidden"></textarea>
        <div class="text-center">
            <label for="heading">عنوان</label>
            <input class="rounded w-96 border-mahdavi outline-none focus-within:ring focus-within:ring-mahdavi"
                type="text" id="title" name="title" value="{{$blog['title']}}" />
            <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">آپلود عکس
            </x-danger-button>
        </div>

        <div id="editorjs"></div>
        <div class="w-full flex justify-center">
            <button id="save-button" type="button"
                class="bg-blue-500 text-white px-2 py-1 rounded hover:scale-95 transition-transform">ثبت و
                انشار</button>
        </div>
    </form>
    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <livewire:image-upload-component />
    </x-modal>
</x-app-layout>