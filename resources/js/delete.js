    $(function(){
        $('.delete').click(function(){
Swal.fire({
  title: 'Na pewno chcesz usunąć?',
  text: "Operacja nie jest przywracalna!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Zostaw',
  confirmButtonText: 'Tak, usuń!'
}).then((result) => {
  if (result.isConfirmed) {
$.ajax({
                    method: "DELETE",
                    url: deleteURL+$(this).data("id")
                    //data: { id :$(this).data("id") }
                })
                .done(function( data ) {
                    window.location.reload();
                })
                .fail(function(data){
                    Swal.fire("OOPs",data.responseJSON.message,data.responseJSON.status);
                });
  }
})              
            });
    });