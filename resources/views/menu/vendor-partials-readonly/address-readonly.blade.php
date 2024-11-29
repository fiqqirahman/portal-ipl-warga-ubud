<div class="row">
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="alamat" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Alamat</span>
        </label>
        <textarea
                class="form-control form-control @error('alamat') is-invalid @enderror"
                id="alamat" maxlength="1000" required readonly
                name="alamat" rows="2">{{ old('alamat', isset($registrasiVendor) ? $registrasiVendor?->alamat ?? null : null) }}</textarea>
        @error('alamat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_master_negara" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Negara</span>
        </label>
        <input type="text" required maxlength="255" readonly
               class="form-control @error('kode_master_negara') is-invalid @enderror"
               name="kode_master_negara"
               value="{{ old('kode_master_negara', $registrasiVendor->negara->nama) }}"
               id="kode_master_negara"/>
        @error('kode_master_negara')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_provinsi" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Provinsi</span>
        </label>
        <input type="text" required maxlength="255" readonly
               class="form-control @error('kode_provinsi') is-invalid @enderror"
               name="kode_provinsi"
               value="{{ old('kode_provinsi', $registrasiVendor->provinsi->nama ?? '') }}"
               id="kode_provinsi"/>
        @error('kode_provinsi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_kabupaten_kota" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Kabupaten/Kota</span>
        </label>
        <input type="text" required maxlength="255" readonly
               class="form-control @error('kode_kabupaten_kota') is-invalid @enderror"
               name="kode_kabupaten_kota"
               value="{{ old('kode_kabupaten_kota', $registrasiVendor->kabupaten->nama ?? '') }}"
               id="kode_kabupaten_kota"/>
        @error('kode_kabupaten_kota')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_kecamatan" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Kecamatan</span>
        </label>
        <input type="text" required maxlength="255" readonly
               class="form-control @error('kode_kecamatan') is-invalid @enderror"
               name="kode_kecamatan"
               value="{{ old('kode_kecamatan', $registrasiVendor->kecamatan->nama ?? '') }}"
               id="kode_kecamatan"/>
        @error('kode_kecamatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_kelurahan" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Kelurahan</span>
        </label>
        <input type="text" required maxlength="255" readonly
               class="form-control @error('kode_kelurahan') is-invalid @enderror"
               name="kode_kelurahan"
               value="{{ old('kode_kelurahan', $registrasiVendor->kelurahan->nama ?? '') }}"
               id="kode_kelurahan"/>
        @error('kode_kelurahan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_pos" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Kode Pos</span>
        </label>
        <input type="text" required maxlength="6" readonly
               class="form-control positive-numeric @error('kode_pos') is-invalid @enderror"
               name="kode_pos" value="{{ old('kode_pos', isset($registrasiVendor) ? $registrasiVendor?->kode_pos ?? null : null) }}"
               id="kode_pos"/>
        @error('kode_pos')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="no_telepon" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Nomor Telepon</span>
        </label>
        <input type="text" required maxlength="15" readonly
               class="form-control positive-numeric @error('no_telepon') is-invalid @enderror"
               name="no_telepon" value="{{ old('no_telepon', isset($registrasiVendor) ? $registrasiVendor?->no_telepon ?? null : null) }}"
               id="no_telepon"/>
        @error('no_telepon')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="no_fax" class="fs-6 fw-semibold form-label mt-3">
            <span>Nomor Fax</span>
        </label>
        <input type="text" maxlength="15" readonly
               class="form-control positive-numeric @error('no_fax') is-invalid @enderror"
               name="no_fax" value="{{ old('no_fax', isset($registrasiVendor) ? $registrasiVendor?->no_fax ?? null : null) }}"
               id="no_fax"/>
        @error('no_fax')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="website" class="fs-6 fw-semibold form-label mt-3">
            <span>Website</span>
        </label>
        <input type="text" maxlength="255" placeholder="https://example.com" readonly
               class="form-control @error('website') is-invalid @enderror"
               name="website" value="{{ old('website', isset($registrasiVendor) ? $registrasiVendor?->website ?? null : null) }}"
               id="website"/>
        @error('website')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>