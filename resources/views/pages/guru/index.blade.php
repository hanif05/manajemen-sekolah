@extends('layouts.App')

@section('content')
@if(session('berhasil'))
    {{alertsukses()}}
@endif
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Guru</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('guru.index') }}">Guru</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end text-right">
                        <a href="{{ route('guru.create') }}" class="fa fa-plus-circle" title="Tambah Data Guru"></a>
                    </div>
                    <h4 class="card-title">Data Guru</h4>
                    <div class="table-responsive">
                        <table class="table table-striped color-table dark-table" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.guru') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'nama', name: 'guru.nama' },
                { data: 'email', name: 'users.email' },
                { data: 'tmpt_lahir', name: 'tmpt_lahir'},
                { data: 'tgl_lahir', name: 'tgl_lahir'},
                { data: 'jk', name: 'jk'},
                { data: 'nama_kelas', name: 'kelas.nama_kelas'},
                { data: 'alamat', name: 'alamat'},
                { data: 'no_hp', name: 'no_hp'},
                { data: 'foto', name: 'foto'},
                { data: 'aksi', name: 'aksi' }
            ]
        });
    </script>
@endpush
