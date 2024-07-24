<script>
    $(document).ready(function() {
        @if (session()->has('alert.status') && session()->has('alert.message'))
            show_alert_dialog(`{{ session('alert.status') }}`, `{{ session('alert.message') }}`);
        @endif

        @if ($errors->any())
            let message = ''
            @if(count($errors->all()) === 1)
                message = '{{ $errors->all()[0] }}'
            @else
                message = `
                    <ul">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>`;
            @endif

            show_alert_dialog('error', message);
        @endif
    });

    function show_alert_dialog(status, message) {
        if (!(typeof message === 'string' || message instanceof String)) {
            message = message.responseText;
        }

        if(message.length === 0) {
            message = 'Empty Message!'
        }

        if (status === '00' || status === 'success') {
            Swal.fire({
                title: 'Berhasil',
                html: message,
                icon: 'success',
            });
        } else if (status === '000' || status === 'info') {
            Swal.fire({
                title: 'Info',
                html: message,
                icon: 'info',
            });
        } else if(status === '01' || status === 'warning') {
            Swal.fire({
                title: 'Peringatan',
                html: message,
                icon: 'warning',
            });
        } else if(status === 'error') {
            Swal.fire({
                title: 'Proses Gagal',
                html: message,
                icon: 'error',
            });
        } else {
            Swal.fire(message);
        }
    }
</script>
