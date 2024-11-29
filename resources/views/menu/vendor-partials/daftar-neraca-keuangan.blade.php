@php
    $uniqueStringNeracaKeuangan = uniqueString(8);
@endphp
@if(!request()->routeIs('menu.**.show'))
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-sm btn-info" id="btn-add-row-daftar-neraca-keuangan">
                Tambah
            </button>
        </div>
    </div>
@endif

@if($errors->any())
    @foreach(old('neraca_keuangan') ?? [] as $key => $oldDaftarNeracaKeuangan)
        <div class="row div-group-daftar-neraca-keuangan">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tahun Data Keuangan</span>
                </label>
                <input id="yearpicker-{{ $key }}" placeholder="YYYY" required
                       class="form-control @error("neraca_keuangan.{$key}.tahun_data_keuangan") is-invalid @enderror yearpicker-neraca-keuangan"
                       value="{{ $oldDaftarNeracaKeuangan['tahun_data_keuangan'] }}"
                       name="neraca_keuangan[{{ $key }}][tahun_data_keuangan]" />
                @error("neraca_keuangan.{$key}.tahun_data_keuangan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Mata Uang Data Keuangan</span>
                </label>
                <input type="text" maxlength="50" placeholder="IDR"
                       value="{{ $oldDaftarNeracaKeuangan['mata_uang_data_keuangan'] ?? 'IDR' }}"
                       class="form-control @error("neraca_keuangan.{$key}.mata_uang_data_keuangan") is-invalid @enderror" required
                       name="neraca_keuangan[{{ $key }}][mata_uang_data_keuangan]" />
                @error("neraca_keuangan.{$key}.mata_uang_data_keuangan")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Aktiva Lancar</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       value="{{ $oldDaftarNeracaKeuangan['aktiva_lancar'] }}"
                       class="form-control @error("neraca_keuangan.{$key}.aktiva_lancar") is-invalid @enderror" required maxlength="50"
                       name="neraca_keuangan[{{ $key }}][aktiva_lancar]" />
                @error("neraca_keuangan.{$key}.aktiva_lancar")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Hutang Lancar</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       value="{{ $oldDaftarNeracaKeuangan['hutang_lancar'] }}"
                       class="form-control @error("neraca_keuangan.{$key}.hutang_lancar") is-invalid @enderror" required maxlength="50"
                       name="neraca_keuangan[{{ $key }}][hutang_lancar]" />
                @error("neraca_keuangan.{$key}.hutang_lancar")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Rasio Likuiditas</span>
                </label>
                <input type="text" pattern="[0-9.]*" title="Hanya Angka dan Titik (.) diperbolehkan"
                       placeholder="Contoh : 1.4"
                       value="{{ $oldDaftarNeracaKeuangan['rasio_likuiditas'] }}"
                       class="form-control @error("neraca_keuangan.{$key}.rasio_likuiditas") is-invalid @enderror" required maxlength="20"
                       name="neraca_keuangan[{{ $key }}][rasio_likuiditas]" />
                @error("neraca_keuangan.{$key}.rasio_likuiditas")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Total Hutang</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       value="{{ $oldDaftarNeracaKeuangan['total_hutang'] }}"
                       class="form-control @error("neraca_keuangan.{$key}.total_hutang") is-invalid @enderror" required maxlength="50"
                       name="neraca_keuangan[{{ $key }}][total_hutang]" />
                @error("neraca_keuangan.{$key}.total_hutang")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Ekuitas</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       value="{{ $oldDaftarNeracaKeuangan['ekuitas'] }}"
                       class="form-control @error("neraca_keuangan.{$key}.ekuitas") is-invalid @enderror" required maxlength="50"
                       name="neraca_keuangan[{{ $key }}][ekuitas]" />
                @error("neraca_keuangan.{$key}.ekuitas")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Rasio Hutang</span>
                </label>
                <input type="text" pattern="[0-9.]*" title="Hanya Angka dan Titik (.) diperbolehkan"
                       value="{{ $oldDaftarNeracaKeuangan['rasio_hutang'] }}"
                       class="form-control @error("neraca_keuangan.{$key}.rasio_hutang") is-invalid @enderror" required maxlength="20"
                       name="neraca_keuangan[{{ $key }}][rasio_hutang]" />
                @error("neraca_keuangan.{$key}.rasio_hutang")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Laba Rugi</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       value="{{ $oldDaftarNeracaKeuangan['laba_rugi'] }}"
                       class="form-control @error("neraca_keuangan.{$key}.laba_rugi") is-invalid @enderror" required maxlength="50"
                       name="neraca_keuangan[{{ $key }}][laba_rugi]" />
                @error("neraca_keuangan.{$key}.laba_rugi")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Return of Equity</span>
                </label>
                <input type="text" pattern="[0-9.]*" title="Hanya Angka dan Titik (.) diperbolehkan"
                       placeholder="%" value="{{ $oldDaftarNeracaKeuangan['return_of_equity'] }}"
                       class="form-control @error("neraca_keuangan.{$key}.return_of_equity") is-invalid @enderror" required maxlength="20"
                       name="neraca_keuangan[{{ $key }}][return_of_equity]" />
                @error("neraca_keuangan.{$key}.return_of_equity")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Kas</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       class="form-control @error("neraca_keuangan.{$key}.kas") is-invalid @enderror" required maxlength="50"
                       value="{{ $oldDaftarNeracaKeuangan['kas'] }}"
                       name="neraca_keuangan[{{ $key }}][kas]" />
                @error("neraca_keuangan.{$key}.kas")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Total Aktiva</span>
                </label>
                <input type="text" onkeyup="formatCommonCurrency(this)"
                       value="{{ $oldDaftarNeracaKeuangan['total_aktiva'] }}"
                       class="form-control @error("neraca_keuangan.{$key}.total_aktiva") is-invalid @enderror" required maxlength="50"
                       name="neraca_keuangan[{{ $key }}][total_aktiva]" />
                @error("neraca_keuangan.{$key}.total_aktiva")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Status Audit</span>
                </label>
                <select required
                        class="form-control form-select @error("neraca_keuangan.{$key}.status_audit") is-invalid @enderror"
                        name="neraca_keuangan[{{ $key }}][status_audit]">
                    @foreach($masterStatusAudit as $statusAudit)
                        <option value="{{ $statusAudit }}" {{ $statusAudit == $oldDaftarNeracaKeuangan['status_audit'] ? 'selected' : '' }}>{{ $statusAudit }}</option>
                    @endforeach
                </select>
                @error("neraca_keuangan.{$key}.status_audit")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Nama Auditor</span>
                </label>
                <input type="text" value="{{ $oldDaftarNeracaKeuangan['nama_auditor'] ?? '' }}"
                       class="form-control @error("neraca_keuangan.{$key}.nama_auditor") is-invalid @enderror" maxlength="255"
                       name="neraca_keuangan[{{ $key }}][nama_auditor]" />
                @error("neraca_keuangan.{$key}.nama_auditor")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span>Tanggal Audit</span>
                </label>
                <input type="date" value="{{ $oldDaftarNeracaKeuangan['tanggal_audit'] ?? '' }}"
                       class="form-control @error("neraca_keuangan.{$key}.tanggal_audit") is-invalid @enderror"
                       name="neraca_keuangan[{{ $key }}][tanggal_audit]" />
                @error("neraca_keuangan.{$key}.tanggal_audit")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @if(!request()->routeIs('menu.**.show'))
                <div class="row">
                    <div class="d-flex justify-content-center mt-3 mb-7">
                        <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-neraca-keuangan">
                            Hapus
                        </button>
                    </div>
                </div>
            @endif
            <hr>
        </div>
    @endforeach
@else
    @if(isset($registrasiVendor) && isset($registrasiVendor->neraca_keuangan) && $registrasiVendor->neraca_keuangan)
        @foreach($registrasiVendor->neraca_keuangan as $daftarNeracaKeuangan)
            @php
                $uniqueStringNeracaKeuangan = uniqueString(8);
            @endphp
            <div class="row div-group-daftar-neraca-keuangan">
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tahun Data Keuangan</span>
                    </label>
                    <input id="yearpicker-{{ $uniqueStringNeracaKeuangan }}" placeholder="YYYY" required
                           class="form-control yearpicker-neraca-keuangan"
                           value="{{ $daftarNeracaKeuangan->tahun_data_keuangan }}"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][tahun_data_keuangan]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Mata Uang Data Keuangan</span>
                    </label>
                    <input type="text" maxlength="50" placeholder="IDR"
                           value="{{ $daftarNeracaKeuangan->mata_uang_data_keuangan ?? 'IDR' }}"
                           class="form-control" required
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][mata_uang_data_keuangan]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Aktiva Lancar</span>
                    </label>
                    <input type="text" onkeyup="formatCommonCurrency(this)"
                           value="{{ $daftarNeracaKeuangan->aktiva_lancar }}"
                           class="form-control" required maxlength="50"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][aktiva_lancar]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Hutang Lancar</span>
                    </label>
                    <input type="text" onkeyup="formatCommonCurrency(this)"
                           value="{{ $daftarNeracaKeuangan->hutang_lancar }}"
                           class="form-control" required maxlength="50"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][hutang_lancar]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Rasio Likuiditas</span>
                    </label>
                    <input type="text" pattern="[0-9.]*" title="Hanya Angka dan Titik (.) diperbolehkan"
                           placeholder="Contoh : 1.4"
                           value="{{ $daftarNeracaKeuangan->rasio_likuiditas }}"
                           class="form-control" required maxlength="20"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][rasio_likuiditas]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Total Hutang</span>
                    </label>
                    <input type="text" onkeyup="formatCommonCurrency(this)"
                           value="{{ $daftarNeracaKeuangan->total_hutang }}"
                           class="form-control" required maxlength="50"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][total_hutang]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Ekuitas</span>
                    </label>
                    <input type="text" onkeyup="formatCommonCurrency(this)"
                           value="{{ $daftarNeracaKeuangan->ekuitas }}"
                           class="form-control" required maxlength="50"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][ekuitas]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Rasio Hutang</span>
                    </label>
                    <input type="text" pattern="[0-9.]*" title="Hanya Angka dan Titik (.) diperbolehkan"
                           value="{{ $daftarNeracaKeuangan->rasio_hutang }}"
                           class="form-control" required maxlength="20"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][rasio_hutang]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Laba Rugi</span>
                    </label>
                    <input type="text" onkeyup="formatCommonCurrency(this)"
                           value="{{ $daftarNeracaKeuangan->laba_rugi }}"
                           class="form-control" required maxlength="50"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][laba_rugi]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Return of Equity</span>
                    </label>
                    <input type="text" pattern="[0-9.]*" title="Hanya Angka dan Titik (.) diperbolehkan"
                           placeholder="%" value="{{ $daftarNeracaKeuangan->return_of_equity }}"
                           class="form-control" required maxlength="20"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][return_of_equity]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Kas</span>
                    </label>
                    <input type="text" onkeyup="formatCommonCurrency(this)"
                           class="form-control" required maxlength="50"
                           value="{{ $daftarNeracaKeuangan->kas }}"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][kas]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Total Aktiva</span>
                    </label>
                    <input type="text" onkeyup="formatCommonCurrency(this)"
                           value="{{ $daftarNeracaKeuangan->total_aktiva }}"
                           class="form-control" required maxlength="50"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][total_aktiva]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Status Audit</span>
                    </label>
                    <select required
                            class="form-control form-select"
                            name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][status_audit]">
                        @foreach($masterStatusAudit as $statusAudit)
                            <option value="{{ $statusAudit }}" {{ $statusAudit == $daftarNeracaKeuangan->status_audit ? 'selected' : '' }}>{{ $statusAudit }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Nama Auditor</span>
                    </label>
                    <input type="text" value="{{ $daftarNeracaKeuangan->nama_auditor ?? '' }}"
                           class="form-control" maxlength="255"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][nama_auditor]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Tanggal Audit</span>
                    </label>
                    <input type="date" value="{{ $daftarNeracaKeuangan->tanggal_audit ?? '' }}"
                           class="form-control"
                           name="neraca_keuangan[{{ $uniqueStringNeracaKeuangan }}][tanggal_audit]" />
                </div>
                @if(!request()->routeIs('menu.**.show'))
                    <div class="row">
                        <div class="d-flex justify-content-center mt-3 mb-7">
                            <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-neraca-keuangan">
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