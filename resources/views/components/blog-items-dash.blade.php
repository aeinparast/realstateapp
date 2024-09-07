<div class="w-full">
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="flex flex-col justify-center w-full gap-2">
        @foreach ($blogs as $blog)
        <div
            class="flex justify-between gap-2 px-2 py-4 transition-transform border-2 rounded border-mahdavi hover:border-dashed hover:scale-95">
            <div class="flex gap-2">
                <div class="w-20 h-20 bg-center bg-no-repeat bg-cover rounded"
                    style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$post['logo']}}'">
                </div>
                <div class="flex flex-col justify-between">
                    <div class="">{{ $post['title'] }} -
                        <div class="flex gap-2 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-geo-alt-fill text-mahdavi" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                            </svg>ساخته شده در: {{$asset['created_at']->locale('fa')->diffForHumans()}} - آخرین
                            بروزرسانی: {{$asset['created_at']->locale('fa')->diffForHumans()}}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-between ">
                    <a href="" class="text-sm text-white ">
                        <button class="w-full px-2 bg-green-500 rounded">
                            انتشار
                        </button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>