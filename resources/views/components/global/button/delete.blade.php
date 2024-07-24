<button type="button"
        data-route="{{ $route }}"
        data-title="{{ !isset($buttonAttributes['title']) ? 'Anda Yakin?' : $buttonAttributes['title'] }}"
        data-text="{{ !isset($buttonAttributes['text']) ? 'Ingin menghapus data ini?' : $buttonAttributes['text'] }}"
    {{ $attributes->merge(['class' => 'btn btn-sm btn-danger me-2 btn-global-delete-data-table']) }}>
    {{ $title ?? 'Hapus' }}
</button>