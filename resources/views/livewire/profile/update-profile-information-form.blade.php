<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $mobile = '';
    public string $telegram='';
    public string $instagram = '';
    public string $whatsup = '';
    public string $bale = '';
    public string $eta = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;
        $this->mobile = Auth::user()->mobile;
        $this->instagram = Auth::user()->instagram;
        $this->telegram = Auth::user()->telegram;
        $this->whatsup = Auth::user()->whatsup;
        $this->bale = Auth::user()->bale;
        $this->eta = Auth::user()->eta;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'phone'=>['string', 'max:15'],
            'mobile'=>['string', 'max:15'],
            'telegram'=>['string', 'max:15'],
            'instagram'=>[ 'string', 'max:30'],
            'whatsup'=>[ 'string', 'max:15'],
            'bale'=>[ 'string', 'max:30'],
            'eta'=>[ 'string', 'max:30'],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            اطلاعات اکانت
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            بروزرسانی اطلاعات پروفایل شما
        </p>
        <p class="text-red-500">شماره و آیدی باید با کیبورد اینگلیسی وارد شود!</p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('نام')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="phone" :value="__('تلفن ثابت')" />
            <x-text-input wire:model="phone" id="phone" name="phone" type="text" class="mt-1 block w-full" autofocus
                placeholder="شماره را با اعداد کیبورد اینگلیسی وارد کنید(فارسی نمایش داده خواهد شد)" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div>
            <x-input-label for="mobile" :value="__('تلفن همراه')" />
            <x-text-input wire:model="mobile" id="mobile" name="mobile" type="text" class="mt-1 block w-full" autofocus
                placeholder="شماره را با اعداد کیبورد اینگلیسی وارد کنید(فارسی نمایش داده خواهد شد)" />
            <x-input-error class="mt-2" :messages="$errors->get('mobile')" />
        </div>
        <div>
            <x-input-label for="instagram" :value="__('آیدی اینستاگرام')" />
            <x-text-input wire:model="instagram" id="instagram" name="instagram" type="text" class="mt-1 block w-full"
                autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
        </div>
        <div>
            <x-input-label for="telegram" :value="__('آیدی تلگرام')" />
            <x-text-input wire:model="telegram" id="telegram" name="telegram" type="text" class="mt-1 block w-full"
                autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('telegram')" />
        </div>
        <div>
            <x-input-label for="whatsup" :value="__('شماره واتس‌آپ')" />
            <x-text-input wire:model="whatsup" id="whatsup" name="whatsup" type="text" class="mt-1 block w-full"
                autofocus placeholder="شماره با کد کشور و بدون علامت بعلاوه" />
            <x-input-error class="mt-2" :messages="$errors->get('whatsup')" />
        </div>
        <div>
            <x-input-label for="bale" :value="__('آیدی بله')" />
            <x-text-input wire:model="bale" id="bale" name="bale" type="text" class="mt-1 block w-full" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('bale')" />
        </div>
        <div>
            <x-input-label for="eta" :value="__('آیدی ایتا')" />
            <x-text-input wire:model="eta" id="eta" name="eta" type="text" class="mt-1 block w-full" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('eta')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('ایمیل')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required
                autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !
            auth()->user()->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                    {{ __('ایمیل شما تایید نشده است!') }}

                    <button wire:click.prevent="sendVerification"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('برای ارسال دوباره ایمیل کلیک کنید') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('یک لینک فعال سازی برای شما ارسال شده.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('بروزرسانی') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('ذخیره شد.') }}
            </x-action-message>
        </div>
    </form>
</section>