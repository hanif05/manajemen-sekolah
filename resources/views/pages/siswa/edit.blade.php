@extends('layouts.App')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Siswa</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
                        <li class="breadcrumb-item active"><a href="#">Edit Siswa</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data {{ $siswa->nama }}</h4>
                        <form class="form-material m-t-40" action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nama:</label>
                                <input type="text" class="form-control form-control-line" name="nama" placeholder="Masukan Nama Siswa"  value="{{ $siswa->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Kelas:</label>
                                <select class="form-control" name="kelas_id">
                                    @foreach ($kelas as $d_kelas)
                                    <option value="{{ $d_kelas->id }}">{{ $d_kelas->nama_kelas }}</option>
                                    {{-- <option value="{{ $d_kelas->id }}" @if ($d_kelas->siswa()->kelas_id == "{{ $d_kelas->id }}") selected @endif>{{ $d_kelas->nama_kelas }}</option> --}}
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir:</label>
                                <input type="text" class="form-control form-control-line" name="tmpt_lahir" placeholder="Masukan Tempat Lahir" value="{{ $siswa->tmpt_lahir }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir:</label>
                                <input type="date" class="form-control form-control-line" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin:</label>
                                <select class="form-control" name="jk">
                                    <option value="Laki-laki" @if($siswa->jk == "Laki-laki") selected @endif>Laki-laki</option>
                                    <option value="Perempuan" @if($siswa->jk == "Perempuan") selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>No HP:</label>
                                <input type="text" class="form-control form-control-line" name="no_hp" placeholder="Masukan No HP" value="{{ $siswa->no_hp }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat:</label>
                                <textarea class="form-control" rows="5" name="alamat">{{ $siswa->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Foto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto" value="{{ $siswa->foto }}">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <a href="{{ route('siswa.index') }}" class="btn btn-dark">Cancel</a>
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection