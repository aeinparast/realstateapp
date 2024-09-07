<div class="p-6">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        آپلود عکس
    </h2>
    <form wire:submit='uploadImage' class="flex flex-col items-center justify-center w-full gap-4 ">
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">برای
                        آپلود کلیک کنید</span> یا فایل را در اینجا بکشید</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">WEBP, PNG, JPG (بیشترین حجم: ۲ مگابایت)
                </p>
                <p>عکس ها مستطیل باشند!</p>
                <div wire:loading wire:target="file">درحال آپلود...</div>
            </div>
            <input wire:model='file' id="dropzone-file" type="file" class="hidden" />
        </label>
        @if ($file)
        <div class="flex flex-row justify-between w-full h-64 gap-4 p-2 border-2 border-gray-300 border-dashed rounded">
            <div class="">
                <img src="{{$file->temporaryUrl()}}" class="w-full h-full rounded" alt="temporary image for preview">
            </div>
            <div class="flex flex-col items-center justify-center w-1/2 gap-4 p-4">
                <p class="text-center">لطفا عکس رو تایید کنید.</p>
                <button type="submit"
                    class="flex items-center justify-center w-full h-12 gap-4 px-4 py-2 text-white bg-blue-500 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708z" />
                        <path
                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                    </svg>
                    <div>آپلود</div>
                </button>
                <button type="button" wire:click='deleteFile' wire:confirm='Are You sure?'
                    class="flex items-center justify-center w-full h-12 gap-4 px-4 py-2 text-white bg-red-500 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-trash3" viewBox="0 0 16 16">
                        <path
                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                    </svg>
                    <div>حذف</div>
                </button>
            </div>
        </div>
        @endif

        <div class="mt-6 w-full flex
        @if ($fileUrl=='')
        !hidden
        @endif
        ">
            <x-input-label for="fileUrl" value="{{ __('آدرس فایل') }}" class="sr-only" />
            <x-text-input wire:model='fileUrl' id="fileUrl" name="fileUrl" type="text" class="mt-1 block w-3/4"
                placeholder="آدرس فایل" />
            <x-input-error :messages="$errors->get('file')" class="mt-2" />
            <button type="button" class="ms-3" id="copyButton">
                کپی آدرس
            </button>
        </div>




    </form>

    <div class="mt-6 flex justify-end">
        <x-secondary-button x-on:click="$dispatch('close')">
            بازگشت
        </x-secondary-button>

    </div>
    <script>
        document.getElementById('copyButton').addEventListener('click', function() {
            // Get the input field
            var fileUrl = document.getElementById('fileUrl');
    
            // Select the text in the input field (optional, if you want to highlight it)
            fileUrl.select();
            fileUrl.setSelectionRange(0, 99999); // For mobile devices
    
            // Copy the text inside the input to the clipboard
            navigator.clipboard.writeText(fileUrl.value).then(function() {
                alert('آدرس فایل کپی شد. میتوانید آن را در مکان مناسب در پست بچسبانید.'); // Alert the user that the text was copied
            }).catch(function(error) {
                console.error('Failed to copy text: ', error); // Handle any errors
            });
        });
    </script>
</div>