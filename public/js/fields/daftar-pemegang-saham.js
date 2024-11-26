$('#btn-add-row-daftar-pemegang-saham').on('click', function (){
    let optionsJenisIdentitas = '';

    vendorJenisIdentitas.forEach((jenisIdentitas) => {
        optionsJenisIdentitas += `<option value="${jenisIdentitas.kode}">${jenisIdentitas.nama}</option>`;
    });

    let rand = uniqueString(8);
    let divToCopy = `
        <div class="row div-group-daftar-pemegang-saham">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nomor Identitas Pemegang Saham</span>
                </label>
                <input type="text" maxlength="255"
                       class="form-control" required
                       name="pemegang_saham[${rand}][no_identitas_pemegang_saham]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Identitas Pemegang Saham</span>
                </label>
                <select required
                       class="form-control form-select"
                       name="pemegang_saham[${rand}][kode_master_jenis_identitas_pemegang_saham]">
                    ${optionsJenisIdentitas}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Pemegang Saham</span>
                </label>
                <input type="text" maxlength="255"
                       class="form-control" required
                       name="pemegang_saham[${rand}][nama_pemegang_saham]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Alamat Pemegang Saham</span>
                </label>
                <textarea maxlength="255" required
                        class="form-control" rows="1"
                        name="pemegang_saham[${rand}][alamat_pemegang_saham]"></textarea>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Persentase Kepemilikan</span>
                </label>
                <input type="text" pattern="^[0-9,]+$"
                       class="form-control" required placeholder="Contoh : 10,4"
                       name="pemegang_saham[${rand}][persentase_kepemilikan]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Lahir Pemegang Saham</span>
                </label>
                <input type="date" required
                       class="form-control"
                       name="pemegang_saham[${rand}][tanggal_lahir_pemegang_saham]" />
            </div>
            <div class="row">
                <div class="d-flex justify-content-center mt-3 mb-7">
                    <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-pemegang-saham">
                        Hapus
                    </button>
                </div>
            </div>
            <hr>
        </div>
    `;

    $('#kt_contact_view_daftar_pemegang_saham').append(divToCopy)
})

$(document).on('click', '.btn-remove-row-daftar-pemegang-saham', function (){
    $(this).parent().parent().parent().remove()
})