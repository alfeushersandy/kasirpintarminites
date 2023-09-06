@extends('layouts.master.master', ['title' => 'Reimbursement'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <x-card-action title="Daftar Reimburse" url="">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th>Nama Reimburse</th>
                            <th>Deskripsi</th>
                            <th>Lampiran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </x-table>
            </x-card-action>
            <div class="d-flex justify-content-end"></div>
        </div>
        <div class="col-12 col-lg-4">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card title="Tambah Reimbursement" class="card-body">
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
                </x-card>
            </form>
        </div>
    </x-container>
@endsection