@php
    $uniqueStringDireksi = uniqueString(8);
@endphp

@if(!request()->routeIs('menu.**.show'))
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-sm btn-info" id="btn-add-row-daftar-direksi">
                Tambah
            </button>
        </div>
    </div>
@endif

@if($errors->any())
    @foreach(old('daftar_direksi') ?? [] as $key => $oldDaftarDireksi)
        <div class="row div-group-daftar-direksi">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nomor Identitas Direksi</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control @error("daftar_direksi.{$key}.no_identitas_direksi") is-invalid @enderror"
                       value="{{ $oldDaftarDireksi['no_identitas_direksi'] }}"
                       name="daftar_direksi[{{ $key }}][no_identitas_direksi]"/>
                @error("daftar_direksi.{$key}.no_identitas_direksi")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Identitas Direksi</span>
                </label>
                <select required maxlength="255"
                        class="form-select @error("daftar_direksi.{$key}.kode_master_jenis_identitas_direksi") is-invalid @enderror"
                        data-control="select2"
                        name="daftar_direksi[{{ $key }}][kode_master_jenis_identitas_direksi]">
                    @foreach($vendorJenisIdentitas as $jenisIdentitas)
                        <option value="{{ $jenisIdentitas->kode }}" {{ $jenisIdentitas->kode == $oldDaftarDireksi['kode_master_jenis_identitas_direksi'] ? 'selected' : '' }}>{{ $jenisIdentitas->nama }}</option>
                    @endforeach
                </select>
                @error("daftar_direksi.{$key}.kode_master_jenis_identitas_direksi")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Direksi</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control @error("daftar_direksi.{$key}.nama_direksi") is-invalid @enderror"
                       value="{{ $oldDaftarDireksi['nama_direksi'] }}"
                       name="daftar_direksi[{{ $key }}][nama_direksi]"/>
                @error("daftar_direksi.{$key}.nama_direksi")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Alamat Direksi</span>
                </label>
                <textarea type="text" required maxlength="255"
                          class="form-control @error("daftar_direksi.{$key}.alamat_direksi") is-invalid @enderror"
                          rows="1"
                          name="daftar_direksi[{{ $key }}][alamat_direksi]">{{ $oldDaftarDireksi['alamat_direksi'] }}</textarea>
                @error("daftar_direksi.{$key}.alamat_direksi")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jabatan Direksi</span>
                </label>
                <select required
                        class="form-select @error("daftar_direksi.{$key}.kode_master_jabatan_vendor_direksi") is-invalid @enderror"
                        data-control="select2"
                        name="daftar_direksi[{{ $key }}][kode_master_jabatan_vendor_direksi]">
                    @foreach($vendorJabatan as $direksiJabatan)
                        <option value="{{ $direksiJabatan->kode }}" {{ $direksiJabatan->kode == $oldDaftarDireksi['kode_master_jabatan_vendor_direksi'] ? 'selected' : '' }}>{{ $direksiJabatan->nama }}</option>
                    @endforeach
                </select>
                @error("daftar_direksi.{$key}.kode_master_jabatan_vendor_direksi")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-7">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Lahir Direksi</span>
                </label>
                <input type="date" required
                       class="form-control @error("daftar_direksi.{$key}.tanggal_lahir_direksi") is-invalid @enderror"
                       value="{{ $oldDaftarDireksi['tanggal_lahir_direksi'] }}"
                       name="daftar_direksi[{{ $key }}][tanggal_lahir_direksi]"/>
                @error("daftar_direksi.{$key}.tanggal_lahir_direksi")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @if(!request()->routeIs('menu.**.show'))
                @if(!$loop->first)
                    <div class="row">
                        <div class="d-flex justify-content-center mt-3 mb-7">
                            <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-direksi">
                                Hapus
                            </button>
                        </div>
                    </div>
                @endif
            @endif
            <hr>
        </div>
    @endforeach
