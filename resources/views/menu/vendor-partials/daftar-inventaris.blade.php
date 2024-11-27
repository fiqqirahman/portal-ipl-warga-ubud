@php
    $uniqueStringInventaris = uniqueString(8);
@endphp

<div class="row">
    <div class="d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-sm btn-info" id="btn-add-row-daftar-inventaris">
            Tambah
        </button>
    </div>
</div>

@if($errors->any())
    @foreach(old('inventaris') ?? [] as $key => $oldInventaris)
        <div class="row div-group-daftar-inventaris">
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Inventaris</span>
                </label>
                <select required
                        class="form-control form-select @error("inventaris.{$key}.kode_master_jenis_inventaris") is-invalid @enderror"
                        name="inventaris[{{ $key }}][kode_master_jenis_inventaris]">
                    @foreach($masterJenisInventaris as $jenis)
                        <option value="{{ $jenis->kode }}"
                            {{ $jenis->kode == $oldInventaris['kode_master_jenis_inventaris'] ? 'selected' : '' }}>
                            {{ $jenis->nama }}
                        </option>
                    @endforeach
                </select>
                @error("inventaris.{$key}.kode_master_jenis_inventaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jumlah Inventaris</span>
                </label>
                <input type="text" maxlength="10" required
                       class="form-control @error("inventaris.{$key}.jumlah_inventaris") is-invalid @enderror positive-numeric"
                       value="{{ $oldInventaris['jumlah_inventaris'] }}"
                       name="inventaris[{{ $key }}][jumlah_inventaris]" />
                @error("inventaris.{$key}.jumlah_inventaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Kapasitas Inventaris</span>
                </label>
                <input type="text" maxlength="255" required
                       class="form-control @error("inventaris.{$key}.kapasitas_inventaris") is-invalid @enderror"
                       value="{{ $oldInventaris['kapasitas_inventaris'] }}"
                       name="inventaris[{{ $key }}][kapasitas_inventaris]" />
                @error("inventaris.{$key}.kapasitas_inventaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Jenis Merk Inventaris</span>
                </label>
                <select required
                        class="form-control form-select @error("inventaris.{$key}.kode_master_jenis_merk_inventaris") is-invalid @enderror"
                        name="inventaris[{{ $key }}][kode_master_jenis_merk_inventaris]">
                    @foreach($masterJenisMerkInventaris as $merk)
                        <option value="{{ $merk->kode }}"
                            {{ $merk->kode == $oldInventaris['kode_master_jenis_merk_inventaris'] ? 'selected' : '' }}>
                            {{ $merk->nama }}
                        </option>
                    @endforeach
                </select>
                @error("inventaris.{$key}.kode_master_jenis_merk_inventaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Tahun Pembuatan Inventaris</span>
                </label>
                <input placeholder="YYYY" required
                       class="form-control @error("inventaris.{$key}.tahun_pembuatan_inventaris") is-invalid @enderror yearpicker-inventaris"
                       value="{{ $oldInventaris['tahun_pembuatan_inventaris'] }}"
                       name="inventaris[{{ $key }}][tahun_pembuatan_inventaris]" />
                @error("inventaris.{$key}.tahun_pembuatan_inventaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Kondisi Inventaris</span>
                </label>
                <select required
                        class="form-control form-select @error("inventaris.{$key}.kondisi_inventaris") is-invalid @enderror"
                        name="inventaris[{{ $key }}][kondisi_inventaris]">
                    @foreach($masterKondisiInventaris as $kondisi)
                        <option value="{{ $kondisi }}"
                            {{ $kondisi == $oldInventaris['kondisi_inventaris'] ? 'selected' : '' }}>
                            {{ $kondisi }}
                        </option>
                    @endforeach
                </select>
                @error("inventaris.{$key}.kondisi_inventaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-8 col-sm-12 mb-4">
                <label class="fs-6 fw-semibold form-label mt-3">
                    <span class="required">Lokasi Inventaris</span>
                </label>
                <textarea class="form-control @error("inventaris.{$key}.lokasi_inventaris") is-invalid @enderror"
                          maxlength="500" required rows="1"
                          name="inventaris[{{ $key }}][lokasi_inventaris]">{{ $oldInventaris['lokasi_inventaris'] }}</textarea>
                @error("inventaris.{$key}.lokasi_inventaris")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="row">
                    <div class="col-md-{{ (isset($oldInventaris['path_upload_inventaris_old']) && $oldInventaris['path_upload_inventaris_old']) ? '6' : '12' }}">
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span>Dokumen Bukti Kepemilikan</span>
                            @if(isset($oldInventaris['path_upload_inventaris_old']) && $oldInventaris['path_upload_inventaris_old'])
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-bs-html="true"
                                   title="{{ \App\Services\UploadFileService::extractFilename($oldInventaris['path_upload_inventaris_old']) }} "></i>
                            @endif
                        </label>
                    </div>
                    @if(isset($oldInventaris['path_upload_inventaris_old']) && $oldInventaris['path_upload_inventaris_old'])
                        <input type="hidden" value="{{ $oldInventaris['path_upload_inventaris_old'] }}" name="inventaris[{{ $key }}][path_upload_inventaris_old]"/>
                        <div class="col-md-6 text-md-end">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <a target="_blank" href="{{ \Illuminate\Support\Facades\Storage::url($oldInventaris['path_upload_inventaris_old']) }}">Download</a>
                            </label>
                        </div>
                    @endif
                </div>
                <input type="file"
                       class="form-control @error("inventaris.{$key}.path_upload_inventaris") is-invalid @enderror"
                       accept=".pdf,.png,.jpeg,.jpg"
                       name="inventaris[{{ $key }}][path_upload_inventaris]" />
                @if (!$errors->has("inventaris.{$key}.path_upload_inventaris"))
                    <div class="row text-success mt-2" style="font-size: 12px">
                        <div class="col-6">
                            <span class="text-black">Format :</span> PDF, PNG, JPEG, JPG
                        </div>
                        <div class="col-6 text-end">
                            <span class="text-black">Max :</span> 10 MB
                        </div>
                    </div>
                @else
                    @error("inventaris.{$key}.path_upload_inventaris")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                @endif
            </div>
            <div class="row">
                <div class="d-flex justify-content-center mt-3 mb-7">
                    <button type="button" class="btn btn-sm btn-danger btn-remove-row-daftar-inventaris">
                        Hapus
                    </button>
                </div>
            </div>
            <hr>
        </div>
    @endforeach
@else
    @if(isset($registrasiVendor) && isset($registrasiVendor->inventaris) && $registrasiVendor->inventaris)
        @foreach($registrasiVendor->inventaris as $daftarInventaris)
            @php
                $uniqueStringInventaris = uniqueString(8);
            @endphp
            <div class="row div-group-daftar-inventaris">
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Jenis Inventaris</span>
                    </label>
                    <select required
                            class="form-control form-select"
                            name="inventaris[{{ $uniqueStringInventaris }}][kode_master_jenis_inventaris]">
                        @foreach($masterJenisInventaris as $jenis)
                            <option value="{{ $jenis->kode }}"
                                {{ $jenis->kode == $daftarInventaris->kode_master_jenis_inventaris ? 'selected' : '' }}>
                                {{ $jenis->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Jumlah Inventaris</span>
                    </label>
                    <input type="text" maxlength="10" required
                           class="form-control positive-numeric"
                           value="{{ $daftarInventaris->jumlah_inventaris }}"
                           name="inventaris[{{ $uniqueStringInventaris }}][jumlah_inventaris]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Kapasitas Inventaris</span>
                    </label>
                    <input type="text" maxlength="255" required
                           class="form-control"
                           value="{{ $daftarInventaris->kapasitas_inventaris }}"
                           name="inventaris[{{ $uniqueStringInventaris }}][kapasitas_inventaris]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Jenis Merk Inventaris</span>
                    </label>
                    <select required
                            class="form-control form-select"
                            name="inventaris[{{ $uniqueStringInventaris }}][kode_master_jenis_merk_inventaris]">
                        @foreach($masterJenisMerkInventaris as $merk)
                            <option value="{{ $merk->kode }}"
                                {{ $merk->kode == $daftarInventaris->kode_master_jenis_merk_inventaris ? 'selected' : '' }}>
                                {{ $merk->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Tahun Pembuatan Inventaris</span>
                    </label>
                    <input placeholder="YYYY" required
                           class="form-control yearpicker-inventaris"
                           value="{{ $daftarInventaris->tahun_pembuatan_inventaris }}"
                           name="inventaris[{{ $uniqueStringInventaris }}][tahun_pembuatan_inventaris]" />
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Kondisi Inventaris</span>
                    </label>
                    <select required
                            class="form-control form-select"
                            name="inventaris[{{ $uniqueStringInventaris }}][kondisi_inventaris]">
                        @foreach($masterKondisiInventaris as $kondisi)
                            <option value="{{ $kondisi }}"
                                {{ $kondisi == $daftarInventaris->kondisi_inventaris ? 'selected' : '' }}>
                                {{ $kondisi }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8 col-sm-12 mb-4">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Lokasi Inventaris</span>
                    </label>
                    <textarea class="form-control"
                              maxlength="500" required rows="1"
                              name="inventaris[{{ $uniqueStringInventaris }}][lokasi_inventaris]">{{ $daftarInventaris->lokasi_inventaris }}</textarea>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <div class="row">
                        <div class="col-md-{{ $daftarInventaris?->path_upload_inventaris ?? false ? '6' : '12' }}">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Dokumen Bukti Kepemilikan</span>
                                @if($daftarInventaris?->path_upload_inventaris ?? false)
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="{{ \App\Services\UploadFileService::extractFilename($daftarInventaris->path_upload_inventaris) }} "></i>
                                @endif
                            </label>
                        </div>
                        @if($daftarInventaris?->path_upload_inventaris ?? false)
                            <input type="hidden" value="{{ $daftarInventaris->path_upload_inventaris }}" name="inventaris[{{ $uniqueStringInventaris }}][path_upload_inventaris_old]"/>
                            <div class="col-md-6 text-md-end">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <a target="_blank" href="{{ \Illuminate\Support\Facades\Storage::url($daftarInventaris->path_upload_inventaris) }}">Download</a>
                                </label>
                            </div>
                        @endif
                    </div>
                    <input type="file"
                           class="form-control"
                           accept=".pdf,.png,.jpeg,.jpg"
                           name="inventaris[{{ $uniqueStringInventaris }}][path_upload_inventaris]" />
                    <div class="row text-success mt-2" style="font-size: 12px">
                        <div class="col-6">
                            <span class="text-black">Format :</span> PDF, PNG, JPEG, JPG
                        </div>
                        <div class="col-6 text-end">
                            <span class="text-black">Max :</span> 10 MB
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-center mt-3 mb-7">
                        <button type="button" class="btn btn-sm btn-danger btn-remove-row-daftar-inventaris">
                            Hapus
                        </button>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
    @endif
@endif
