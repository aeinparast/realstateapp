<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    @if (!$cities->isEmpty())
    @foreach ($cities as $city)
    {{ $city->name }}
    @endforeach
    @else
    <h2 class="text-center text-4xl font-medium text-slate-700">در این زمان چیزی برای نمایش وجود ندارد</h2>
    @endif
</div>