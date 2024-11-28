<div class="row">
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_master_bentuk_badan_usaha_segmentasi"
               class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Bidang Usaha</span>
        </label>
        <select class="form-select  @error('kode_master_bentuk_badan_usaha_segmentasi') is-invalid @enderror"
                id="kode_master_bentuk_badan_usaha_segmentasi" name="kode_master_bentuk_badan_usaha_segmentasi"
                data-control="select2" required
                data-placeholder="---Pilih Segmentasi---">
            <option></option>
            @foreach ($stmtKategoriVendor as $kategoriVendor)
                <option value="{{ $kategoriVendor->kode }}"
                        {{ old('kode_master_bentuk_badan_usaha_segmentasi', isset($registrasiVendor) ? $registrasiVendor?->kode_master_bentuk_badan_usaha_segmentasi : null) == $kategoriVendor->kode ? 'selected' : '' }}>
                    {{ $kategoriVendor->nama }}
                </option>
            @endforeach
        </select>
        @error('kode_master_bentuk_badan_usaha_segmentasi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_master_kelompok_usaha_segmentasi"
               class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Kelompok Usaha</span>
        </label>
        <select class="form-select  @error('kode_master_kelompok_usaha_segmentasi') is-invalid @enderror"
                id="kode_master_kelompok_usaha_segmentasi" name="kode_master_kelompok_usaha_segmentasi"
                data-control="select2" required
                data-placeholder="---Pilih Kelompok Usaha---">
            <option></option>
            @foreach ($stmtJenisVendor as $jenisVendor)
                <option value="{{ $jenisVendor->kode }}"
                        {{ old('kode_master_kelompok_usaha_segmentasi', isset($registrasiVendor) ? $registrasiVendor?->kode_master_kelompok_usaha_segmentasi : null) == $jenisVendor->kode ? 'selected' : '' }}>
                    {{ $jenisVendor->nama }}
                </option>
            @endforeach
        </select>
        @error('kode_master_kelompok_usaha_segmentasi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_master_sub_bidang_usaha"
               class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Sub Bidang Usaha</span>
        </label>
        <select class="form-select  @error('kode_master_sub_bidang_usaha') is-invalid @enderror"
                id="kode_master_sub_bidang_usaha" name="kode_master_sub_bidang_usaha"
                data-control="select2" required
                data-placeholder="---Pilih Sub Bidang Usaha---">
            <option></option>
            @foreach ($stmtSubBidangUsaha as $subBidangUsaha)
                <option value="{{ $subBidangUsaha->kode }}"
                        {{ old('kode_master_sub_bidang_usaha', isset($registrasiVendor) ? $registrasiVendor?->kode_master_sub_bidang_usaha : null) == $subBidangUsaha->kode ? 'selected' : '' }}>
                    {{ $subBidangUsaha->nama }}
                </option>
            @endforeach
        </select>
        @error('kode_master_sub_bidang_usaha')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_master_kualifikasi_grade"
               class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Kualifikasi / Grade</span>
        </label>
        <select class="form-select  @error('kode_master_kualifikasi_grade') is-invalid @enderror"
                id="kode_master_kualifikasi_grade" name="kode_master_kualifikasi_grade"
                data-control="select2" required
                data-placeholder="---Pilih Kualifikasi---">
            <option></option>
            @foreach ($stmtKualifikasiGrade as $kualifikasi)
                <option value="{{ $kualifikasi->kode }}"
                        {{ old('kode_master_kualifikasi_grade', isset($registrasiVendor) ? $registrasiVendor?->kode_master_kualifikasi_grade : null) == $kualifikasi->kode ? 'selected' : '' }}>
                    {{ $kualifikasi->nama }}
                </option>
            @endforeach
        </select>
        @error('kode_master_kualifikasi_grade')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="asosiasi" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Asosiasi</span>
        </label>
        <input type="text" required maxlength="255"
               class="form-control @error('asosiasi') is-invalid @enderror"
               name="asosiasi" value="{{ old('asosiasi', isset($registrasiVendor) ? $registrasiVendor?->asosiasi ?? null : null) }}"
               id="asosiasi"/>
        @error('asosiasi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="no_sertifikat" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">No. Sertifikat</span>
        </label>
        <input type="text" required maxlength="255"
               class="form-control @error('no_sertifikat') is-invalid @enderror"
               name="no_sertifikat" value="{{ old('no_sertifikat', isset($registrasiVendor) ? $registrasiVendor?->no_sertifikat ?? null : null) }}"
               id="no_sertifikat"/>
        @error('no_sertifikat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="masa_berlaku_sertifikat" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Tanggal Mulai Masa Berlaku</span>
        </label>
        <input type="date" required maxlength="255"
               class="form-control @error('masa_berlaku_sertifikat') is-invalid @enderror"
               name="masa_berlaku_sertifikat" value="{{ old('masa_berlaku_sertifikat', isset($registrasiVendor) ? $registrasiVendor?->masa_berlaku_sertifikat ?? null : null) }}"
               id="masa_berlaku_sertifikat"/>
        @error('masa_berlaku_sertifikat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="masa_berakhir_sertifikat" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Tanggal Berakhir Masa Berlaku</span>
        </label>
        <input type="date" required maxlength="255"
               class="form-control @error('masa_berakhir_sertifikat') is-invalid @enderror"
               name="masa_berakhir_sertifikat" value="{{ old('masa_berakhir_sertifikat', isset($registrasiVendor) ? $registrasiVendor?->masa_berakhir_sertifikat ?? null : null) }}"
               id="masa_berakhir_sertifikat"/>
        @error('masa_berakhir_sertifikat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>