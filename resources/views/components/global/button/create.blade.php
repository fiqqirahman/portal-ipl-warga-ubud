<a href="{{ $route }}" type="button" {{ $attributes->merge(['class' => 'btn btn-primary me-3']) }}>
    <span class="svg-icon svg-icon-2">
        {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/arrows/arr075.svg') !!}
    </span>
    {{ $title }}
</a>