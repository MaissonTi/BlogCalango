@extends('layouts.app')

@section('content')

@include('includes.alert-shap')

<div class="row clearfix">

    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

            @include('includes.breadcrumbs',             
            [ 'itens' => [ 'Home'          => array( 'rota' => 'home', 'icon' => 'home' ),
                           'Listagem de Clientes' => array( 'rota' => 'cliente.index', 'icon' => 'format_list_bulleted' ),
                           'Formulario Cliente'  => array( 'rota' => '', 'icon' => 'edit' ) ]
            ])

            <div class="header">
                <h2>
                    <b>Cadastro do Cliente</b>
                    <small>Preencha as Informações abaixo:</small>
                </h2>
                <br>
                
                @if ( isset($cliente) )
                <form role="form" id="form_cliente" method="POST" action="{{Route('cliente.update', $cliente->id)}}">  
                    @method('put')
                @else
                <form role="form" id="form_cliente" method="POST" action="{{Route('cliente.store')}}">    
                @endif 
                @csrf 

                <div class="row clearfix">                   
                            <div class="col-sm-6">
                                <div class="form-group form-float">                                        
                                    <div class="form-line">
                                        <input name="nome" type="text" class="form-control" value="{{$cliente->nome or old('nome')}}" required/>
                                        <label class="form-label">Nome</label>
                                    </div>
                                    <div class="help-info">Min. 3, Max. 100 Caracterios</div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                    <div class="form-group form-float">                                        
                                        <div class="form-line">
                                            <input name="sobrenome" type="text" class="form-control" value="{{$cliente->sobrenome or old('sobrenome')}}" required/>
                                            <label class="form-label">Sobrenome</label>
                                        </div>
                                    </div>
                                </div>
                </div>

                    <div class="button-demo">
                            <button type="submit" class="btn btn-primary waves-effect">Salvar</button>
                            <a href="{{route('cliente.index')}}" type="button" class="btn bg-grey waves-effect">Cancelar</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
       
@endsection

@push('js')
    <!-- Jquery Validation Plugin Css -->
    <script src="{{ url('/')}}/plugins/jquery-validation/jquery.validate.js"></script>
    <script>        
        $(document).ready(function(){    

            $.AdminBSB.input.activate();

            $('#form_cliente').validate({
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


        });
    </script> 
@endpush