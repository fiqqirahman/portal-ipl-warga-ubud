<div class="row">
    @foreach($documentsField as $field)
        <div class="col-md-3 col-sm-12 mb-4">
            <label for="{{ $field['id'] }}" class="fs-6 fw-semibold form-label mt-3">
                <span class="{{ $field['is_required'] ? 'has_required_label' : '' }}">{{ $field['label'] }}</span>
            </label>
            <input type="file" accept="{{ implode(',', array_map(fn($item) => '.' . $item, $field['allowed_file_types'])) }}"
                   class="form-control @error($field['name']) is-invalid @enderror {{ $field['is_required'] ? 'has_required_input' : '' }}"
                   onchange="onDocumentChange(this, '{{ implode(',', $field['allowed_file_types']) }}', '{{ $field['max_file_size'] }}')"
                   name="{{ $field['name'] }}" id="{{ $field['id'] }}" />
            @if (!$errors->has($field['name']))
                <div class="row text-success mt-2" style="font-size: 12px">
                    <div class="col-6">
                        <span class="text-black">Format :</span> {{ strtoupper(implode(', ', $field['allowed_file_types'])) }}
                    </div>
                    <div class="col-6 text-end">
                        <span class="text-black">Max :</span> {{ convertToReadableSize($field['max_file_size'] * 1024) }}
                    </div>
                </div>
            @else
                @error($field['name'])
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            @endif
        </div>
    @endforeach
</div>