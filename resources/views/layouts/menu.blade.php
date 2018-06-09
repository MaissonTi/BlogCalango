<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ url('/')}}/img/admin/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</div>
                    <div class="email">{{auth()->user()->nome}}</div>
                    <div class="email">{{auth()->user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">

                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="{{route('home')}}">
                            <i class="material-icons">dashboard</i>
                            <span>DashBoard</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">home</i>
                            <span>Administração</span>
                        </a>
                    
                        <ul class="ml-menu">
                            <li>
                            <a href="{{route('roles.index')}}">Perfil</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Permissões</a>
                            </li>
                            <li>
                                <a href="{{route('users.index')}}">Usuários</a>
                            </li>
                        
                        </ul>
                    </li>

                    <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">assignment</i>
                                <span>Cadastro</span>
                            </a>
                        
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{Route('cliente.index')}}">           
                                        <span>Cliente</span>                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="{{Route('evento.index')}}">  
                                        <span>Evento</span>
                                    </a>
                                </li>
                            
                            </ul>
                    </li>    
                    


                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    2018 <a href="javascript:void(0);">Central Calangos </a>&copy; .
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>