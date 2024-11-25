@php
    $uniqueStringKomisaris = uniqueString(8);
@endphp

<div class="row">
    <div class="d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-sm btn-info" id="btn-add-row-daftar-komisaris">
            Tambah
        </button>
    </div>
</div>

<div class="row div-group-daftar-komisaris">
    <div class="col-md-4 col-sm-12 mb-4">
        <label class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Nomor Identitas Komisaris</span>
        </label>
        <input type="text" required maxlength="255"
                class="form-control"
                name="daftar_komisaris[{{ $uniqueStringKomisaris }}][no_identitas_komisaris]"/>
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Jenis Identitas Komisaris</span>
        </label>
        <select type="text" required maxlength="255"
               class="form-control" data-control="select2"
               name="daftar_komisaris[{{ $uniqueStringKomisaris }}][kode_master_jenis_identitas_komisaris]">
            @foreach($komisarisJenisIdentitas as $jenisIdentitas)
                <option value="{{ $jenisIdentitas->kode }}">{{ $jenisIdentitas->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Nama Komisaris</span>
        </label>
        <input type="text" required maxlength="255"
               class="form-control"
               name="daftar_komisaris[{{ $uniqueStringKomisaris }}][nama_komisaris]" />
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Alamat Komisaris</span>
        </label>
        <textarea type="text" required maxlength="255"
                class="form-control" rows="1"
                name="daftar_komisaris[{{ $uniqueStringKomisaris }}][alamat_komisaris]"></textarea>
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Jabatan Komisaris</span>
        </label>
        <select required
                class="form-control" data-control="select2"
                name="daftar_komisaris[{{ $uniqueStringKomisaris }}][kode_master_jabatan_vendor_komisaris]">
            @foreach($komisarisJabatans as $komisarisJabatan)
                <option value="{{ $komisarisJabatan->kode }}">{{ $komisarisJabatan->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 col-sm-12 mb-7">
        <label class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Tanggal Lahir Komisaris</span>
        </label>
        <input type="date" required
               class="form-control"
               name="daftar_komisaris[{{ $uniqueStringKomisaris }}][tanggal_lahir_komisaris]" />
    </div>
    <hr>
</div>