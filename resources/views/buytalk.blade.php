<x-public-layout title="مشاوره خرید ملک | عمارت آریا">
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->

    <div class="flex flex-col w-full min-h-screen gap-8 pt-16 rounded bg-brand md:p-10">
        <h1 class="font-black text-center text-white text-8xl ">مشاوره خرید</h1>
        <div class="grid w-full grid-cols-8 grid-rows-1 bg-white rounded-md min-h-96">
            <div class="flex flex-col col-span-8 p-4 md:col-span-4 ">
                <h3 class="text-3xl font-black text-center text-brand ">با ما تنها نیستید!</h3>
                <p class="text-lg text-center">مجموعه عمارت آریا با تیمی مجرب ضمن بررسی تمام نیازهای شما
                    در بازار
                    ملک، بهترین و
                    ارزنده‌ترین پیشنهادات را برای یک سرمایه گذاری موثر و موفق را برای شما فراهم میکند. هیچ ملکی در این
                    مجموعه تبلیغ نمیشود مگر آنکه از استانداردهای سخت‌گیرانه مشاوران ما عبور کند. باور داریم بهترین تبلیغ
                    برای هر مجموعه‌ای مشتریان راضی و خوشحال هستند.</p>
                <div class="flex justify-center gap-2 pt-4 md:gap-4 md:text-xl">
                    <div class="">تلفن تماس:</div>
                    <a href="tel:{{env('HOLDIN_TELL')}}">{{env('HOLDIN_TELL_SHOW')}}</a>
                </div>
                <a href="/agents" target="_blank" rel="noopener noreferrer"
                    class="px-8 py-1 mt-3 text-lg font-bold text-center text-white transition-all rounded-sm cursor-pointer bg-brand hover:ring-4 ring-brand ring-offset-4">
                    ارتباط با مشاوران
                </a>
            </div>

            <div class="bg-no-repeat bg-cover md:col-span-4 rounded-l-md"
                style="background-image: url('/img/buy.avif')">
            </div>

        </div>
    </div>
</x-public-layout>