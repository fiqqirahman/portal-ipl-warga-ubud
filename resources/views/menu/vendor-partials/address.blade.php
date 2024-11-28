<div class="row">
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="alamat" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Alamat</span>
        </label>
        <textarea
                class="form-control form-control @error('alamat') is-invalid @enderror"
                id="alamat" maxlength="1000"
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
        <select class="form-select @error('kode_master_negara') is-invalid @enderror"
                id="kode_master_negara" name="kode_master_negara" data-control="select2"
                data-placeholder="---Pilih Negara---">
            <option></option>
            @foreach ($stmtNegara as $negara)
                <option value="{{ $negara->kode }}"
                        {{ old('kode_master_negara', isset($registrasiVendor) ? $registrasiVendor?->kode_master_negara : '') == $negara->kode ? 'selected' : '' }}>
                    {{ $negara->nama }}
                </option>
            @endforeach
        </select>
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
        <select class="form-select  @error('kode_provinsi') is-invalid @enderror"
                id="kode_provinsi" name="kode_provinsi" data-control="select2"
                data-placeholder="---Pilih Provinsi---">
            <option></option>
            @foreach ($stmtProvinsi as $provinsi)
                <option value="{{ $provinsi->kode }}"
                        {{ old('kode_provinsi', isset($registrasiVendor) ? $registrasiVendor?->kode_provinsi ?? '' : '') == $provinsi->kode ? 'selected' : '' }}>
                    {{ $provinsi->nama }}
                </option>
            @endforeach
        </select>
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
        <select class="form-select  @error('kode_kabupaten_kota') is-invalid @enderror"
                id="kode_kabupaten_kota" name="kode_kabupaten_kota"
                data-control="select2"
                data-placeholder="---Pilih Kabupaten Kota---">
            <option></option>
        </select>
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
        <select class="form-select  @error('kode_kecamatan') is-invalid @enderror"
                id="kode_kecamatan" name="kode_kecamatan" data-control="select2"
                data-placeholder="---Pilih Kecamatan---">
            <option></option>
        </select>
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
        <select class="form-select  @error('kode_kelurahan') is-invalid @enderror"
                id="kode_kelurahan" name="kode_kelurahan" data-control="select2"
                data-placeholder="---Pilih Kelurahan---">
            <option></option>
        </select>
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
        <input type="text" required maxlength="6"
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
        <input type="text" required maxlength="15"
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
        <input type="text" required maxlength="15"
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
        <input type="text" required maxlength="255" placeholder="https://example.com"
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