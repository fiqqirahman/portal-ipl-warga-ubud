<div class="row">
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="nama_pic_perorangan" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Nama</span>
        </label>
        <input type="text" required maxlength="255" readonly
               class="form-control @error('nama_pic_perorangan') is-invalid @enderror"
               name="nama_pic_perorangan" value="{{ old('nama_pic_perorangan', isset($registrasiVendor) ? $registrasiVendor?->nama_pic_perorangan ?? null : null) }}"
               id="nama_pic_perorangan"/>
        @error('nama_pic_perorangan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="no_pic_perorangan" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Nomor HP</span>
        </label>
        <input type="text" required maxlength="15" readonly
               class="form-control positive-numeric @error('no_pic_perorangan') is-invalid @enderror"
               name="no_pic_perorangan" value="{{ old('no_pic_perorangan', isset($registrasiVendor) ? $registrasiVendor?->no_pic_perorangan ?? null : null) }}"
               id="no_pic_perorangan"/>
        @error('no_pic_perorangan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-md-4 col-sm-12 mb-4">
        <label for="email_pic_perorangan" class="fs-6 fw-semibold form-label mt-3">
            <span class="required">Email</span>
        </label>
        <input type="email" required maxlength="255" readonly
               class="form-control @error('email_pic_perorangan') is-invalid @enderror"
               name="email_pic_perorangan" value="{{ old('email_pic_perorangan', isset($registrasiVendor) ? $registrasiVendor?->email_pic_perorangan ?? null : null) }}"
               id="email_pic_perorangan"/>
        @error('email_pic_perorangan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>