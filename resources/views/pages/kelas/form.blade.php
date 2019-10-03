{!! Form::model($data, [
        'route' => $data->exists ? ['kelas.update', $data->id] : 'kelas.store',
        'method' => $data->exists ? 'PUT' : 'POST'
    ])
!!}

    <div class="form-group">
        <label for="recipient-name" class="control-label">Kelas:</label>
        {!! Form::text('nama_kelas', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukan Nama Kelas']) !!}
    </div>
{!! Form::close() !!}
