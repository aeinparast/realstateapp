<x-app-layout>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <div class="mt-2 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">

        <form class="w-full" method="POST" action="{{ route('city.update',$city->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 text-gray-900  dark:text-gray-100">
                <div>
                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="name">
                                نام شهر
                            </label>
                            <input
                                class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200  border-none rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="name" name="name" type="text" value="{{$city->name}}" required>
                            @error('name')
                            <p class="text-xs italic text-red-500">خواهشمندیم نام شهر را وارد کنید</p>
                            @enderror
                        </div>
                        <div class="w-full px-3 md:w-1/2">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="map">
                                مختصات جغرافیایی
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="map" name="map" type="text" value="{{$city->name}}" required>
                            @error('map')
                            <p class="text-xs italic text-red-500">خواهشمندیم مختصات شهر را وارد کنید</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center w-full gap-4 ">
                        <label for="image"
                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">برای انتخاب تصویر کلیک کنید</span> یا درگ و دراپ کنید</p>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">عکس باید در قابل یک مربع باشد
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">WEBP, PNG, JPG (MAX. 2MB)</p>
                            </div>
                            <input id="image" name="image" type="file" class="hidden" accept="image/*"
                                onchange="previewImage(event)" />
                        </label>
                        <button type="submit"
                            class="w-full px-4 py-2 font-bold text-white transition-colors bg-blue-500 rounded hover:bg-blue-400">ثبت</button>
                    </div>

                </div>
                <div class="flex flex-wrap">
                    <img id="image-preview" class="max-w-72" src="#" alt="Image Preview"
                        style="display: none; max-height: 250px;" />
                    <img id="" src="{{env('BUCKET_FULL_URL').'/'.$city->logo}}" alt="Image Preview"
                        style=" max-height: 250px;" />

                </div>
        </form>
        <form method="POST" action="{{route('city.destroy', $city->id)}}" id="delete-form">
            @csrf
            @method('DELETE')
            <button
                class="bg-red-500 w-full border-2 border-red-500 text-white py-2 font-bold rounded hover:border-dashed hover:bg-white hover:text-red-500"
                type="button" onclick="confirmDelete()">حذف
                شهر!</button>
        </form>

    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function confirmDelete() {
        // Ask for confirmation
        if (confirm('آیا از حذف شهر و تمام آگهی‌های آن اطمینان دارید؟')) {
            // If confirmed, submit the form
            document.getElementById('delete-form').submit();
        }
    }
    </script>
</x-app-layout>