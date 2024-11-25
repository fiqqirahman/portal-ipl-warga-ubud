<div class="row">
    @foreach($documentsField as $field)
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="row">
                <div class="col-md-{{ $field['old_value'] ? '6' : '12' }}">
                    <label for="{{ $field['id'] }}" class="fs-6 fw-semibold form-label mt-3">
                        <span class="{{ ($field['is_required']) ? 'has_required_label' : '' }}">{{ $field['label'] }}</span>
                        @if($field['old_value'])
                            @php
                                $additionalInfo = $field['old_value']['additional_info'];
                            @endphp
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-bs-html="true"
                               title="{{ $additionalInfo->original_name . '.' . $additionalInfo->extension . ' <b>(' . convertToReadableSize($additionalInfo->size) . ')</b>' }} "></i>
                        @endif
                    </label>
                </div>
                @if($field['old_value'])
                    <div class="col-md-6 text-md-end">
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <a href="{{ \Illuminate\Support\Facades\Storage::url($field['old_value']['path']) }}">Download</a>
                            <a href="#"
                               data-field-name="{{ $field['label'] }}"
                               data-route="{{ route('menu.registrasi-vendor.remove-document', ['dokumen_vendor' => enkrip($field['old_value']['id'])]) }}"
                               class="text-danger btn-remove-document">Hapus</a>
                        </label>
                    </div>
                @endif
            </div>
            <input type="file" accept="{{ implode(',', array_map(fn($item) => '.' . $item, $field['allowed_file_types'])) }}"
                   class="form-control @error($field['name']) is-invalid @enderror {{ (empty($field['old_value']) && $field['is_required']) ? 'has_required_input' : '' }}"
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