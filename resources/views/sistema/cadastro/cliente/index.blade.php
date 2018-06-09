@extends('layouts.app')

@include('includes.datatable-lib' )
@include('includes.dialog-remove')

@section('content')

@include('includes.alert-shap')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        @include('includes.breadcrumbs',             
                        [ 'itens' => [ 'Home'          => array( 'rota' => 'home', 'icon' => 'home' ),
                                       'Listagem de Clientes' => array( 'rota' => '', 'icon' => 'format_list_bulleted' ) ]                                     
                        ])

                        <div class="header">
                            <h2>
                                <b>Clientes</b>
                            </h2>
                            <ul class="header-dropdown btn-add">
                                <li class="dropdown">
                                    <a href="{{route('cliente.create')}}" class="btn bg-blue waves-effect">
                                        <i class="material-icons">person_add</i> 
                                        <span>Novo Cliente</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable jsDataTable">
                                    <thead>
                                        <tr>                                            
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th  style="width: 100px;"> <center>Ação</center>  </th>                                           
                                        </tr>
                                    </thead>                                   
                                    <tbody> 
                                        @foreach($clientes as $cliente)                                                                                
                                        <tr>                                                                                      
                                            <td>{{$cliente->nome}}</td>
                                            <td>{{$cliente->sobrenome}}</td>
                                            <td >
                                                <div class="btn-center">                                                   
                                                    <a href="{{route('cliente.edit', $cliente->id )}}" class="btn bg-blue waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar">
                                                            <i class="material-icons">edit</i>
                                                    </a>                                                        
                                                    <a  onclick="remove(this,'{{route('cliente.destroy', $cliente->id )}}')" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Excluir">
                                                            <i class="material-icons">delete</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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

        });
    </script> 
@endpush




