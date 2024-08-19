<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Assets') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="flex items-center justify-between p-6 text-gray-900 dark:text-gray-100">
          <div>
            {{ __("List of your Assets") }}
          </div>
          <a href="{{route('asset-create')}}" wire:navigate
            class="px-4 py-2 font-bold text-white transition-colors bg-blue-500 border border-transparent rounded hover:bg-transparent hover:border-blue-500 hover:text-blue-500 ">
            New Asset</a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>