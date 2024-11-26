$('#btn-add-row-daftar-tenaga-ahli').on('click', function (){
    let rand = uniqueString(8);
    let divToCopy = `
        <div class="row div-group-daftar-tenaga-ahli">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Tenaga Ahli</span>
                </label>
                <input type="text" maxlength="255"
                       class="form-control" required
                       name="tenaga_ahli[${rand}][nama_tenaga_ahli]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Lahir Tenaga Ahli</span>
                </label>
                <input type="date"
                       class="form-control" required
                       name="tenaga_ahli[${rand}][tanggal_lahir_tenaga_ahli]" />
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Pendidikan Tenaga Ahli</span>
                </label>
                <input type="text" maxlength="255" required
                        class="form-control"
                        name="tenaga_ahli[${rand}][pendidikan_tenaga_ahli]"/>
            </div>
            <div class="col-md-8 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Pengalaman Tenaga Ahli</span>
                </label>
                <textarea class="form-control" required rows="3" maxlength="1000"
                       name="tenaga_ahli[${rand}][pengalaman_tenaga_ahli]"></textarea>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Profesi Tenaga Ahli</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control"
                       name="tenaga_ahli[${rand}][profesi_tenaga_ahli]" />
            </div>
            <div class="row">
                <div class="d-flex justify-content-center mt-3 mb-7">
                    <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-tenaga-ahli">
                        Hapus
                    </button>
                </div>
            </div>
            <hr>
        </div>
    `;

    $('#kt_contact_view_daftar_tenaga_ahli').append(divToCopy)
})

$(document).on('click', '.btn-remove-row-daftar-tenaga-ahli', function (){
    $(this).parent().parent().parent().remove()
})