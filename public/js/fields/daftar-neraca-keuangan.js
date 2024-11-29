$('#btn-add-row-daftar-neraca-keuangan').on('click', function (){
    let optionStatusAudit = '';

    masterStatusAudit.forEach((statusAudit) => {
        optionStatusAudit += `<option value="${statusAudit}">${statusAudit}</option>`;
    });

    let rand = uniqueString(8);
    let divToCopy = `
        <div class="row div-group-daftar-neraca-keuangan">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tahun Data Keuangan</span>
                </label>
                <input id="yearpicker-${rand}" placeholder="YYYY"
                       class="form-control" required
                       name="neraca_keuangan[${rand}][tahun_data_keuangan]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Mata Uang Data Keuangan</span>
                </label>
                <input type="text" maxlength="50" placeholder="IDR"
                       value="IDR"
                       class="form-control" required
                       name="neraca_keuangan[${rand}][mata_uang_data_keuangan]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Aktiva Lancar</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       class="form-control" required maxlength="50"
                       name="neraca_keuangan[${rand}][aktiva_lancar]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Hutang Lancar</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       class="form-control" required maxlength="50"
                       name="neraca_keuangan[${rand}][hutang_lancar]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Rasio Likuiditas</span>
                </label>
                <input type="text" pattern="[0-9.]*" title="Hanya Angka dan Titik (.) diperbolehkan"
                       class="form-control" required maxlength="20"
                       name="neraca_keuangan[${rand}][rasio_likuiditas]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Total Hutang</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       class="form-control" required maxlength="50"
                       name="neraca_keuangan[${rand}][total_hutang]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Ekuitas</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       class="form-control" required maxlength="50"
                       name="neraca_keuangan[${rand}][ekuitas]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Rasio Hutang</span>
                </label>
                <input type="text" pattern="[0-9.]*" title="Hanya Angka dan Titik (.) diperbolehkan"
                       class="form-control" required maxlength="20"
                       name="neraca_keuangan[${rand}][rasio_hutang]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Laba Rugi</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       class="form-control" required maxlength="50"
                       name="neraca_keuangan[${rand}][laba_rugi]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Return of Equity</span>
                </label>
                <input type="text" pattern="[0-9.]*" title="Hanya Angka dan Titik (.) diperbolehkan"
                       placeholder="%"
                       class="form-control" required maxlength="20"
                       name="neraca_keuangan[${rand}][return_of_equity]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Kas</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       class="form-control" required maxlength="50"
                       name="neraca_keuangan[${rand}][kas]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Total Aktiva</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       class="form-control" required maxlength="50"
                       name="neraca_keuangan[${rand}][total_aktiva]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Status Audit</span>
                </label>
                <select required
                       class="form-control form-select"
                       name="neraca_keuangan[${rand}][status_audit]">
                    ${optionStatusAudit}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Nama Auditor</span>
                </label>
                <input type="text" 
                       class="form-control" maxlength="255"
                       name="neraca_keuangan[${rand}][nama_auditor]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Tanggal Audit</span>
                </label>
                <input type="date"
                       class="form-control"
                       name="neraca_keuangan[${rand}][tanggal_audit]" />
            </div>
            <div class="row">
                <div class="d-flex justify-content-center mt-3 mb-7">
                    <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-neraca-keuangan">
                        Hapus
                    </button>
                </div>
            </div>
            <hr>
        </div>
    `;

    $('#kt_contact_view_daftar_neraca_keuangan').append(divToCopy)

    $(`#yearpicker-${rand}`).yearpicker({
        startYear: 1950,
        endYear: new Date().toLocaleDateString('id-ID', { year: 'numeric' }),
    })
})

$(document).on('click', '.btn-remove-row-daftar-neraca-keuangan', function (){
    $(this).parent().parent().parent().remove()
})

$(`.yearpicker-neraca-keuangan`).yearpicker({
    startYear: 1950,
    endYear: new Date().toLocaleDateString('id-ID', { year: 'numeric' }),
})