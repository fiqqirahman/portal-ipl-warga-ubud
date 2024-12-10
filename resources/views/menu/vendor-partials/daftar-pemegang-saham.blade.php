@php
    $uniqueStringPemegangSaham = uniqueString(8);
@endphp
@if(!request()->routeIs('menu.**.show'))
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-sm btn-info" id="btn-add-row-daftar-pemegang-saham">
                Tambah
            </button>
        </div>
    </div>
@endif

@if($errors->any())
    @foreach(old('pemegang_saham') ?? [] as $key => $oldDaftarPemegangSaham)
        <div class="row div-group-daftar-pemegang-saham">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nomor Identitas Pemegang Saham</span>
                </label>
                <input type="text" maxlength="255" required
                       class="form-control @error("pemegang_saham.{$key}.no_identitas_pemegang_saham") is-invalid @enderror positive-numeric" value="{{ $oldDaftarPemegangSaham['no_identitas_pemegang_saham'] }}"
                       name="pemegang_saham[{{ $key }}][no_identitas_pemegang_saham]"/>
                @error("pemegang_saham.{$key}.no_identitas_pemegang_saham")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Identitas Pemegang Saham</span>
                </label>
                <select maxlength="255" required
                        class="form-select @error("pemegang_saham.{$key}.kode_master_jenis_identitas_pemegang_saham") is-invalid @enderror" data-control="select2"
                        name="pemegang_saham[{{ $key }}][kode_master_jenis_identitas_pemegang_saham]">
                    @foreach($vendorJenisIdentitas as $jenisIdentitas)
                        <option value="{{ $jenisIdentitas->kode }}" {{ $jenisIdentitas->kode == $oldDaftarPemegangSaham['kode_master_jenis_identitas_pemegang_saham'] ? 'selected' : '' }}>{{ $jenisIdentitas->nama }}</option>
                    @endforeach
                </select>
                @error("pemegang_saham.{$key}.kode_master_jenis_identitas_pemegang_saham")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Pemegang Saham</span>
                </label>
                <input type="text" maxlength="255" required
                       class="form-control @error("pemegang_saham.{$key}.nama_pemegang_saham") is-invalid @enderror" value="{{ $oldDaftarPemegangSaham['nama_pemegang_saham'] }}"
                       name="pemegang_saham[{{ $key }}][nama_pemegang_saham]" />
                @error("pemegang_saham.{$key}.nama_pemegang_saham")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Alamat Pemegang Saham</span>
                </label>
                <textarea maxlength="255" required
                          class="form-control @error("pemegang_saham.{$key}.alamat_pemegang_saham") is-invalid @enderror" rows="1"
                          name="pemegang_saham[{{ $key }}][alamat_pemegang_saham]">{{ $oldDaftarPemegangSaham['alamat_pemegang_saham'] }}</textarea>
                @error("pemegang_saham.{$key}.alamat_pemegang_saham")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Persentase Kepemilikan</span>
                </label>
                <input type="text" pattern="^[0-9,]+$" required placeholder="Contoh : 10,4"
                       class="form-control @error("pemegang_saham.{$key}.persentase_kepemilikan") is-invalid @enderror" value="{{ $oldDaftarPemegangSaham['persentase_kepemilikan'] ?? 0 }}"
                       name="pemegang_saham[{{ $key }}][persentase_kepemilikan]" />
                @error("pemegang_saham.{$key}.persentase_kepemilikan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-7">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Lahir Pemegang Saham</span>
                </label>
                <input type="date" required
                       class="form-control @error("pemegang_saham.{$key}.tanggal_lahir_pemegang_saham") is-invalid @enderror" value="{{ $oldDaftarPemegangSaham['tanggal_lahir_pemegang_saham'] ?? '0'}}"
                       name="pemegang_saham[{{ $key }}][tanggal_lahir_pemegang_saham]" />
                @error("pemegang_saham.{$key}.tanggal_lahir_pemegang_saham")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @if(!request()->routeIs('menu.**.show'))
                <div class="row">
                    <div class="d-flex justify-content-center mt-3 mb-7">
                        <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-pemegang-saham">
                            Hapus
                        </button>
                    </div>
                </div>
            @endif
            <hr>
        </div>
    @endforeach
@else
    @if(isset($registrasiVendor) && isset($registrasiVendor->pemegang_saham) && $registrasiVendor->pemegang_saham)
        @foreach($registrasiVendor->pemegang_saham as $daftarPemegangSaham)
            @php
                $uniqueStringPemegangSaham = uniqueString(8);
            @endphp
            <div class="row div-group-daftar-pemegang-saham">
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nomor Identitas Pemegang Saham</span>
                    </label>
                    <input type="text" maxlength="255" required
                           class="form-control positive-numeric" value="{{ $daftarPemegangSaham->no_identitas_pemegang_saham }}"
                           name="pemegang_saham[{{ $uniqueStringPemegangSaham }}][no_identitas_pemegang_saham]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Jenis Identitas Pemegang Saham</span>
                    </label>
                    <select maxlength="255" required
                            class="form-select" data-control="select2"
                            name="pemegang_saham[{{ $uniqueStringPemegangSaham }}][kode_master_jenis_identitas_pemegang_saham]">
                        @foreach($vendorJenisIdentitas as $jenisIdentitas)
                            <option value="{{ $jenisIdentitas->kode }}" {{ $jenisIdentitas->kode == $daftarPemegangSaham->kode_master_jenis_identitas_pemegang_saham ? 'selected' : '' }}>{{ $jenisIdentitas->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nama Pemegang Saham</span>
                    </label>
                    <input type="text" maxlength="255" required
                           class="form-control" value="{{ $daftarPemegangSaham->nama_pemegang_saham }}"
                           name="pemegang_saham[{{ $uniqueStringPemegangSaham }}][nama_pemegang_saham]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Alamat Pemegang Saham</span>
                    </label>
                    <textarea maxlength="255" required
                              class="form-control" rows="1"
                              name="pemegang_saham[{{ $uniqueStringPemegangSaham }}][alamat_pemegang_saham]">{{ $daftarPemegangSaham->alamat_pemegang_saham }}</textarea>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Persentase Kepemilikan</span>
                    </label>
                    <input type="text" pattern="^[0-9,]+$" required placeholder="Contoh : 10,4"
                           class="form-control" value="{{ $daftarPemegangSaham->persentase_kepemilikan ?? '0' }}"
                           name="pemegang_saham[{{ $uniqueStringPemegangSaham }}][persentase_kepemilikan]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tanggal Lahir Pemegang Saham</span>
                    </label>
                    <input type="date" required
                           class="form-control" value="{{ $daftarPemegangSaham->tanggal_lahir_pemegang_saham }}"
                           name="pemegang_saham[{{ $uniqueStringPemegangSaham }}][tanggal_lahir_pemegang_saham]" />
                </div>
                @if(!request()->routeIs('menu.**.show'))
                    <div class="row">
                        <div class="d-flex justify-content-center mt-3 mb-7">
                            <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-pemegang-saham">
                                Hapus
                            </button>
                        </div>
                    </div>
                @endif
                <hr>
            </div>
        @endforeach
    @endif
@endif