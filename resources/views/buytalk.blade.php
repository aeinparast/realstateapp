<x-public-layout title="مشاوره خرید ملک | هلدینگ سرمایه‌گذاری مهدوی">
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->

    <div class="w-full min-h-screen bg-mahdavi rounded pt-16 md:p-10 flex flex-col gap-8">
        <h1 class="text-white text-center text-8xl font-black ">مشاوره خرید</h1>
        <div class="w-full bg-white min-h-96 rounded-md grid grid-cols-8 grid-rows-1">
            <div class="col-span-8 md:col-span-4 flex flex-col p-4 ">
                <h3 class="text-mahdavi text-3xl font-black text-center ">با ما تنها نیستید!</h3>
                <p class="text-center text-lg">مجموعه هلدینگ سرمایه‌گذاری مهدوی با تیمی مجرب ضمن بررسی تمام نیازهای شما
                    در بازار
                    ملک، بهترین و
                    ارزنده‌ترین پیشنهادات را برای یک سرمایه گذاری موثر و موفق را برای شما فراهم میکند. هیچ ملکی در این
                    مجموعه تبلیغ نمیشود مگر آنکه از استانداردهای سخت‌گیرانه مشاوران ما عبور کند. باور داریم بهترین تبلیغ
                    برای هر مجموعه‌ای مشتریان راضی و خوشحال هستند.</p>
                <div class="flex justify-center gap-2 md:gap-4 md:text-xl pt-4">
                    <div class="">تلفن تماس:</div>
                    <a href="tel:{{env('HOLDIN_TELL')}}">{{env('HOLDIN_TELL_SHOW')}}</a>
                </div>
                <a href="/agents" target="_blank" rel="noopener noreferrer"
                    class="px-8 py-1 mt-3 text-lg font-bold text-center text-white transition-all rounded-sm cursor-pointer bg-mahdavi hover:ring-4 ring-mahdavi ring-offset-4">
                    ارتباط با مشاوران
                </a>
            </div>

            <div class="md:col-span-4 bg-cover bg-no-repeat rounded-l-md"
                style="background-image: url('/img/buy.avif')">
            </div>

        </div>
    </div>
</x-public-layout>