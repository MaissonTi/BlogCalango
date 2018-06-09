
@extends('layouts.assets')

@section('bsb_css')
    @stack('css')
    @yield('css')
@stop

@section('body')

    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{route('home')}}">Calango Blog</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">                            
                        <li>
                            
                         <a href="{{ route('logout') }}" data-close="true"   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="material-icons">exit_to_app</i>
                         </a>
                         
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                         </form>


                        </li>
                    </ul>        
            </div>
        </div>
    </nav>

    @include('layouts.menu')
    
    <section class="content" id="app">
        <div class="container-fluid">

            @yield('content')
            
        </div>
    </section>
    

@endsection

@section('bsb_js')
    @stack('js')
    @yield('js')
@stop