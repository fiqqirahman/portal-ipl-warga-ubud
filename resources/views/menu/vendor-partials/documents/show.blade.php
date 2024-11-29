<div class="row">
    @foreach($documentsField as $field)
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <label for="{{ $field['id'] }}" class="fs-6 fw-semibold form-label mt-3 mb-0">
                    <span class="{{ ($field['is_required']) ? 'has_required_label' : '' }}">{{ $field['label'] }}</span>
                    @if($field['old_value'])
                        @php
                            $additionalInfo = $field['old_value']['additional_info'];
                        @endphp
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-bs-html="true"
                           title="{{ $additionalInfo->original_name . '.' . $additionalInfo->extension . ' <b>(' . convertToReadableSize($additionalInfo->size) . ')</b>' }}"></i>
                    @endif
                </label>
                @if($field['old_value'])
                    <a target="_blank" href="{{ \Illuminate\Support\Facades\Storage::url($field['old_value']['path']) }}" class="text-primary mt-3">Download</a>
                @endif
            </div>
            <input type="file" accept="{{ implode(',', array_map(fn($item) => '.' . $item, $field['allowed_file_types'])) }}"
                   class="form-control @error($field['name']) is-invalid @enderror {{ (empty($field['old_value']) && $field['is_required']) ? 'has_required_input' : '' }}"
                   name="{{ $field['name'] }}" id="{{ $field['id'] }}"
                   disabled />
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
