<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            انتخاب عکس پروفایل
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            از این بخش میتوانید یک عکس پروفایل جدید انتخاب کنید. عکس حتما چهارچوب مربع داشته باشد! </p>
    </header>

    <form wire:submit="updatePfp" class="mt-6 space-y-6">
        <div>
            <x-input-label for="pfp" :value="__('عکس جدید')" />
            <input type="file" name="pfp" id="pfp" wire:model='file'>
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>
        @if ($pfp==null || $pfp=='')
        <div class="w-20 h-20  rounded-full bg-contain bg-center bg-no-repeat"
            style="background-image: url('/img/logo.webp');"></div>
        @else
        <div class="w-20 h-20  rounded-full bg-contain bg-center bg-no-repeat"
            style="background-image: url('https://mahdavi.storage.iran.liara.space/{{$pfp}}');"></div>
        @endif

        @if ($file)
        <div class="w-20 h-20  rounded-full bg-contain bg-center bg-no-repeat"
            style="background-image: url('{{$file->temporaryUrl()}}');"></div>
        @endif



        <div class="flex items-center gap-4">
            @if ($file)
            <x-primary-button>{{ __('بروزرسانی') }}</x-primary-button>
            @endif

            <x-action-message class="me-3" on="password-updated">
                {{ __('انجام شد.') }}
            </x-action-message>
        </div>
    </form>
</section>