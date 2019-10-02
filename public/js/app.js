$('body').on('click', '.show-modal', function(event){
    event.preventDefault();

    var me = $(this),
        url = me.attr('href');
        judul = me.attr('title');

    $('#modal-title').text(judul);
    
    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
            $('#modal-body').html(response);
        }
    });

    $('#responsive-modal').modal('show');
});
