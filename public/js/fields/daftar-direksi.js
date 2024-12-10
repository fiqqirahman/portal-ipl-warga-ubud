$('#btn-add-row-daftar-direksi').on('click', function (){
    let optionsJenisIdentitas = '';

    vendorJenisIdentitas.forEach((jenisIdentitas) => {
        optionsJenisIdentitas += `<option value="${jenisIdentitas.kode}">${jenisIdentitas.nama}</option>`;
    });

    let optionsJabatan = '';

    vendorJabatan.forEach((jabatan) => {
        optionsJabatan += `<option value="${jabatan.kode}">${jabatan.nama}</option>`;
    });

    let rand = uniqueString(8);
    let divToCopy = `
        <div class="row div-group-daftar-direksi">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nomor Identitas Direksi</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control" id="no_identitas_direksi-${rand}"
                       name="daftar_direksi[${rand}][no_identitas_direksi]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Identitas Direksi</span>
                </label>
                <select required
                       class="form-control form-select"
                       name="daftar_direksi[${rand}][kode_master_jenis_identitas_direksi]">
                    ${optionsJenisIdentitas}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Direksi</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control"
                       name="daftar_direksi[${rand}][nama_direksi]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Alamat Direksi</span>
                </label>
                <textarea type="text" required maxlength="255"
                        class="form-control" rows="1"
                        name="daftar_direksi[${rand}][alamat_direksi]"></textarea>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jabatan Direksi</span>
                </label>
                <select required
                       class="form-control form-select"
                       name="daftar_direksi[${rand}][kode_master_jabatan_vendor_direksi]">
                    ${optionsJabatan}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Lahir Direksi</span>
                </label>
                <input type="date" required
                       class="form-control"
                       name="daftar_direksi[${rand}][tanggal_lahir_direksi]" />
            </div>
            <div class="row">
                <div class="d-flex justify-content-center mt-3 mb-7">
                    <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-direksi">
                        Hapus
                    </button>
                </div>
            </div>
            <hr>
        </div>
    `;

    $('#kt_contact_view_daftar_direksi').append(divToCopy)

    $(`#no_identitas_direksi-${rand}`).numeric({
        negative: false
    })
})

$(document).on('click', '.btn-remove-row-daftar-direksi', function (){
    $(this).parent().parent().parent().remove()
})