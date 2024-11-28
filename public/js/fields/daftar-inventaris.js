$('#btn-add-row-daftar-inventaris').on('click', function (){
    let optionMasterJenisInventaris = '';

    masterJenisInventaris.forEach((jenisInventaris) => {
        optionMasterJenisInventaris += `<option value="${jenisInventaris.kode}">${jenisInventaris.nama}</option>`;
    });

    let optionMasterJenisMerkInventaris = '';

    masterJenisMerkInventaris.forEach((merkInventaris) => {
        optionMasterJenisMerkInventaris += `<option value="${merkInventaris.kode}">${merkInventaris.nama}</option>`;
    });

    let optionKondisiInventaris = '';

    masterKondisiInventaris.forEach((kondisiInventaris) => {
        optionKondisiInventaris += `<option value="${kondisiInventaris}">${kondisiInventaris}</option>`;
    });

    let rand = uniqueString(8);
    let divToCopy = `
        <div class="row div-group-daftar-inventaris">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Inventaris</span>
                </label>
                <select required
                       class="form-control form-select"
                       name="inventaris[${rand}][kode_master_jenis_inventaris]">
                    ${optionMasterJenisInventaris}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jumlah Inventaris</span>
                </label>
                <input type="text" maxlength="10" id="jumlah_inventaris-${rand}"
                       class="form-control" required
                       name="inventaris[${rand}][jumlah_inventaris]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Kapasitas Inventaris</span>
                </label>
                <input type="text" maxlength="255"
                       class="form-control" required
                       name="inventaris[${rand}][kapasitas_inventaris]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Merk Inventaris</span>
                </label>
                <select required
                       class="form-control form-select"
                       name="inventaris[${rand}][kode_master_jenis_merk_inventaris]">
                    ${optionMasterJenisMerkInventaris}
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tahun Pembuatan Inventaris</span>
                </label>
                <input id="yearpicker-${rand}" placeholder="YYYY"
                       class="form-control" required
                       name="inventaris[${rand}][tahun_pembuatan_inventaris]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Kondisi Inventaris</span>
                </label>
                <select required
                       class="form-control form-select"
                       name="inventaris[${rand}][kondisi_inventaris]">
                    ${optionKondisiInventaris}
                </select>
            </div>
            <div class="col-md-8 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Lokasi Inventaris</span>
                </label>
                <textarea class="form-control" maxlength="500" required rows="1"
                       name="inventaris[${rand}][lokasi_inventaris]"></textarea>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Dokumen Bukti Kepemilikan</span>
                </label>
                <input type="file" onchange="onDocumentChange(this, 'pdf,png,jpeg,jpg', '10240')"
                       class="form-control" accept=".pdf,.png,.jpeg,.jpg"
                       name="inventaris[${rand}][path_upload_inventaris]" />
               <div class="row text-success mt-2" style="font-size: 12px">
                    <div class="col-6">
                        <span class="text-black">Format :</span> PDF, PNG, JPEG, JPG
                    </div>
                    <div class="col-6 text-end">
                        <span class="text-black">Max :</span> 10 MB
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center mt-3 mb-7">
                    <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-inventaris">
                        Hapus
                    </button>
                </div>
            </div>
            <hr>
        </div>
    `;

    $('#kt_contact_view_daftar_inventaris').append(divToCopy)

    $(`#yearpicker-${rand}`).yearpicker({
        startYear: 1950,
        endYear: new Date().toLocaleDateString('id-ID', { year: 'numeric' }),
    })

    $(`#jumlah_inventaris-${rand}`).numeric({
        negative: false
    })
})

$(document).on('click', '.btn-remove-row-daftar-inventaris', function (){
    $(this).parent().parent().parent().remove()
})

$(`.yearpicker-inventaris`).yearpicker({
    startYear: 1950,
    endYear: new Date().toLocaleDateString('id-ID', { year: 'numeric' }),
})