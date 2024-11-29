<div class="row">
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="kode_master_nama_bank" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Nama Bank</span>
        </label>
        <input type="text" required maxlength="255" readonly
               class="form-control @error('kode_master_nama_bank') is-invalid @enderror"
               name="kode_master_nama_bank"
               value="{{ old('kode_master_nama_bank', $registrasiVendor->bank->nama ?? '') }}"
               id="kode_master_nama_bank"/>
        @error('kode_master_nama_bank')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="cabang_bank" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Cabang Bank</span>
        </label>
        <input type="text" required maxlength="255" readonly
               class="form-control @error('cabang_bank') is-invalid @enderror"
               name="cabang_bank" value="{{ old('cabang_bank', isset($registrasiVendor) ? $registrasiVendor?->cabang_bank ?? '' : '') }}"
               id="cabang_bank"/>
        @error('cabang_bank')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="nomor_rekening" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Nomor Rekening</span>
        </label>
        <input type="text" required maxlength="255" readonly
               class="form-control positive-numeric @error('nomor_rekening') is-invalid @enderror"
               name="nomor_rekening" value="{{ old('nomor_rekening', isset($registrasiVendor) ? $registrasiVendor?->nomor_rekening ?? '' : '') }}"
               id="nomor_rekening"/>
        @error('nomor_rekening')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="nama_nasabah" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Nama Nasabah</span>
        </label>
        <input type="text" required maxlength="255" readonly
               class="form-control @error('nama_nasabah') is-invalid @enderror"
               name="nama_nasabah" value="{{ old('nama_nasabah', isset($registrasiVendor) ? $registrasiVendor?->nama_nasabah ?? '' : '') }}"
               id="nama_nasabah"/>
        @error('nama_nasabah')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="mata_uang" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Mata Uang</span>
        </label>
        <input type="text" required maxlength="3" readonly
               class="form-control @error('mata_uang') is-invalid @enderror"
               name="mata_uang" value="{{ old('mata_uang', isset($registrasiVendor) ? $registrasiVendor?->mata_uang ?? '' : '') }}"
               id="mata_uang"/>
        @error('mata_uang')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>