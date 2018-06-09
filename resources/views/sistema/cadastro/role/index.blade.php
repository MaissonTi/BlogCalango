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
                               'Listagem de Perfils' => array( 'rota' => '', 'icon' => 'format_list_bulleted' ) ]
                ])

                <div class="header">
                    <h2>
                        <b>Perfil</b>
                    </h2>
                    <ul class="header-dropdown btn-add">
                        <li class="dropdown">
                            <a href="{{route('roles.create')}}" class="btn bg-blue waves-effect">
                                <i class="material-icons">person_add</i>
                                <span>Novo Perfil</span>
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
                                <th>Descrição</th>
                                <th  style="width: 100px;"> <center>Ação</center>  </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->nome}}</td>
                                    <td>{{$role->descricao}}</td>
                                    <td >
                                        <div class="btn-center">
                                            <a href="{{route('roles.edit', $role->id )}}" class="btn bg-blue waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a  onclick="remove(this,'{{route('roles.destroy', $role->id )}}')" class="btn bg-red waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Excluir">
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




