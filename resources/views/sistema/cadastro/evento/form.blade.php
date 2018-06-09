@extends('layouts.app')

@section('content')

@include('includes.alert-shap')
@include('includes.datatable-lib', ['export' => 'false'])

<div class="row clearfix">

    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

            @include('includes.breadcrumbs',             
            [ 'itens' => [ 'Home'          => array( 'rota' => 'home', 'icon' => 'home' ),
                           'Listagem de Eventos' => array( 'rota' => 'evento.index', 'icon' => 'format_list_bulleted' ),
                           'Formulario Evento'  => array( 'rota' => '', 'icon' => 'edit' ) ]
            ])

            <div class="header">
                <h2>
                    <b>Cadastro do Evento</b>
                    <small>Preencha as Informações abaixo:</small>
                </h2>
                <br>
                
                @if ( isset($evento) )
                <form role="form" id="form_evento" method="POST" action="{{Route('evento.update', $evento->id)}}">  
                    @method('put')
                @else
                <form role="form" id="form_evento" method="POST" action="{{Route('evento.store')}}">    
                @endif 
                @csrf 

                <div class="row clearfix">   

                    <div class="col-sm-4">
                        <div class="form-group">                                        
                            <label class="form-label">Nome <i>*</i></label>
                            <div class="form-line">
                                <input name="nome" type="text" class="form-control" value="{{$evento->nome or old('nome')}}" required/>
                            </div>
                            <div class="help-info">Min. 3, Max. 100 Caracterios</div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <v-input-dialog-list 
                        table='tb_cliente'
                        title='Responsavel pelo evento'
                        name='cliente_id'
                        v-bind:fields="{'id':'id','nome':'Nome do cliente'}"
                        ></v-input-dialog-list>    
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">                                        
                            <label class="form-label">Data evento <i>*</i></label>
                            <div class="form-line">
                                <input name="data_venda" type="text" class="form-control datepicker" value="{{$venda->data_evento or old('data_evento')}}" required/>                                    
                            </div>
                        </div>
                    </div>

                </div>

                <br>
                <div class="button-demo">
                        <button type="submit" class="btn btn-primary waves-effect">Salvar</button>
                        <a href="{{route('evento.index')}}" type="button" class="btn bg-grey waves-effect">Cancelar</a>
                </div>

                </form>

            </div>
        </div>
    </div>
</div>
       
@endsection

@push('css')

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ url('/')}}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <style>
    .form-line input{
        margin-top: -10px;
    }
    label i{
        color: red;
    }
    </style>

@endpush

@push('js')

    <!-- Moment Plugin Js -->
    <script src="{{ url('/')}}/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ url('/')}}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="{{ url('/')}}/plugins/jquery-validation/jquery.validate.js"></script>
    <script>        
        $(document).ready(function(){    

            $.AdminBSB.input.activate();

            $('#form_evento').validate({
                highlight: function (input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function (input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function (error, element) {
                    $(element).parents('.form-group').append(error);
                }
            });

            $('.datepicker').bootstrapMaterialDatePicker({
                format: 'DD/MM/YYYY',
                clearButton: true,
                weekStart: 1,
                time: false
            });


        });
    </script> 
@endpush