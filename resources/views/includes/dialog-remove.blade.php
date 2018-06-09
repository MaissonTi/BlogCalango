@push('css')
    <!-- Sweetalert Css -->
    <link href="{{ url('/')}}/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
@endpush

@push('js')
    <!-- SweetAlert Plugin Js -->
    <script src="{{ url('/')}}/plugins/sweetalert/sweetalert.min.js"></script>  
    <script> 
    
        function remove(e,route){                    
        
            swal({
                title: "Você tem certeza?",
                text: "Você não poderá recuperar mais esta informação!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Não, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: false,
                showLoaderOnConfirm: true
            }, function (isConfirm) {
                
                if (isConfirm) {

                    jQuery.ajaxSetup({
                        headers: {            
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')        
                        }    
                    })
                    $.ajax({
                        type: 'POST',
                        dataType : 'json',                
                        url: route,
                        data: { _method: 'delete', _token: '{{csrf_token()}}'},
                        success: function( msg ) {
                            console.log(msg);
                            if(msg['status'] == 'success'){
                                $(e).closest('tr').addClass('animated fadeOutDown')
                                setTimeout( function(){ $(e).closest('tr').remove()}, 800)
                                swal("Deletado!", "Seu registro foi excluído.", "success");
                            }else{
                                swal("Cancelado!", "Houve algum problema com nosso servidor: ERRO: " + msg['error'], "error");
                            }
                        }
                    });
                } else {
                    swal("Cancelado!", "Seu registro NÃO foi excluído", "error");
                }
            })
        }

    </script>
@endpush