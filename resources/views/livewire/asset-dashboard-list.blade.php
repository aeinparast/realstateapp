<div class="flex flex-col gap-2 w-full">
    @foreach ($assets as $asset)
    <div class="w-full border px-2 py-4">{{ $asset['title'] }}</div>
    @endforeach
</div>