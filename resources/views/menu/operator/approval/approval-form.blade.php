<div class="row mb-7">
    <div class="col-12">
        <div class="card card-flush h-lg-100">
            <div class="card-header pt-7">
                <div class="card-title">
                        <span class="svg-icon svg-icon-1 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    <h2>Update Status Registrasi Vendor</h2>
                </div>
            </div>
            <div class="card-body pt-5">
                <form action="{{ route('menu.operator.registrasi-vendor.submit', ['registrasi_vendor' => enkrip($registrasiVendor->id)]) }}"
                      id="form-approve"  method="POST">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-sm-12 mb-4">
                            <span class="fs-6 fw-semibold">Status Sekarang :</span> {!!  $registrasiVendor->status_registrasi->badge() !!}
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-sm-12 mb-4">
                            <label class="fs-6 fw-semibold form-label mt-3" for="status_registrasi">
                                <span class="required">Status</span>
                            </label>
                            <select required data-control="select2" @if(!allowUpdateStatusRegistrasi($registrasiVendor)) disabled @endif
                                    class="form-control form-select @error('status_registrasi') is-invalid @enderror @if(!allowUpdateStatusRegistrasi($registrasiVendor)) form-control-solid @endif"
                                    name="status_registrasi" id="status_registrasi">
                                @foreach($availableStatus as $status)
                                    <option value="{{ $status->value }}" {{ $status->value == $registrasiVendor->status_registrasi->value ? 'selected' : '' }}>
                                        {{ $status->label() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status_registrasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center" id="div-notes">
                        <div class="col-md-6 col-sm-12 mb-4">
                            <label class="fs-6 fw-semibold form-label mt-3" for="status_registrasi_notes">
                                <span>Catatan</span>
                            </label>
                            <textarea class="form-control @error('status_registrasi_notes') is-invalid @enderror @if(!allowUpdateStatusRegistrasi($registrasiVendor)) form-control-solid @endif"
                                      @if(!allowUpdateStatusRegistrasi($registrasiVendor)) disabled @endif
                                      rows="4" maxlength="3000" name="status_registrasi_notes"
                                      id="status_registrasi_notes">{{ old('notes', $registrasiVendor->status_registrasi_notes) }}</textarea>
                            @error('status_registrasi_notes')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center" id="div-appointment-date" style="display: none">
                        <div class="col-md-6 col-sm-12 mb-4">
                            <label class="fs-6 fw-semibold form-label mt-3" for="appointment_date">
                                <span class="required">Janji Bertemu</span>
                            </label>
                            <div class="input-group">
                                <input class="form-control @error('appointment_date') is-invalid @enderror @if(!allowUpdateStatusRegistrasi($registrasiVendor)) form-control-solid @endif"
                                       @if(!allowUpdateStatusRegistrasi($registrasiVendor)) disabled @endif
                                       type="text" required placeholder="YYYY-MM-DD HH:MM" value="{{ substr(old('appointment_date', $registrasiVendor->appointment_date), 0, 16)  }}"
                                       id="appointment_date" name="appointment_date"/>
                                <label class="input-group-append" for="appointment_date">
                                    <span class="input-group-text fa fa-calendar" style="border-radius:0; border-bottom-right-radius: 4px !important; border-top-right-radius: 4px !important;"/>
                                </label>
                                @error('appointment_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @if(allowUpdateStatusRegistrasi($registrasiVendor))
                        <div class="row">
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Status
                                </button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#status_registrasi').on('change', function (){
            if($(this).val() === '{{ \App\Enums\StatusRegistrasiEnum::VerificationDocuments->value }}'){
                $('#appointment_date').attr('required', true)
                $('#div-appointment-date').show()
            } else {
                $('#appointment_date').attr('required', false)
                $('#div-appointment-date').hide()
            }
        }).trigger('change')

        const localeDateFormat = {
            format: "YYYY-MM-DD HH:mm",
            monthNames: [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
            ],
        }

        $('#appointment_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            autoUpdateInput: false,
            minDate: new Date(),
            autoApply: true,
            locale: localeDateFormat
        }).on('apply.daterangepicker', function (ev, picker) {
            const startDate = picker.startDate.format('YYYY-MM-DD HH:mm');
            $(this).val(startDate);
        }).on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        })
    });
</script>