@else
    @if(isset($registrasiVendor) && isset($registrasiVendor->daftar_direksi) && $registrasiVendor->daftar_direksi)
        @foreach($registrasiVendor->daftar_direksi as $daftarDireksi)
            @php
                $uniqueStringDireksi = uniqueString(8);
            @endphp
            <div class="row div-group-daftar-direksi">
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nomor Identitas Direksi</span>
                    </label>
                    <input type="text" required maxlength="255"
                           class="form-control" value="{{ $daftarDireksi->no_identitas_direksi }}"
                           name="daftar_direksi[{{ $uniqueStringDireksi }}][no_identitas_direksi]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Jenis Identitas Direksi</span>
                    </label>
                    <select required maxlength="255"
                            class="form-select" data-control="select2"
                            name="daftar_direksi[{{ $uniqueStringDireksi }}][kode_master_jenis_identitas_direksi]">
                        @foreach($vendorJenisIdentitas as $jenisIdentitas)
                            <option value="{{ $jenisIdentitas->kode }}" {{ $jenisIdentitas->kode == $daftarDireksi->kode_master_jenis_identitas_direksi ? 'selected' : '' }}>{{ $jenisIdentitas->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nama Direksi</span>
                    </label>
                    <input type="text" required maxlength="255"
                           class="form-control" value="{{ $daftarDireksi->nama_direksi }}"
                           name="daftar_direksi[{{ $uniqueStringDireksi }}][nama_direksi]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Alamat Direksi</span>
                    </label>
                    <textarea type="text" required maxlength="255"
                              class="form-control" rows="1"
                              name="daftar_direksi[{{ $uniqueStringDireksi }}][alamat_direksi]">{{ $daftarDireksi->alamat_direksi }}</textarea>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Jabatan Direksi</span>
                    </label>
                    <select required
                            class="form-select" data-control="select2"
                            name="daftar_direksi[{{ $uniqueStringDireksi }}][kode_master_jabatan_vendor_direksi]">
                        @foreach($vendorJabatan as $direksiJabatan)
                            <option value="{{ $direksiJabatan->kode }}" {{ $direksiJabatan->kode == $daftarDireksi->kode_master_jabatan_vendor_direksi ? 'selected' : '' }}>{{ $direksiJabatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tanggal Lahir Direksi</span>
                    </label>
                    <input type="date" required
                           class="form-control" value="{{ $daftarDireksi->tanggal_lahir_direksi }}"
                           name="daftar_direksi[{{ $uniqueStringDireksi }}][tanggal_lahir_direksi]"/>
                </div>
                @if(!request()->routeIs('menu.**.show'))
                    @if(!$loop->first)
                        <div class="row">
                            <div class="d-flex justify-content-center mt-3 mb-7">
                                <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-direksi">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    @endif
                @endif
                <hr>
            </div>
        @endforeach
    @else
        <div class="row div-group-daftar-direksi">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nomor Identitas Direksi</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control"
                       name="daftar_direksi[{{ $uniqueStringDireksi }}][no_identitas_direksi]"/>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Identitas Direksi</span>
                </label>
                <select required maxlength="255"
                        class="form-select" data-control="select2"
                        name="daftar_direksi[{{ $uniqueStringDireksi }}][kode_master_jenis_identitas_direksi]">
                    @foreach($vendorJenisIdentitas as $jenisIdentitas)
                        <option value="{{ $jenisIdentitas->kode }}">{{ $jenisIdentitas->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Direksi</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control"
                       name="daftar_direksi[{{ $uniqueStringDireksi }}][nama_direksi]"/>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Alamat Direksi</span>
                </label>
                <textarea type="text" required maxlength="255"
                          class="form-control" rows="1"
                          name="daftar_direksi[{{ $uniqueStringDireksi }}][alamat_direksi]"></textarea>
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jabatan Direksi</span>
                </label>
                <select required
                        class="form-select" data-control="select2"
                        name="daftar_direksi[{{ $uniqueStringDireksi }}][kode_master_jabatan_vendor_direksi]">
                    @foreach($vendorJabatan as $direksiJabatan)
                        <option value="{{ $direksiJabatan->kode }}">{{ $direksiJabatan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-12 mb-7">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Lahir Direksi</span>
                </label>
                <input type="date" required
                       class="form-control"
                       name="daftar_direksi[{{ $uniqueStringDireksi }}][tanggal_lahir_direksi]"/>
            </div>
            <hr>
        </div>
    @endif
@endif
