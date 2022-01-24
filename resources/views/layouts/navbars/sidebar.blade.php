    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-playmaker bg-playmaker scrollbar-light-blue" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0 logoHide" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/white.png" class="navbar-side-brand" alt="..."> 

        </a>

        <a class="navbar-brand pt-0 logoShow" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/pwhite.png" class="p-side-brand" alt="..."> 
        </a>
        <!-- <p><span>{{ auth()->user()->name }}</span></p> -->
        
        <!-- User -->

        
        <button class="ocultarMenu desactivar" onclick="Functiondos()">
            <img src="{{ asset('argon') }}/img/icons/menui.svg" class="sidem" alt="">
        </button>
     

        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img src="{{ auth()->user()->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') : asset( auth()->user()->icon_path) }}">                                        
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Mi perfil') }}</span>
                    </a>
                    {{-- <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Configuración') }}</span>
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Buscar') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-tachometer-alt"></i><span class="itemHide">Panel de control</span>
                        </a>
                    </li>
                @hasanyrole('super-admin')

                    {{-- Sports --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#sports-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sports-dropdown">
                            <i class="fas fa-table-tennis"></i>
                            <span class="nav-link-text itemHide" >{{ __('Deportes') }}</span>
                        </a>

                        <div class="collapse" id="sports-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('sports.index') }}">
                                        {{ __('Listar deportes') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('sports.create') }}">
                                        {{ __('Crear deportes') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Ligas --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#leagues-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="leagues-dropdown">
                            <i class="fas fa-trophy"></i>
                            <span class="nav-link-text itemHide" >{{ __('Ligas') }}</span>
                        </a>

                        <div class="collapse" id="leagues-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('leagues.index') }}">
                                        {{ __('Listar todas las ligas') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('leagues.create') }}">
                                        {{ __('Crear liga') }}
                                    </a>
                                </li>
                                <li>
                            </ul>
                            <h5 class="navbar-heading text-white pl-4"><i class="fas fa-sitemap">&nbsp;</i>Modalidades</h5>
                            <ul class="nav nav-sm flex-column">
                                
                                </li>
                                <li class="nav-item">
                                    
                                    <a class="nav-link" href="{{ route('modalities.index') }}">
                                        {{ __('Listar todas las modalidades') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    
                                    <a class="nav-link" href="{{ route('modalities.create') }}">
                                        {{ __('Crear modalidad') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    {{-- Materiales --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#materials-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="materials-dropdown">
                            <i class="fas fa-table-tennis"></i>
                            <span class="nav-link-text" >{{ __('Materiales') }}</span>
                        </a>

                        <div class="collapse" id="materials-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('materials.index') }}">
                                        {{ __('Listar todas las materiales') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('materials.create') }}">
                                        {{ __('Crear materiales') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                     {{-- Users --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#users-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="users-dropdown">
                            <i class="fas fa-table-tennis"></i>
                            <span class="nav-link-text" >{{ __('Usuarios') }}</span>
                        </a>

                        <div class="collapse" id="users-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.index') }}">
                                        {{ __('Listar usuarios') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.create') }}">
                                        {{ __('Crear usuarios') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                    {{-- locations o estadios --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#locations-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="locations-dropdown">
                            <i class="fab fa-fort-awesome"></i>
                            <span class="nav-link-text itemHide" >{{ __('Estadios') }}</span>
                        </a>

                        <div class="collapse" id="locations-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('locations.index') }}">
                                        {{ __('Mis estadios') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('locations.create') }}">
                                        {{ __('Crear estadios') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>            

                    {{-- Teams --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#teams-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="teams-dropdown">
                            <i class="fas fa-users"></i>
                            <span class="nav-link-text itemHide" >{{ __('Equipos') }}</span>
                        </a>

                        <div class="collapse" id="teams-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('teams.index') }}">
                                        {{ __('Listar equipos') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('teams.create') }}">
                                        {{ __('Crear equipo') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Players --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#players-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="players-dropdown">
                            <i class="fas fa-user-friends"></i>
                            <span class="nav-link-text itemHide" >{{ __('Jugadores') }}</span>
                        </a>

                        <div class="collapse" id="players-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('players.index') }}">
                                        {{ __('Listar todas los jugadores') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('players.create') }}">
                                        {{ __('Crear jugador') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Arbitros --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#referees-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="referees-dropdown">
                            <i class="fas fa-ruler-vertical"></i>
                            <span class="nav-link-text itemHide" >{{ __('Arbitros') }}</span>
                        </a>

                        <div class="collapse" id="referees-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('referees.index') }}">
                                        {{ __('Listar arbitros') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('referees.create') }}">
                                        {{ __('Crear arbitro') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="http://3.16.161.92/score/" target="new">
                                        Calculadora
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                @endhasanyrole


                    
                @hasanyrole('league_administrator')
                    {{-- Mi liga --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#leagues-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="leagues-dropdown">
                            <i class="fab fa-fort-awesome"></i>
                            <span class="nav-link-text" >{{ __('Mi liga') }}</span>
                        </a>

                        <div class="collapse" id="leagues-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('leagues.show', auth()->user()->league->id) }}">
                                        {{ __('Ver mi liga') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> 
                    {{-- locations o estadios --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#locations-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="locations-dropdown">
                            <i class="fab fa-fort-awesome"></i>
                            <span class="nav-link-text" >{{ __('Estadios') }}</span>
                        </a>

                        <div class="collapse" id="locations-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('locations.index') }}">
                                        {{ __('Mis estadios') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('locations.create') }}">
                                        {{ __('Crear estadios') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>            

                    {{-- Teams --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#teams-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="teams-dropdown">
                            <i class="fas fa-users"></i>
                            <span class="nav-link-text" >{{ __('Equipos') }}</span>
                        </a>

                        <div class="collapse" id="teams-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('teams.index') }}">
                                        {{ __('Listar equipos') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('teams.create') }}">
                                        {{ __('Crear equipo') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Players --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#players-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="players-dropdown">
                            <i class="fas fa-user-friends"></i>
                            <span class="nav-link-text" >{{ __('Jugadores') }}</span>
                        </a>

                        <div class="collapse" id="players-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('players.index') }}">
                                        {{ __('Listar todas los jugadores') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('players.create') }}">
                                        {{ __('Crear jugador') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- Arbitros --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#referees-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="referees-dropdown">
                            <i class="fas fa-ruler-vertical"></i>
                            <span class="nav-link-text" >{{ __('Arbitros') }}</span>
                        </a>

                        <div class="collapse" id="referees-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('referees.index') }}">
                                        {{ __('Listar arbitros') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('referees.create') }}">
                                        {{ __('Crear arbitro') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                @endhasanyrole

                @hasanyrole('captain')
                    {{-- Capitán --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#referees-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="referees-dropdown">
                            <i class="fas fa-ruler-vertical"></i>
                            <span class="nav-link-text" >{{ __('Mi equipo') }}</span>
                        </a>

                        <div class="collapse" id="referees-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('teams.show', auth()->user()->player->team->id) }}">
                                        {{ __('Listar arbitros') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('players.show', auth()->user()->player->id) }}">
                                        {{ __('Mi perfil') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endhasanyrole

                @hasanyrole('referee')
                    {{-- Arbitros --}}
                    <li class="nav-item" onclick="Functionuno()"> 
                        <a class="nav-link" href="#referees-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="referees-dropdown">
                            <i class="fas fa-ruler-vertical"></i>
                            <span class="nav-link-text" >{{ __('Arbitros') }}</span>
                        </a>

                        <div class="collapse" id="referees-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('referees.getRefereeGames') }}">
                                        {{ __('Mis partidos') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('referees.edit', Auth::user()->referee->id) }}">
                                        {{ __('Editar perfil arbitro') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endhasanyrole

                @hasanyrole('player')
                    {{-- Arbitros --}}
                    <li class="nav-item" onclick="Functionuno()">
                        <a class="nav-link" href="#referees-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="referees-dropdown">
                            <i class="fas fa-ruler-vertical"></i>
                            <span class="nav-link-text" >{{ __('Mi perfil') }}</span>
                        </a>

                        <div class="collapse" id="referees-dropdown">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('team.show', auth()->user()->player->team->id ) }}">
                                        {{ __('Ver mi equipo') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('player.show', auth()->user()->player->id ) }}">
                                        {{ __('Mi perfil') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endhasanyrole
            </ul>
        </div>
    </div>
</nav>
