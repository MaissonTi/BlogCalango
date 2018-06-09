@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ url('/')}}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <style>
        .dtflex{
            display: flex;
            justify-content: space-between;
        }
        .paginate_button a{
            border-radius: 100%;
            box-shadow: #9E9E9E 2px 2px 3
        }
        .btn-center{
            display: flex;
            justify-content: space-evenly;            
        }
        .btn-center a{
            margin: 0px 1px;         
        }        
        .btn-add  li  a {
            margin-top: -10px; 
            margin-right: 20px;
        }

        .th-action{
            position: static !important;
            padding: 0px 0px 10px 0px !important;
        }
    </style>

@endpush

@push('js')
    
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ url('/')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ url('/')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ url('/')}}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ url('/')}}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{ url('/')}}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{ url('/')}}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{ url('/')}}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{ url('/')}}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{ url('/')}}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    
    <script> 
        $(document).ready(function(){            
            
                @if(empty($export))
                
                    $('.jsDataTable').DataTable({                        
                        dom: '<"dtflex"fB>rtip',
                        buttons: [
                            "csv", "excel", "pdf", "print"
                        ],                  
                        language: {"url": "{{ url('/')}}/plugins/jquery-datatable/translator.txt"},
                        responsive: true,
                    });
   
                @endif
        });
    </script>
@endpush