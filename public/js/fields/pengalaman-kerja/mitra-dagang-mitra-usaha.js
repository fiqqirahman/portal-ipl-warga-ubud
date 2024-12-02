$('#btn-add-row-daftar-pengalaman-kerja-mitra-usaha').on('click', function (){
    let optionsKabKota = '';

    masterKabKota.forEach((kabKota) => {
        optionsKabKota += `<option value="${kabKota.kode}">${kabKota.nama}</option>`;
    });

    let optionsKategoriVendor = '';

    stmtKategoriVendor.forEach((kategoriVendor) => {
        optionsKategoriVendor += `<option value="${kategoriVendor.kode}">${kategoriVendor.nama}</option>`;
    });

    let optionsSubBidangUsaha = '';

    stmtSubBidangUsaha.forEach((subBidangUsaha) => {
        optionsSubBidangUsaha += `<option value="${subBidangUsaha.kode}">${subBidangUsaha.nama}</option>`;
    });

    let rand = uniqueString(8);
    let divToCopy = `
        <div class="row div-group-daftar-pengalaman-kerja-mitra-usaha">
            <input type="hidden" name="pengalamanMitraUsaha[${rand}][kodefikasi_tab]" value="Mitra Usaha">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Mitra</span>
                </label>
                <input type="text" maxlength="255"
                       class="form-control" required
                       name="pengalamanMitraUsaha[${rand}][nama_mitra]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Lokasi Pekerjaan</span>
                </label>
                <select required
                       class="form-control form-select" id="pengalamanMitraUsaha-lokasi_pekerjaan-${rand}"
                       name="pengalamanMitraUsaha[${rand}][lokasi_pekerjaan]">
                    ${optionsKabKota}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Pemberi Pekerjaan</span>
                </label>
                <input type="text" maxlength="255" required
                        class="form-control"
                        name="pengalamanMitraUsaha[${rand}][pemberi_pekerjaan]"/>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Pekerjaan</span>
                </label>
                <select required
                       class="form-control form-select" id="pengalamanMitraUsaha-kode_jenis_pekerjaan-${rand}"
                       name="pengalamanMitraUsaha[${rand}][kode_jenis_pekerjaan]">
                    ${optionsSubBidangUsaha}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">No. Telp Perusahaan/PIC</span>
                </label>
                <input type="text" maxlength="20" required
                        class="form-control positive-numeric"
                        name="pengalamanMitraUsaha[${rand}][no_telfon_perusahaan_atau_pic]"/>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Bidang Usaha</span>
                </label>
                <select required id="pengalamanMitraUsaha-kode_bidang_usaha-${rand}"
                       class="form-control form-select"
                       name="pengalamanMitraUsaha[${rand}][kode_bidang_usaha]">
                    ${optionsKategoriVendor}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Mulai Kerjasama</span>
                </label>
                <input type="date" required
                        class="form-control"
                        name="pengalamanMitraUsaha[${rand}][tanggal_mulai_kerjasama]"/>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">No. Kontrak</span>
                </label>
                <input type="text" required maxlength="255"
                        class="form-control"
                        name="pengalamanMitraUsaha[${rand}][no_kontrak]"/>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Kontrak</span>
                </label>
                <input type="date" required
                        class="form-control"
                        name="pengalamanMitraUsaha[${rand}][tanggal_kontrak]"/>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nilai Kontrak</span>
                </label>
                <input type="text" required onkeyup="formatRupiah(this)"
                        class="form-control" maxlength="26"
                        name="pengalamanMitraUsaha[${rand}][nilai_kontrak]"/>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center mt-3 mb-7">
                    <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-pengalaman-kerja-mitra-usaha">
                        Hapus
                    </button>
                </div>
            </div>
            <hr>
        </div>
    `;

    $('#kt_contact_view_pengalaman_mitra_usaha').append(divToCopy)

    $(`#pengalamanMitraUsaha-lokasi_pekerjaan-${rand}`).select2()

    $(`#pengalamanMitraUsaha-kode_jenis_pekerjaan-${rand}`).select2()

    $(`#pengalamanMitraUsaha-kode_bidang_usaha-${rand}`).select2()
})

$(document).on('click', '.btn-remove-row-daftar-pengalaman-kerja-mitra-usaha', function (){
    $(this).parent().parent().parent().remove()
})