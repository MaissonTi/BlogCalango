@extends('layouts.app')

@section('content')

@include('includes.alert-shap')
@include('includes.datatable-lib', ['export' => 'false'])


<div class="row clearfix">

    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

            @include('includes.breadcrumbs',             
            [ 'itens' => [ 'Home'          => array( 'rota' => 'home', 'icon' => 'home' ),
                           'Listagem de Vendas' => array( 'rota' => 'venda.index', 'icon' => 'format_list_bulleted' ),
                           'Formulario Venda'  => array( 'rota' => '', 'icon' => 'edit' ) ]
            ])

            <div class="header">
                <h2>
                    <b>Venda</b>
                    <small>Preencha as Informações abaixo:</small>
                </h2>
                <br>
                
                {{--@if ( isset($venda) )
                <form role="form" id="form_venda" method="POST" action="{{Route('venda.update', $venda->id)}}">  
                    @method('put')
                @else
                <form role="form" id="form_venda" method="POST" action="{{Route('venda.store')}}">    
                @endif 
                @csrf --}}

                <v-form-venda action="{{Route('venda.store')}}" method="POST" >
                @csrf
                
                <div class="row clearfix">
                    
                    <div class="col-sm-4">
                        <v-input-dialog-list 
                        table='tb_cliente'
                        title='Cliente'
                        name='cliente_id'
                        v-bind:fields="{'id':'id','name':'Nome do cliente'}"
                        ></v-input-dialog-list>    
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">                                        
                            <label class="form-label">Responsavel/Solicitou <i>*</i></label>
                            <div class="form-line">
                                <input name="responsavel" type="text" class="form-control" value="{{$venda->responsavel or old('responsavel')}}" required/>                                    
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4"> 
                        <div class="form-group"> 
                            <label class="form-label">Responsavel pela amostra <i>*</i></label>                                                    
                            <div class="demo-radio-button ">
                                    <input class="radio-col-blue" name="tr" type="radio" id="radio_1" value="C" checked>
                                    <label for="radio_1">Cliente</label>
                                    <input class="radio-col-blue" name="tr" type="radio" id="radio_2" value="H" >
                                    <label for="radio_2">HidroLab</label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row clearfix">                   
                        <div class="col-sm-6">
                            <div class="form-group">                                        
                                <label class="form-label">Empresa</label>
                                <div class="form-line">
                                    <input name="empresa" type="text" class="form-control" value="{{$venda->empresa or old('empresa')}}"/>                                    
                                </div>
                                <div class="help-info">Min. 3, Max. 100 Caracterios</div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">                                        
                                <label class="form-label">Endereço</label>
                                <div class="form-line">
                                    <input name="endereco" type="text" class="form-control" value="{{$venda->endereco or old('endereco')}}"/>                                      
                                </div>                                
                            </div>
                        </div>
                </div>

                <div class="row clearfix">                   

                        <div class="col-sm-6">
                            <div class="form-group">                                        
                                <label class="form-label">Referencia</label>
                                <div class="form-line">
                                    <input name="referencia" type="text" class="form-control" value="{{$venda->referencia or old('referencia')}}"/>                                       
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">                                        
                                <label class="form-label">Contato</label>
                                <div class="form-line">
                                    <input name="contato" type="text" class="form-control"  value="{{$venda->contato or old('contato')}}"/>                                         
                                </div>
                            </div>
                        </div>
                </div>

                <div class="row clearfix">   
                    
                    <div class="col-sm-6">
                        <div class="form-group">                                        
                            <label class="form-label">Forma de pagamento <i>*</i></label>
                            <div class="form-line">
                                <input name="formapagamento" type="text" class="form-control" required   value="{{$venda->formapagamento or old('formapagamento')}}"/>   
                            </div>                                
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">                                        
                            <label class="form-label">Validade <i>*</i></label>
                            <div class="form-line">
                                <input name="data_venda" type="text" class="form-control datepicker" value="{{$venda->data_venda or old('data_venda')}}" required/>                                    
                            </div>
                        </div>
                    </div>
                </div>   

                 <div class="row clearfix">                    
                        <div class="col-sm-12" >
                            <v-input-dialog-grupo></v-input-dialog-grupo>                                       
                        </div>
                </div> 

                <div class="button-demo">
                        <button type="submit" class="btn btn-primary waves-effect">Salvar</button>
                        <a href="{{route('venda.index')}}" type="button" class="btn bg-grey waves-effect">Cancelar</a>
                </div>

                </v-form-venda>
                {{--</form>--}}

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

    <!-- Input Mask Plugin Js -->
    <script src="{{ url('/')}}/js/custom/jquery.imask.min.js"></script>
    <script src="{{ url('/')}}/js/custom/input_event.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="{{ url('/')}}/plugins/jquery-validation/jquery.validate.js"></script>
    <script>        
        $(document).ready(function(){    

            $.AdminBSB.input.activate();

            $('#form_venda').validate({
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

            //tentry_numeric_mask('desconto', 2, ',', '.' );            
            //tentry_numeric_mask('total', 2, ',', '.' );
            //tentry_numeric_mask('valor', 2, ',', '.' )

        });
    </script> 
@endpush