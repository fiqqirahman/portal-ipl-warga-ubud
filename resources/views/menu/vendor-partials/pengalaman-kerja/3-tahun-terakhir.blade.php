@php
    $uniqueStringPengalamanKerja = uniqueString(8);
@endphp

<div class="row">
    <div class="d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-sm btn-info" id="btn-add-row-daftar-pengalaman-kerja-3-tahun-terakhir">
            Tambah
        </button>
    </div>
</div>

@if($errors->any())
    @foreach(old('pengalaman3TahunTerakhir') ?? [] as $key => $oldDaftarTenagaAhli3TahunTerakhir)
        <div class="row div-group-daftar-pengalaman-kerja-3-tahun-terakhir">
            <input type="hidden" name="pengalaman3TahunTerakhir[{{ $key }}][kodefikasi_tab]" value="Pengalaman Pekerjaan 3 Tahun Terakhir">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Pekerjaan</span>
                </label>
                <input type="text" maxlength="255" value="{{ $oldDaftarTenagaAhli3TahunTerakhir['nama_pekerjaan'] }}"
                       class="form-control @error("pengalaman3TahunTerakhir.{$key}.nama_pekerjaan") is-invalid @enderror" required
                       name="pengalaman3TahunTerakhir[{{ $key }}][nama_pekerjaan]" />
                @error("pengalaman3TahunTerakhir.{$key}.nama_pekerjaan")
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
                        class="form-control @error("pengalaman3TahunTerakhir.{$key}.lokasi_pekerjaan") is-invalid @enderror form-select"
                        name="pengalaman3TahunTerakhir[{{ $key }}][lokasi_pekerjaan]">
                    @foreach($masterKabKota as $kabKota)
                        <option value="{{ $kabKota->kode }}" {{ $kabKota->kode == $oldDaftarTenagaAhli3TahunTerakhir['lokasi_pekerjaan'] ? 'selected' : '' }}>{{ $kabKota->nama }}</option>
                    @endforeach
                </select>
                @error("pengalaman3TahunTerakhir.{$key}.lokasi_pekerjaan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Pemberi Pekerjaan</span>
                </label>
                <input type="text" maxlength="255" required value="{{ $oldDaftarTenagaAhli3TahunTerakhir['pemberi_pekerjaan'] }}"
                       class="form-control @error("pengalaman3TahunTerakhir.{$key}.pemberi_pekerjaan") is-invalid @enderror"
                       name="pengalaman3TahunTerakhir[{{ $key }}][pemberi_pekerjaan]"/>
                @error("pengalaman3TahunTerakhir.{$key}.pemberi_pekerjaan")
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
                        class="form-control @error("pengalaman3TahunTerakhir.{$key}.kode_jenis_pekerjaan") is-invalid @enderror form-select"
                        name="pengalaman3TahunTerakhir[{{ $key }}][kode_jenis_pekerjaan]">
                    @foreach($stmtSubBidangUsaha as $bidangUsaha)
                        <option value="{{ $bidangUsaha->kode }}" {{ $bidangUsaha->kode == $oldDaftarTenagaAhli3TahunTerakhir['kode_jenis_pekerjaan'] ? 'selected' : '' }}>{{ $bidangUsaha->nama }}</option>
                    @endforeach
                </select>
                @error("pengalaman3TahunTerakhir.{$key}.kode_jenis_pekerjaan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">No. Telp Perusahaan/PIC</span>
                </label>
                <input type="text" maxlength="20" required value="{{ $oldDaftarTenagaAhli3TahunTerakhir['no_telfon_perusahaan_atau_pic'] }}"
                       class="form-control @error("pengalaman3TahunTerakhir.{$key}.no_telfon_perusahaan_atau_pic") is-invalid @enderror positive-numeric"
                       name="pengalaman3TahunTerakhir[{{ $key }}][no_telfon_perusahaan_atau_pic]"/>
                @error("pengalaman3TahunTerakhir.{$key}.no_telfon_perusahaan_atau_pic")
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
                        class="form-control @error("pengalaman3TahunTerakhir.{$key}.kode_bidang_usaha") is-invalid @enderror form-select"
                        name="pengalaman3TahunTerakhir[{{ $key }}][kode_bidang_usaha]">
                    @foreach($stmtKategoriVendor as $kategoriVendor)
                        <option value="{{ $kategoriVendor->kode }}" {{ $kategoriVendor->kode == $oldDaftarTenagaAhli3TahunTerakhir['kode_bidang_usaha'] ? 'selected' : '' }}>{{ $kategoriVendor->nama }}</option>
                    @endforeach
                </select>
                @error("pengalaman3TahunTerakhir.{$key}.kode_bidang_usaha")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Mulai Kerjasama</span>
                </label>
                <input type="date" required value="{{ $oldDaftarTenagaAhli3TahunTerakhir['tanggal_mulai_kerjasama'] }}"
                       class="form-control @error("pengalaman3TahunTerakhir.{$key}.tanggal_mulai_kerjasama") is-invalid @enderror"
                       name="pengalaman3TahunTerakhir[{{ $key }}][tanggal_mulai_kerjasama]"/>
                @error("pengalaman3TahunTerakhir.{$key}.tanggal_mulai_kerjasama")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">No. Kontrak</span>
                </label>
                <input type="text" required maxlength="255" value="{{ $oldDaftarTenagaAhli3TahunTerakhir['no_kontrak'] }}"
                       class="form-control @error("pengalaman3TahunTerakhir.{$key}.no_kontrak") is-invalid @enderror"
                       name="pengalaman3TahunTerakhir[{{ $key }}][no_kontrak]"/>
                @error("pengalaman3TahunTerakhir.{$key}.no_kontrak")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Kontrak</span>
                </label>
                <input type="date" required value="{{ $oldDaftarTenagaAhli3TahunTerakhir['tanggal_kontrak'] }}"
                       class="form-control @error("pengalaman3TahunTerakhir.{$key}.tanggal_kontrak") is-invalid @enderror"
                       name="pengalaman3TahunTerakhir[{{ $key }}][tanggal_kontrak]"/>
                @error("pengalaman3TahunTerakhir.{$key}.tanggal_kontrak")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nilai Kontrak</span>
                </label>
                <input type="text" required onkeyup="formatRupiah(this)" value="{{ $oldDaftarTenagaAhli3TahunTerakhir['nilai_kontrak'] }}"
                       class="form-control @error("pengalaman3TahunTerakhir.{$key}.nilai_kontrak") is-invalid @enderror" maxlength="26"
                       name="pengalaman3TahunTerakhir[{{ $key }}][nilai_kontrak]"/>
                @error("pengalaman3TahunTerakhir.{$key}.nilai_kontrak")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="d-flex justify-content-center mt-3 mb-7">
                    <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-pengalaman-kerja-3-tahun-terakhir">
                        Hapus
                    </button>
                </div>
            </div>
            <hr>
        </div>
    @endforeach
@else
    @if(isset($registrasiVendor) && isset($registrasiVendor->pengalaman3TahunTerakhir) && $registrasiVendor->pengalaman3TahunTerakhir)
        @foreach($registrasiVendor->pengalaman3TahunTerakhir as $daftarPengalaman3TahunTerakhir)
            @php
                $uniqueStringPengalamanKerja = uniqueString(8);
            @endphp
            <div class="row div-group-daftar-pengalaman-kerja-3-tahun-terakhir">
                <input type="hidden" name="pengalaman3TahunTerakhir[{{ $key }}][kodefikasi_tab]" value="Pengalaman Pekerjaan 3 Tahun Terakhir">
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nama Pekerjaan</span>
                    </label>
                    <input type="text" maxlength="255" value="{{ $daftarPengalaman3TahunTerakhir->nama_pekerjaan }}"
                           class="form-control" required
                           name="pengalaman3TahunTerakhir[{{ $uniqueStringPengalamanKerja }}][nama_pekerjaan]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Lokasi Pekerjaan</span>
                    </label>
                    <select required data-control="select2"
                            data-placeholder="---Pilih Lokasi Pekerjaan---"
                            class="form-control form-select"
                            name="pengalaman3TahunTerakhir[{{ $uniqueStringPengalamanKerja }}][lokasi_pekerjaan]">
                        @foreach($masterKabKota as $kabKota)
                            <option value="{{ $kabKota->kode }}" {{ $kabKota->kode == $daftarPengalaman3TahunTerakhir->lokasi_pekerjaan ? 'selected' : '' }}>{{ $kabKota->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Pemberi Pekerjaan</span>
                    </label>
                    <input type="text" maxlength="255" required value="{{ $daftarPengalaman3TahunTerakhir->pemberi_pekerjaan }}"
                           class="form-control"
                           name="pengalaman3TahunTerakhir[{{ $uniqueStringPengalamanKerja }}][pemberi_pekerjaan]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Jenis Pekerjaan</span>
                    </label>
                    <select required data-control="select2"
                            data-placeholder="---Pilih Jenis Pekerjaan---"
                            class="form-control form-select"
                            name="pengalaman3TahunTerakhir[{{ $uniqueStringPengalamanKerja }}][kode_jenis_pekerjaan]">
                        @foreach($stmtSubBidangUsaha as $bidangUsaha)
                            <option value="{{ $bidangUsaha->kode }}" {{ $bidangUsaha->kode == $daftarPengalaman3TahunTerakhir->kode_jenis_pekerjaan ? 'selected' : '' }}>{{ $bidangUsaha->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">No. Telp Perusahaan/PIC</span>
                    </label>
                    <input type="text" maxlength="20" required value="{{ $daftarPengalaman3TahunTerakhir->no_telfon_perusahaan_atau_pic }}"
                           class="form-control positive-numeric"
                           name="pengalaman3TahunTerakhir[{{ $uniqueStringPengalamanKerja }}][no_telfon_perusahaan_atau_pic]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Bidang Usaha</span>
                    </label>
                    <select required data-control="select2"
                            data-placeholder="---Pilih Bidang Usaha---"
                            class="form-control form-select"
                            name="pengalaman3TahunTerakhir[{{ $uniqueStringPengalamanKerja }}][kode_bidang_usaha]">
                        @foreach($stmtKategoriVendor as $kategoriVendor)
                            <option value="{{ $kategoriVendor->kode }}" {{ $kategoriVendor->kode == $daftarPengalaman3TahunTerakhir->kode_bidang_usaha ? 'selected' : '' }}>{{ $kategoriVendor->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Mulai Kerjasama</span>
                    </label>
                    <input type="date" required value="{{ $daftarPengalaman3TahunTerakhir->tanggal_mulai_kerjasama }}"
                           class="form-control"
                           name="pengalaman3TahunTerakhir[{{ $uniqueStringPengalamanKerja }}][tanggal_mulai_kerjasama]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">No. Kontrak</span>
                    </label>
                    <input type="text" required maxlength="255" value="{{ $daftarPengalaman3TahunTerakhir->no_kontrak }}"
                           class="form-control"
                           name="pengalaman3TahunTerakhir[{{ $uniqueStringPengalamanKerja }}][no_kontrak]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tanggal Kontrak</span>
                    </label>
                    <input type="date" required value="{{ $daftarPengalaman3TahunTerakhir->tanggal_kontrak }}"
                           class="form-control"
                           name="pengalaman3TahunTerakhir[{{ $uniqueStringPengalamanKerja }}][tanggal_kontrak]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nilai Kontrak</span>
                    </label>
                    <input type="text" required onkeyup="formatRupiah(this)" value="{{ $daftarPengalaman3TahunTerakhir->nilai_kontrak }}"
                           class="form-control" maxlength="26"
                           name="pengalaman3TahunTerakhir[{{ $uniqueStringPengalamanKerja }}][nilai_kontrak]"/>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-center mt-3 mb-7">
                        <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-pengalaman-kerja-3-tahun-terakhir">
                            Hapus
                        </button>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
    @endif
@endif