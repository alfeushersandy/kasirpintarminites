@extends('layouts.master.master', ['title' => 'Reimbursement'])

@section('content')
    <x-container>
        <div>
            <x-button-modal id="" title="Input Ijin" class="mb-3 btn-warning"/>
            <x-modal id="" title="Input Ijin/Cuti">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-input title="tanggal" name="tanggal" type="date" placeholder=""
                        value="" />
                    <x-input title="Nama Reimburse" name="nama_reimburse" type="text" placeholder="Masukkan Nama reimburse"
                        value="" />
                    <x-input title="Jumlah" name="jumlah" type="number" placeholder="Masukkan total reimburse"
                        value="" />
                    <x-textarea title="Deskripsi" name="deskripsi" placeholder="Masukan despkripsi" />
                    <x-input title="Lampiran" name="file" type="file" placeholder=""
                        value="" />
                    <x-button-save title="Simpan" class="mt-3"/>
                </form>
            </x-modal>
            <div class="col-12 col-lg-12">
                <x-card-action title="Daftar Reimburse" url="">
                    <x-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal</th>
                                <th>Nama Reimburse</th>
                                <th>Jumlah</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rembers as $i => $rem)
                                <tr>
                                    <td>{{ $i + $rembers->firstItem() }}</td>
                                    <td>{{ $rem->user->nama }}</td>
                                    <td>{{ $rem->tanggal }}</td>
                                    <td>{{ $rem->nama_reimburs }}</td>
                                    <td>{{ $rem->jumlah }}</td>
                                    <td>{{ $rem->deskripsi }}</td>
                                    <td>{{ $rem->status }}</td>
                                    <td>
                                        @if ($rem->status == "Menunggu Konfirmasi")
                                                {{-- approve --}}
                                            <a href="{{ route('kasirpintar.rembes.approve', $rem->id) }}" class="btn btn-success btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-ipad-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M11.5 21h-5.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v8"></path>
                                                    <path d="M9 18h2"></path>
                                                    <path d="M15 19l2 2l4 -4"></path>
                                                </svg>
                                            </a> 
                                            {{-- reject --}}
                                            <a href="{{ route('kasirpintar.rembes.reject', $rem->id) }}" class="btn btn-danger btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-ipad-horizontal-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M13.5 20h-8.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7"></path>
                                                    <path d="M22 22l-5 -5"></path>
                                                    <path d="M17 22l5 -5"></path>
                                                    <path d="M9 17h4"></path>
                                                </svg>
                                            </a>
                                            {{-- edit --}}
                                            <x-button-modal id="{{ $rem->id }}" title=""/>
                                                {{-- <x-modal id="{{ $rem->id }}" title="Ubah Data Karyawan">
                                                <form action=""
                                                method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-input title="NIP" name="nip" type="number"
                                                    placeholder="" value="{{ $user->nip }}" />
                                                    <x-input title="Nama" name="nama" type="text"
                                                    placeholder="" value="{{ $user->nama }}" />
                                                    <x-select title="Jabatan" name="jabatan">
                                                        <option value="" selected>Pilih Jabatan</option>
                                                        <option value="Direktur" @selected($user->jabatan == "Direktur")>Direktur</option>
                                                        <option value="Finance" @selected($user->jabatan == "Finance")>Finance</option>
                                                        <option value="Staf" @selected($user->jabatan == "Staf")>Staf</option>
                                                    </x-select>
                                                    <x-button-save title="Simpan" />
                                                </form>
                                                </x-modal> --}}
                                            {{-- delete --}}
                                            <x-button-delete id="{{ $rem->id }}" title=""
                                                url="" />
                                                <a href="{{ $rem->file }}" class="btn btn-success btn-sm" target=_blank>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                        <path d="M12 18c-.328 0 -.652 -.017 -.97 -.05c-3.172 -.332 -5.85 -2.315 -8.03 -5.95c2.4 -4 5.4 -6 9 -6c3.465 0 6.374 1.853 8.727 5.558"></path>
                                                        <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                        <path d="M20.2 20.2l1.8 1.8"></path>
                                                     </svg>
                                                </a> 
                                        @elseif ($rem->status == "Permintaan Disetujui")
                                            @if (Auth::user()->jabatan == 'Finance')
                                                 {{-- approve --}}
                                            <a href="{{ route('kasirpintar.rembes.approve', $rem->id) }}" class="btn btn-success btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-ipad-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M11.5 21h-5.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v8"></path>
                                                    <path d="M9 18h2"></path>
                                                    <path d="M15 19l2 2l4 -4"></path>
                                                </svg>
                                            </a> 
                                            {{-- reject --}}
                                            <a href="{{ route('kasirpintar.rembes.reject', $rem->id) }}" class="btn btn-danger btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-ipad-horizontal-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M13.5 20h-8.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7"></path>
                                                    <path d="M22 22l-5 -5"></path>
                                                    <path d="M17 22l5 -5"></path>
                                                    <path d="M9 17h4"></path>
                                                </svg>
                                            </a>
                                            {{-- edit --}}
                                            <x-button-modal id="{{ $rem->id }}" title="" />
                                                {{-- <x-modal id="{{ $rem->id }}" title="Ubah Data Karyawan">
                                                <form action=""
                                                method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-input title="NIP" name="nip" type="number"
                                                    placeholder="" value="{{ $user->nip }}" />
                                                    <x-input title="Nama" name="nama" type="text"
                                                    placeholder="" value="{{ $user->nama }}" />
                                                    <x-select title="Jabatan" name="jabatan">
                                                        <option value="" selected>Pilih Jabatan</option>
                                                        <option value="Direktur" @selected($user->jabatan == "Direktur")>Direktur</option>
                                                        <option value="Finance" @selected($user->jabatan == "Finance")>Finance</option>
                                                        <option value="Staf" @selected($user->jabatan == "Staf")>Staf</option>
                                                    </x-select>
                                                    <x-button-save title="Simpan" />
                                                </form>
                                                </x-modal> --}}
                                            {{-- delete --}}
                                            <x-button-delete id="{{ $rem->id }}" title=""
                                                url="" />
                                            <a href="{{ $rem->file }}" class="btn btn-success btn-sm" target=_blank>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                    <path d="M12 18c-.328 0 -.652 -.017 -.97 -.05c-3.172 -.332 -5.85 -2.315 -8.03 -5.95c2.4 -4 5.4 -6 9 -6c3.465 0 6.374 1.853 8.727 5.558"></path>
                                                    <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                    <path d="M20.2 20.2l1.8 1.8"></path>
                                                </svg>
                                            </a> 
                                            @else
                                                {{-- edit --}}
                                            <x-button-modal id="{{ $rem->id }}" title="" />
                                                {{-- <x-modal id="{{ $rem->id }}" title="Ubah Data Karyawan">
                                                <form action=""
                                                method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-input title="NIP" name="nip" type="number"
                                                    placeholder="" value="{{ $user->nip }}" />
                                                    <x-input title="Nama" name="nama" type="text"
                                                    placeholder="" value="{{ $user->nama }}" />
                                                    <x-select title="Jabatan" name="jabatan">
                                                        <option value="" selected>Pilih Jabatan</option>
                                                        <option value="Direktur" @selected($user->jabatan == "Direktur")>Direktur</option>
                                                        <option value="Finance" @selected($user->jabatan == "Finance")>Finance</option>
                                                        <option value="Staf" @selected($user->jabatan == "Staf")>Staf</option>
                                                    </x-select>
                                                    <x-button-save title="Simpan" />
                                                </form>
                                                </x-modal> --}}
                                            {{-- delete --}}
                                            <x-button-delete id="{{ $rem->id }}" title=""
                                                url="" />
                                                <a href="{{ $rem->file }}" class="btn btn-success btn-sm" target=_blank>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                        <path d="M12 18c-.328 0 -.652 -.017 -.97 -.05c-3.172 -.332 -5.85 -2.315 -8.03 -5.95c2.4 -4 5.4 -6 9 -6c3.465 0 6.374 1.853 8.727 5.558"></path>
                                                        <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                        <path d="M20.2 20.2l1.8 1.8"></path>
                                                    </svg>
                                                </a> 
                                            @endif
                                        @else
                                        {{-- edit --}}
                                        <x-button-modal id="{{ $rem->id }}" title="" />
                                            {{-- <x-modal id="{{ $rem->id }}" title="Ubah Data Karyawan">
                                            <form action=""
                                            method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-input title="NIP" name="nip" type="number"
                                                placeholder="" value="{{ $user->nip }}" />
                                                <x-input title="Nama" name="nama" type="text"
                                                placeholder="" value="{{ $user->nama }}" />
                                                <x-select title="Jabatan" name="jabatan">
                                                    <option value="" selected>Pilih Jabatan</option>
                                                    <option value="Direktur" @selected($user->jabatan == "Direktur")>Direktur</option>
                                                    <option value="Finance" @selected($user->jabatan == "Finance")>Finance</option>
                                                    <option value="Staf" @selected($user->jabatan == "Staf")>Staf</option>
                                                </x-select>
                                                <x-button-save title="Simpan" />
                                            </form>
                                            </x-modal> --}}
                                        {{-- delete --}}
                                        <x-button-delete id="{{ $rem->id }}" title=""
                                            url="" />
                                            <a href="{{ $rem->file }}" class="btn btn-success btn-sm" target=_blank>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                    <path d="M12 18c-.328 0 -.652 -.017 -.97 -.05c-3.172 -.332 -5.85 -2.315 -8.03 -5.95c2.4 -4 5.4 -6 9 -6c3.465 0 6.374 1.853 8.727 5.558"></path>
                                                    <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                    <path d="M20.2 20.2l1.8 1.8"></path>
                                                </svg>
                                            </a> 
                                        @endif
                                        </td>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data rembers belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </x-table>
                </x-card-action>
                <div class="d-flex justify-content-end"></div>
            </div>
        </div>
    </x-container>
@endsection