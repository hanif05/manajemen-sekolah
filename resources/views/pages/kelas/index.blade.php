@extends('layouts.App')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Kelas</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('kelas.index') }}">Kelas</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end text-right">
                        <a href="{{ route('kelas.create') }}" class="fa fa-plus-circle show-modal" title="Tambah Data Kelas"></a>
                    </div>
                    <h4 class="card-title">Data Kelas</h4>
                    <div class="table-responsive">
                        <table class="table table-striped color-table dark-table" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
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
            ajax: "{{ route('table.kelas') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'nama_kelas', name: 'nama_kelas' },
                { data: 'aksi', name: 'aksi' }
            ]
        });
    </script>
@endpush