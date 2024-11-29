@php
    $uniqueStringPengalamanPekerjaanBerjalan = uniqueString(8);
@endphp

@if(!request()->routeIs('menu.**.show'))
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-sm btn-info" id="btn-add-row-daftar-pengalaman-pekerjaan-berjalan">
                Tambah
            </button>
        </div>
    </div>
@endif

@if($errors->any())
    @foreach(old('pengalamanPekerjaanBerjalan') ?? [] as $key => $oldDaftarPengalamanPekerjaanBerjalan)
        <div class="row div-group-daftar-pengalaman-pekerjaan-berjalan">
            <input type="hidden" name="pengalamanPekerjaanBerjalan[{{ $key }}][kodefikasi_tab]" value="Pekerjaan Berjalan">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Pekerjaan</span>
                </label>
                <input type="text" maxlength="255" value="{{ $oldDaftarPengalamanPekerjaanBerjalan['nama_pekerjaan'] }}"
                       class="form-control @error("pengalamanPekerjaanBerjalan.{$key}.nama_pekerjaan") is-invalid @enderror" required
                       name="pengalamanPekerjaanBerjalan[{{ $key }}][nama_pekerjaan]" />
                @error("pengalamanPekerjaanBerjalan.{$key}.nama_pekerjaan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Lokasi Pekerjaan</span>
                </label>
                <select required data-control="select2"
                        data-placeholder="---Pilih Lokasi Pekerjaan---"
                        class="form-control @error("pengalamanPekerjaanBerjalan.{$key}.lokasi_pekerjaan") is-invalid @enderror form-select"
                        name="pengalamanPekerjaanBerjalan[{{ $key }}][lokasi_pekerjaan]">
                    @foreach($masterKabKota as $kabKota)
                        <option value="{{ $kabKota->kode }}" {{ $kabKota->kode == $oldDaftarPengalamanPekerjaanBerjalan['lokasi_pekerjaan'] ? 'selected' : '' }}>{{ $kabKota->nama }}</option>
                    @endforeach
                </select>
                @error("pengalamanPekerjaanBerjalan.{$key}.lokasi_pekerjaan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Pemberi Pekerjaan</span>
                </label>
                <input type="text" maxlength="255" required value="{{ $oldDaftarPengalamanPekerjaanBerjalan['pemberi_pekerjaan'] }}"
                       class="form-control @error("pengalamanPekerjaanBerjalan.{$key}.pemberi_pekerjaan") is-invalid @enderror"
                       name="pengalamanPekerjaanBerjalan[{{ $key }}][pemberi_pekerjaan]"/>
                @error("pengalamanPekerjaanBerjalan.{$key}.pemberi_pekerjaan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Pekerjaan</span>
                </label>
                <select required data-control="select2"
                        data-placeholder="---Pilih Jenis Pekerjaan---"
                        class="form-control @error("pengalamanPekerjaanBerjalan.{$key}.kode_jenis_pekerjaan") is-invalid @enderror form-select"
                        name="pengalamanPekerjaanBerjalan[{{ $key }}][kode_jenis_pekerjaan]">
                    @foreach($stmtSubBidangUsaha as $bidangUsaha)
                        <option value="{{ $bidangUsaha->kode }}" {{ $bidangUsaha->kode == $oldDaftarPengalamanPekerjaanBerjalan['kode_jenis_pekerjaan'] ? 'selected' : '' }}>{{ $bidangUsaha->nama }}</option>
                    @endforeach
                </select>
                @error("pengalamanPekerjaanBerjalan.{$key}.kode_jenis_pekerjaan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">No. Telp Perusahaan/PIC</span>
                </label>
                <input type="text" maxlength="20" required value="{{ $oldDaftarPengalamanPekerjaanBerjalan['no_telfon_perusahaan_atau_pic'] }}"
                       class="form-control @error("pengalamanPekerjaanBerjalan.{$key}.no_telfon_perusahaan_atau_pic") is-invalid @enderror positive-numeric"
                       name="pengalamanPekerjaanBerjalan[{{ $key }}][no_telfon_perusahaan_atau_pic]"/>
                @error("pengalamanPekerjaanBerjalan.{$key}.no_telfon_perusahaan_atau_pic")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Bidang Usaha</span>
                </label>
                <select required data-control="select2"
                        data-placeholder="---Pilih Bidang Usaha---"
                        class="form-control @error("pengalamanPekerjaanBerjalan.{$key}.kode_bidang_usaha") is-invalid @enderror form-select"
                        name="pengalamanPekerjaanBerjalan[{{ $key }}][kode_bidang_usaha]">
                    @foreach($stmtKategoriVendor as $kategoriVendor)
                        <option value="{{ $kategoriVendor->kode }}" {{ $kategoriVendor->kode == $oldDaftarPengalamanPekerjaanBerjalan['kode_bidang_usaha'] ? 'selected' : '' }}>{{ $kategoriVendor->nama }}</option>
                    @endforeach
                </select>
                @error("pengalamanPekerjaanBerjalan.{$key}.kode_bidang_usaha")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Mulai Kerjasama</span>
                </label>
                <input type="date" required value="{{ $oldDaftarPengalamanPekerjaanBerjalan['tanggal_mulai_kerjasama'] }}"
                       class="form-control @error("pengalamanPekerjaanBerjalan.{$key}.tanggal_mulai_kerjasama") is-invalid @enderror"
                       name="pengalamanPekerjaanBerjalan[{{ $key }}][tanggal_mulai_kerjasama]"/>
                @error("pengalamanPekerjaanBerjalan.{$key}.tanggal_mulai_kerjasama")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">No. Kontrak</span>
                </label>
                <input type="text" required maxlength="255" value="{{ $oldDaftarPengalamanPekerjaanBerjalan['no_kontrak'] }}"
                       class="form-control @error("pengalamanPekerjaanBerjalan.{$key}.no_kontrak") is-invalid @enderror"
                       name="pengalamanPekerjaanBerjalan[{{ $key }}][no_kontrak]"/>
                @error("pengalamanPekerjaanBerjalan.{$key}.no_kontrak")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Kontrak</span>
                </label>
                <input type="date" required value="{{ $oldDaftarPengalamanPekerjaanBerjalan['tanggal_kontrak'] }}"
                       class="form-control @error("pengalamanPekerjaanBerjalan.{$key}.tanggal_kontrak") is-invalid @enderror"
                       name="pengalamanPekerjaanBerjalan[{{ $key }}][tanggal_kontrak]"/>
                @error("pengalamanPekerjaanBerjalan.{$key}.tanggal_kontrak")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nilai Kontrak</span>
                </label>
                <input type="text" required onkeyup="formatRupiah(this)" value="{{ $oldDaftarPengalamanPekerjaanBerjalan['nilai_kontrak'] }}"
                       class="form-control @error("pengalamanPekerjaanBerjalan.{$key}.nilai_kontrak") is-invalid @enderror" maxlength="26"
                       name="pengalamanPekerjaanBerjalan[{{ $key }}][nilai_kontrak]"/>
                @error("pengalamanPekerjaanBerjalan.{$key}.nilai_kontrak")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @if(!request()->routeIs('menu.**.show'))
                <div class="row">
                    <div class="d-flex justify-content-center mt-3 mb-7">
                        <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-pengalaman-pekerjaan-berjalan">
                            Hapus
                        </button>
                    </div>
                </div>
            @endif
            <hr>
        </div>
    @endforeach
@else
    @if(isset($registrasiVendor) && isset($registrasiVendor->pengalamanPekerjaanBerjalan) && $registrasiVendor->pengalamanPekerjaanBerjalan)
        @foreach($registrasiVendor->pengalamanPekerjaanBerjalan as $daftarPengalamanPekerjaanBerjalan)
            @php
                $uniqueStringPengalamanPekerjaanBerjalan = uniqueString(8);
            @endphp
            <div class="row div-group-daftar-pengalaman-pekerjaan-berjalan">
                <input type="hidden" name="pengalamanPekerjaanBerjalan[{{ $key }}][kodefikasi_tab]" value="Pekerjaan Berjalan">
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nama Pekerjaan</span>
                    </label>
                    <input type="text" maxlength="255" value="{{ $daftarPengalamanPekerjaanBerjalan->nama_pekerjaan }}"
                           class="form-control" required
                           name="pengalamanPekerjaanBerjalan[{{ $uniqueStringPengalamanPekerjaanBerjalan }}][nama_pekerjaan]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Lokasi Pekerjaan</span>
                    </label>
                    <select required data-control="select2"
                            data-placeholder="---Pilih Lokasi Pekerjaan---"
                            class="form-control form-select"
                            name="pengalamanPekerjaanBerjalan[{{ $uniqueStringPengalamanPekerjaanBerjalan }}][lokasi_pekerjaan]">
                        @foreach($masterKabKota as $kabKota)
                            <option value="{{ $kabKota->kode }}" {{ $kabKota->kode == $daftarPengalamanPekerjaanBerjalan->lokasi_pekerjaan ? 'selected' : '' }}>{{ $kabKota->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Pemberi Pekerjaan</span>
                    </label>
                    <input type="text" maxlength="255" required value="{{ $daftarPengalamanPekerjaanBerjalan->pemberi_pekerjaan }}"
                           class="form-control"
                           name="pengalamanPekerjaanBerjalan[{{ $uniqueStringPengalamanPekerjaanBerjalan }}][pemberi_pekerjaan]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Jenis Pekerjaan</span>
                    </label>
                    <select required data-control="select2"
                            data-placeholder="---Pilih Jenis Pekerjaan---"
                            class="form-control form-select"
                            name="pengalamanPekerjaanBerjalan[{{ $uniqueStringPengalamanPekerjaanBerjalan }}][kode_jenis_pekerjaan]">
                        @foreach($stmtSubBidangUsaha as $bidangUsaha)
                            <option value="{{ $bidangUsaha->kode }}" {{ $bidangUsaha->kode == $daftarPengalamanPekerjaanBerjalan->kode_jenis_pekerjaan ? 'selected' : '' }}>{{ $bidangUsaha->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">No. Telp Perusahaan/PIC</span>
                    </label>
                    <input type="text" maxlength="20" required value="{{ $daftarPengalamanPekerjaanBerjalan->no_telfon_perusahaan_atau_pic }}"
                           class="form-control positive-numeric"
                           name="pengalamanPekerjaanBerjalan[{{ $uniqueStringPengalamanPekerjaanBerjalan }}][no_telfon_perusahaan_atau_pic]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Bidang Usaha</span>
                    </label>
                    <select required data-control="select2"
                            data-placeholder="---Pilih Bidang Usaha---"
                            class="form-control form-select"
                            name="pengalamanPekerjaanBerjalan[{{ $uniqueStringPengalamanPekerjaanBerjalan }}][kode_bidang_usaha]">
                        @foreach($stmtKategoriVendor as $kategoriVendor)
                            <option value="{{ $kategoriVendor->kode }}" {{ $kategoriVendor->kode == $daftarPengalamanPekerjaanBerjalan->kode_bidang_usaha ? 'selected' : '' }}>{{ $kategoriVendor->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Mulai Kerjasama</span>
                    </label>
                    <input type="date" required value="{{ $daftarPengalamanPekerjaanBerjalan->tanggal_mulai_kerjasama }}"
                           class="form-control"
                           name="pengalamanPekerjaanBerjalan[{{ $uniqueStringPengalamanPekerjaanBerjalan }}][tanggal_mulai_kerjasama]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">No. Kontrak</span>
                    </label>
                    <input type="text" required maxlength="255" value="{{ $daftarPengalamanPekerjaanBerjalan->no_kontrak }}"
                           class="form-control"
                           name="pengalamanPekerjaanBerjalan[{{ $uniqueStringPengalamanPekerjaanBerjalan }}][no_kontrak]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tanggal Kontrak</span>
                    </label>
                    <input type="date" required value="{{ $daftarPengalamanPekerjaanBerjalan->tanggal_kontrak }}"
                           class="form-control"
                           name="pengalamanPekerjaanBerjalan[{{ $uniqueStringPengalamanPekerjaanBerjalan }}][tanggal_kontrak]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nilai Kontrak</span>
                    </label>
                    <input type="text" required onkeyup="formatRupiah(this)" value="{{ $daftarPengalamanPekerjaanBerjalan->nilai_kontrak }}"
                           class="form-control" maxlength="26"
                           name="pengalamanPekerjaanBerjalan[{{ $uniqueStringPengalamanPekerjaanBerjalan }}][nilai_kontrak]"/>
                </div>
                @if(!request()->routeIs('menu.**.show'))
                    <div class="row">
                        <div class="d-flex justify-content-center mt-3 mb-7">
                            <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-pengalaman-pekerjaan-berjalan">
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