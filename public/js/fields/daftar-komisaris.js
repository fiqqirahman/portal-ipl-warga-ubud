$('#btn-add-row-daftar-komisaris').on('click', function (){
    let optionsKomisarisJenisIdentitas = '';

    komisarisJenisIdentitas.forEach((jenisIdentitas) => {
        optionsKomisarisJenisIdentitas += `<option value="${jenisIdentitas.kode}">${jenisIdentitas.nama}</option>`;
    });

    let optionsKomisarisJabatans = '';

    komisarisJabatans.forEach((jabatan) => {
        optionsKomisarisJabatans += `<option value="${jabatan.kode}">${jabatan.nama}</option>`;
    });

    let rand = uniqueString(8);
    let divToCopy = `
        <div class="row div-group-daftar-komisaris">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nomor Identitas Komisaris</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control"
                       name="daftar_komisaris[${rand}][no_identitas_komisaris]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Identitas Komisaris</span>
                </label>
                <select required
                       class="form-control form-select"
                       name="daftar_komisaris[${rand}][kode_master_jenis_identitas_komisaris]">
                    ${optionsKomisarisJenisIdentitas}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Komisaris</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control"
                       name="daftar_komisaris[${rand}][nama_komisaris]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Alamat Komisaris</span>
                </label>
                <textarea type="text" required maxlength="255"
                        class="form-control" rows="1"
                        name="daftar_komisaris[${rand}][alamat_komisaris]"></textarea>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jabatan Komisaris</span>
                </label>
                <select required
                       class="form-control form-select"
                       name="daftar_komisaris[${rand}][kode_master_jabatan_vendor_komisaris]">
                    ${optionsKomisarisJabatans}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Lahir Komisaris</span>
                </label>
                <input type="date" required
                       class="form-control"
                       name="daftar_komisaris[${rand}][tanggal_lahir_komisaris]" />
            </div>
            <div class="row">
                <div class="d-flex justify-content-center mt-3 mb-7">
                    <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-komisaris">
                        Hapus
                    </button>
                </div>
            </div>
            <hr>
        </div>
    `;

    $('#kt_contact_view_daftar_komisaris').append(divToCopy)
})

$(document).on('click', '.btn-remove-row-daftar-komisaris', function (){
    $(this).parent().parent().parent().remove()
})