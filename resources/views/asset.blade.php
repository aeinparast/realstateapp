<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-medium text-gray-800 dark:text-gray-200">
      فایل‌ها
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg mb-4">
        <div class="flex items-center justify-between p-6 text-gray-900 dark:text-gray-100">
          <div>
            لیست فایل‌هایی که به آن دسترسی دارید.
          </div>
          <a href="{{route('asset-create')}}" wire:navigate
            class="px-4 py-2 font-bold text-white transition-colors bg-blue-500 border-2 border-transparent rounded hover:bg-transparent hover:border-blue-500 hover:text-blue-500 ">
            فایل جدید</a>
        </div>
      </div>
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="flex items-center justify-between p-6 text-gray-900 dark:text-gray-100">
          <livewire:asset-dashboard-list>
        </div>
      </div>
      <ul>

      </ul>
    </div>
  </div>
</x-app-layout>