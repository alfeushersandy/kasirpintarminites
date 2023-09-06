@extends('layouts.master.master', ['title' => 'Master Karyawan'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <x-card-action title="Daftar Karyawan" url="">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($karyawan as $i => $user)
                            <tr>
                                <td>{{ $i + $karyawan->firstItem() }}</td>
                                <td>{{ $user->nip }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->jabatan }}</td>
                                <td>
                                    <x-button-modal id="{{ $user->id }}" title="Ubah Data Karyawan" />
                                        <x-modal id="{{ $user->id }}" title="Ubah Data Karyawan">
                                        <form action="{{ route('kasirpintar.karyawan.update', $user->id) }}"
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
                                        </x-modal>
                                    <x-button-delete id="{{ $user->id }}" title="Hapus Data"
                                        url="{{ route('kasirpintar.karyawan.destroy', $user->id) }}" />
                                    </td>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Karyawan belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </x-table>
            </x-card-action>
            <div class="d-flex justify-content-end"></div>
        </div>
        <div class="col-12 col-lg-4">
            <form action="{{route('kasirpintar.karyawan.store')}}" method="POST">
                @csrf
                <x-card title="Tambah Karyawan" class="card-body">
                    <x-input title="NIP Karyawan" name="nip" type="number" placeholder="Masukkan NIP Karyawan"
                        value="" />
                    <x-input title="Nama Karyawan" name="nama" type="text" placeholder="Masukkan Nama Karyawan"
                        value="" />
                    <x-select title="Jabatan" name="jabatan">
                        <option value="" selected>Pilih Jabatan</option>
                        <option value="Direktur">Direktur</option>
                        <option value="Finance">Finance</option>
                        <option value="Staf">Staf</option>
                    </x-select>
                    <x-button-save title="Simpan" class="mt-3"/>
                </x-card>
            </form>
        </div>
    </x-container>
@endsection