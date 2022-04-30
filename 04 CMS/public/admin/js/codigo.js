$(document).ready(function(){
    $('.delete_link').on('click', function(){
        const id = $(this).attr('rel');
        const tabla = $(this).attr('table');
        const delete_url = `index.php?${tabla}&delete=${id}`;
        // console.log(delete_url);
        $('.modal-title').html(`Eliminar ${tabla}`);
        $('.modal-body').html('¿Estas seguro de eliminar el elemento?');
        $('.btn_delete_link').attr('href', delete_url);
        $('#deleteModal').modal('show');
    });
});