$('body').on('click', '.show-modal', function(event){
    event.preventDefault();

    var me = $(this),
        url = me.attr('href');
        judul = me.attr('title');

    $('#modal-title').text(judul);
    $('#modal-save').text(me.hasClass('edit') ? 'Update' : 'Simpan');
    
    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
            $('#modal-body').html(response);
        }
    });

    $('#responsive-modal').modal('show');
});

$('#modal-save').click(function(event){
    event.preventDefault();

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';


    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');
    
    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function(response){
            form.trigger('reset');
            $('#responsive-modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();

            swal({
                type: 'success',
                title: 'Berhasil',
                text: 'Data Berhasil Disimpan'
            });
        },
        error: function(xhr){
            var res = xhr.responseJSON;
            if($.isEmptyObject(res) == false) {
                $.each(res.errors, function(key, value) {
                    $('#' + key).closest('.form-group').addClass('has-error').append('<span class="help-block"><strong>' + value + '</strong></span>')


                });
            }
        }
    });
});

$('body').on('click', '.btn-delete', function(event){
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        judul = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');


    swal({
        title: 'Peringatan!',
        text: 'Apakah Anda Yakin Ingin ' + judul + '?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, ' + judul + '!',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#01c0c8'
    }).then((result) => {
            if(result.value){
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token
                    },

                    success: function(response){
                        $('#datatable').DataTable().ajax.reload();

                        swal({
                            type: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Dihapus'
                        });
                    },
                    error: function(xhr){
                        swal({
                            type: 'error',
                            title: 'Ooopppss...',
                            text: 'Something Wrong!'
                        });
                    }
                });
            }
        });
});