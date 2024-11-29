@php
    $uniqueStringKomisaris = uniqueString(8);
@endphp
@if(!request()->routeIs('menu.**.show'))
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-sm btn-info" id="btn-add-row-daftar-komisaris">
                Tambah
            </button>
        </div>
    </div>
@endif

@if($errors->any())
    @foreach(old('daftar_komisaris') ?? [] as $key => $oldDaftarKomisaris)
        <div class="row div-group-daftar-komisaris">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nomor Identitas Komisaris</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control @error("daftar_komisaris.{$key}.no_identitas_komisaris") is-invalid @enderror" value="{{ $oldDaftarKomisaris['no_identitas_komisaris'] }}"
                       name="daftar_komisaris[{{ $key }}][no_identitas_komisaris]"/>
                @error("daftar_komisaris.{$key}.no_identitas_komisaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Identitas Komisaris</span>
                </label>
                <select type="text" required maxlength="255"
                        class="form-control @error("daftar_komisaris.{$key}.kode_master_jenis_identitas_komisaris") is-invalid @enderror" data-control="select2"
                        name="daftar_komisaris[{{ $key }}][kode_master_jenis_identitas_komisaris]">
                    @foreach($vendorJenisIdentitas as $jenisIdentitas)
                        <option value="{{ $jenisIdentitas->kode }}" {{ $jenisIdentitas->kode == $oldDaftarKomisaris['kode_master_jenis_identitas_komisaris'] ? 'selected' : '' }}>{{ $jenisIdentitas->nama }}</option>
                    @endforeach
                </select>
                @error("daftar_komisaris.{$key}.kode_master_jenis_identitas_komisaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Komisaris</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control @error("daftar_komisaris.{$key}.nama_komisaris") is-invalid @enderror" value="{{ $oldDaftarKomisaris['nama_komisaris'] }}"
                       name="daftar_komisaris[{{ $key }}][nama_komisaris]" />
                @error("daftar_komisaris.{$key}.nama_komisaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Alamat Komisaris</span>
                </label>
                <textarea type="text" required maxlength="255"
                          class="form-control @error("daftar_komisaris.{$key}.alamat_komisaris") is-invalid @enderror" rows="1"
                          name="daftar_komisaris[{{ $key }}][alamat_komisaris]">{{ $oldDaftarKomisaris['alamat_komisaris'] }}</textarea>
                @error("daftar_komisaris.{$key}.alamat_komisaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jabatan Komisaris</span>
                </label>
                <select required
                        class="form-control @error("daftar_komisaris.{$key}.kode_master_jabatan_vendor_komisaris") is-invalid @enderror" data-control="select2"
                        name="daftar_komisaris[{{ $key }}][kode_master_jabatan_vendor_komisaris]">
                    @foreach($vendorJabatan as $komisarisJabatan)
                        <option value="{{ $komisarisJabatan->kode }}" {{ $komisarisJabatan->kode == $oldDaftarKomisaris['kode_master_jabatan_vendor_komisaris'] ? 'selected' : '' }}>{{ $komisarisJabatan->nama }}</option>
                    @endforeach
                </select>
                @error("daftar_komisaris.{$key}.kode_master_jabatan_vendor_komisaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-7">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Lahir Komisaris</span>
                </label>
                <input type="date" required
                       class="form-control @error("daftar_komisaris.{$key}.tanggal_lahir_komisaris") is-invalid @enderror" value="{{ $oldDaftarKomisaris['tanggal_lahir_komisaris'] }}"
                       name="daftar_komisaris[{{ $key }}][tanggal_lahir_komisaris]" />
                @error("daftar_komisaris.{$key}.tanggal_lahir_komisaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @if(!request()->routeIs('menu.**.show'))
                @if(!$loop->first)
                    <div class="row">
                        <div class="d-flex justify-content-center mt-3 mb-7">
                            <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-komisaris">
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
    @if(isset($registrasiVendor) && isset($registrasiVendor->daftar_komisaris) && $registrasiVendor->daftar_komisaris)
        @foreach($registrasiVendor->daftar_komisaris as $daftarKomisaris)
            @php
                $uniqueStringKomisaris = uniqueString(8);
            @endphp
            <div class="row div-group-daftar-komisaris">
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nomor Identitas Komisaris</span>
                    </label>
                    <input type="text" required maxlength="255"
                           class="form-control" value="{{ $daftarKomisaris->no_identitas_komisaris }}"
                           name="daftar_komisaris[{{ $uniqueStringKomisaris }}][no_identitas_komisaris]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Jenis Identitas Komisaris</span>
                    </label>
                    <select type="text" required maxlength="255"
                            class="form-control" data-control="select2"
                            name="daftar_komisaris[{{ $uniqueStringKomisaris }}][kode_master_jenis_identitas_komisaris]">
                        @foreach($vendorJenisIdentitas as $jenisIdentitas)
                            <option value="{{ $jenisIdentitas->kode }}" {{ $jenisIdentitas->kode == $daftarKomisaris->kode_master_jenis_identitas_komisaris ? 'selected' : '' }}>{{ $jenisIdentitas->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nama Komisaris</span>
                    </label>
                    <input type="text" required maxlength="255"
                           class="form-control" value="{{ $daftarKomisaris->nama_komisaris }}"
                           name="daftar_komisaris[{{ $uniqueStringKomisaris }}][nama_komisaris]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Alamat Komisaris</span>
                    </label>
                    <textarea type="text" required maxlength="255"
                              class="form-control" rows="1"
                              name="daftar_komisaris[{{ $uniqueStringKomisaris }}][alamat_komisaris]">{{ $daftarKomisaris->alamat_komisaris }}</textarea>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Jabatan Komisaris</span>
                    </label>
                    <select required
                            class="form-control" data-control="select2"
                            name="daftar_komisaris[{{ $uniqueStringKomisaris }}][kode_master_jabatan_vendor_komisaris]">
                        @foreach($vendorJabatan as $komisarisJabatan)
                            <option value="{{ $komisarisJabatan->kode }}" {{ $komisarisJabatan->kode == $daftarKomisaris->kode_master_jabatan_vendor_komisaris ? 'selected' : '' }}>{{ $komisarisJabatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tanggal Lahir Komisaris</span>
                    </label>
                    <input type="date" required
                           class="form-control" value="{{ $daftarKomisaris->tanggal_lahir_komisaris }}"
                           name="daftar_komisaris[{{ $uniqueStringKomisaris }}][tanggal_lahir_komisaris]" />
                </div>
                @if(!request()->routeIs('menu.**.show'))
                    @if(!$loop->first)
                        <div class="row">
                            <div class="d-flex justify-content-center mt-3 mb-7">
                                <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-komisaris">
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
                @foreach($vendorJenisIdentitas as $jenisIdentitas)
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
                @foreach($vendorJabatan as $komisarisJabatan)
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
    @endif
@endif