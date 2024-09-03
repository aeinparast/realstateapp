<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('ساخت کاربر') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="mt-2 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">

                <div class="grid grid-cols-1 gap-6 p-6 text-gray-900 md:grid-cols-2 dark:text-gray-100">
                    <form class="w-full" wire:submit='update' wire:confirm='آیا از ثبت اطمینان دارید؟'>
                        <div>
                            <div class="flex flex-wrap mb-6 -mx-3">
                                <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                        for="name">
                                        نام کاربر
                                    </label>
                                    <input wire:model='name' class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white
                                        @error('name')
                                            border-red-500
                                        @enderror
                                        " id="name" type="text">
                                    {{-- <p class="text-xs italic text-red-500">خواهشمندیم این فیلد را پر کنید.</p> --}}
                                </div>
                                <div class="w-full px-3 md:w-1/2">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                        for="email">
                                        ایمیل
                                    </label>
                                    <input wire:model='email' class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500
                                                                     @error('name')
                                                                    border-red-500
                                                                     @enderror" id="email" type="email">
                                </div>

                                <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                        for="role">
                                        نوع
                                    </label>
                                    <div class="relative">
                                        <select wire:model='role'
                                            class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="role">
                                            <option value="1">مشاور</option>
                                            <option value="2">نویسنده</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="">
                            <x-action-message class="me-3" on="user-updated">
                                {{ __('ذخیره شد.') }}
                            </x-action-message>
                        </div>

                        <button type="submit"
                            class="w-full px-4 py-2 font-bold text-white transition-colors bg-blue-500 rounded hover:bg-blue-400">ثبت</button>
                </div>

                </form>

                <form wire:submit='updatePassword' wire:confirm='آیا از ثبت اطمینان دارید؟'>
                    <div class="">
                        <div class="w-full px-3 md:w-1/2">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="password">
                                رمزعبور
                            </label>
                            <input wire:model='password'
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="password" type="password">
                        </div>
                        <div class="w-full px-3 md:w-1/2">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="password_confirmation">
                                تکرار رمز عبور
                            </label>
                            <input
                                class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="password_confirmation" wire:model="password_confirmation" type="password">
                            <button type="submit"
                                class="w-full px-4 py-2 mt-4 font-bold text-white transition-colors bg-blue-500 rounded hover:bg-blue-400">ثبت</button>
                            <div class="">
                                <x-action-message class="me-3" on="user-password-updated">
                                    {{ __('ذخیره شد.') }}
                                </x-action-message>
                            </div>
                        </div>

                    </div>
                </form>


            </div>
        </div>
    </div>

</div>
</div>