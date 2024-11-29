@php
    $uniqueStringTenagaAhli = uniqueString(8);
@endphp
@if(!request()->routeIs('menu.**.show'))
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-sm btn-info" id="btn-add-row-daftar-tenaga-ahli">
                Tambah
            </button>
        </div>
    </div>
@endif

@if($errors->any())
    @foreach(old('tenaga_ahli') ?? [] as $key => $oldDaftarTenagaAhli)
        <div class="row div-group-daftar-tenaga-ahli">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Nama Tenaga Ahli</span>
                </label>
                <input type="text" maxlength="255" required
                       class="form-control @error("tenaga_ahli.{$key}.nama_tenaga_ahli") is-invalid @enderror"
                       value="{{ $oldDaftarTenagaAhli['nama_tenaga_ahli'] }}"
                       name="tenaga_ahli[{{ $key }}][nama_tenaga_ahli]"/>
                @error("tenaga_ahli.{$key}.nama_tenaga_ahli")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tanggal Lahir Tenaga Ahli</span>
                </label>
                <input type="date" required value="{{ $oldDaftarTenagaAhli['tanggal_lahir_tenaga_ahli'] }}"
                        class="form-control @error("tenaga_ahli.{$key}.tanggal_lahir_tenaga_ahli") is-invalid @enderror"
                        name="tenaga_ahli[{{ $key }}][tanggal_lahir_tenaga_ahli]"/>
                @error("tenaga_ahli.{$key}.tanggal_lahir_tenaga_ahli")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Pendidikan Tenaga Ahli</span>
                </label>
                <input type="text" maxlength="255" required
                       class="form-control @error("tenaga_ahli.{$key}.pendidikan_tenaga_ahli") is-invalid @enderror"
                       value="{{ $oldDaftarTenagaAhli['pendidikan_tenaga_ahli'] }}"
                       name="tenaga_ahli[{{ $key }}][pendidikan_tenaga_ahli]" />
                @error("tenaga_ahli.{$key}.pendidikan_tenaga_ahli")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-8 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Pengalaman Tenaga Ahli</span>
                </label>
                <textarea maxlength="1000" required
                          class="form-control @error("tenaga_ahli.{$key}.pengalaman_tenaga_ahli") is-invalid @enderror" rows="3"
                          name="tenaga_ahli[{{ $key }}][pengalaman_tenaga_ahli]">{{ $oldDaftarTenagaAhli['pengalaman_tenaga_ahli'] }}</textarea>
                @error("tenaga_ahli.{$key}.pengalaman_tenaga_ahli")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Profesi Tenaga Ahli</span>
                </label>
                <input type="text" required maxlength="255"
                       class="form-control @error("tenaga_ahli.{$key}.profesi_tenaga_ahli") is-invalid @enderror"
                       value="{{ $oldDaftarTenagaAhli['profesi_tenaga_ahli'] }}"
                       name="tenaga_ahli[{{ $key }}][profesi_tenaga_ahli]" />
                @error("tenaga_ahli.{$key}.profesi_tenaga_ahli")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @if(!request()->routeIs('menu.**.show'))
                <div class="row">
                    <div class="d-flex justify-content-center mt-3 mb-7">
                        <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-tenaga-ahli">
                            Hapus
                        </button>
                    </div>
                </div>
            @endif
            <hr>
        </div>
    @endforeach
@else
    @if(isset($registrasiVendor) && isset($registrasiVendor->tenaga_ahli) && $registrasiVendor->tenaga_ahli)
        @foreach($registrasiVendor->tenaga_ahli as $daftarTenagaAhli)
            @php
                $uniqueStringTenagaAhli = uniqueString(8);
            @endphp
            <div class="row div-group-daftar-tenaga-ahli">
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Nama Tenaga Ahli</span>
                    </label>
                    <input type="text" maxlength="255" required
                           class="form-control" value="{{ $daftarTenagaAhli->nama_tenaga_ahli }}"
                           name="tenaga_ahli[{{ $uniqueStringTenagaAhli }}][nama_tenaga_ahli]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tanggal Lahir Tenaga Ahli</span>
                    </label>
                    <input type="date" required
                            class="form-control" value="{{ $daftarTenagaAhli->tanggal_lahir_tenaga_ahli }}"
                            name="tenaga_ahli[{{ $uniqueStringTenagaAhli }}][tanggal_lahir_tenaga_ahli]"/>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Pendidikan Tenaga Ahli</span>
                    </label>
                    <input type="text" maxlength="255" required
                           class="form-control" value="{{ $daftarTenagaAhli->pendidikan_tenaga_ahli }}"
                           name="tenaga_ahli[{{ $uniqueStringTenagaAhli }}][pendidikan_tenaga_ahli]" />
                </div>
                <div class="col-md-8 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Pengalaman Tenaga Ahli</span>
                    </label>
                    <textarea maxlength="1000" required
                              class="form-control" rows="3"
                              name="tenaga_ahli[{{ $uniqueStringTenagaAhli }}][pengalaman_tenaga_ahli]">{{ $daftarTenagaAhli->pengalaman_tenaga_ahli }}</textarea>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Profesi Tenaga Ahli</span>
                    </label>
                    <input type="text" required maxlength="255"
                           class="form-control" value="{{ $daftarTenagaAhli->profesi_tenaga_ahli }}"
                           name="tenaga_ahli[{{ $uniqueStringTenagaAhli }}][profesi_tenaga_ahli]" />
                </div>
                @if(!request()->routeIs('menu.**.show'))
                    <div class="row">
                        <div class="d-flex justify-content-center mt-3 mb-7">
                            <button type="submit" class="btn btn-sm btn-danger btn-remove-row-daftar-tenaga-ahli">
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