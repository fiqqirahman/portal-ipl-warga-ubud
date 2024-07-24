<a href="{{ $route }}" {{ $attributes->merge(['class' => 'btn btn-'. $color .' btn-sm']) }}>
    {{ $title ?? 'Detail' }}
</a>