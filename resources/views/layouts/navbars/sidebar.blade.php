<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-playmaker bg-playmaker scrollbar-light-blue" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-side-brand " alt="..."> 

        </a>
        <!-- <p><span>{{ auth()->user()->name }}</span></p> -->
        
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
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
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Configuración') }}</span>
                    </a>
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
                        <i class="ni ni-tv-2 text-primary"></i> Panel de control
                    </a>
                </li>

                {{-- Acciones --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#actions-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="actions-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Actions') }}</span>
                    </a>

                    <div class="collapse" id="actions-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('actions.index') }}">
                                    {{ __('Listar todas los acciones') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('actions.create') }}">
                                    {{ __('Crear acción') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- Eventos --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#events-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="events-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Eventos') }}</span>
                    </a>

                    <div class="collapse" id="events-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('events.index') }}">
                                    {{ __('Listar todas los eventos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('events.create') }}">
                                    {{ __('Crear evento') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- Campos depende de locations o en estadios en español --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#fields-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="fields-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Campos') }}</span>
                    </a>

                    <div class="collapse" id="fields-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('fields.index') }}">
                                    {{ __('Listar todas los campos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('fields.create') }}">
                                    {{ __('Crear campo') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- Games --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#games-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="games-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Partidos') }}</span>
                    </a>

                    <div class="collapse" id="games-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('games.index') }}">
                                    {{ __('Listar todas los juegos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('games.create') }}">
                                    {{ __('Crear juego') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- Ligas --}}
                <li class="nav-item">
                    <a class="nav-link" href="#leagues-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="leagues-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Ligas') }}</span>
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
                        </ul>
                    </div>
                </li>

                {{-- locations o estadios --}}
                <li class="nav-item">
                    <a class="nav-link" href="#locations-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="locations-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Estadios') }}</span>
                    </a>

                    <div class="collapse" id="locations-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('locations.index') }}">
                                    {{ __('Listar todas las estadios') }}
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

                {{-- Modalidades de los partidos --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#modalities-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="modalities-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Modalidades') }}</span>
                    </a>

                    <div class="collapse" id="modalities-dropdown">
                        <ul class="nav nav-sm flex-column">
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
                </li> --}}

                {{-- Permisos de los roles --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#players-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="permissions-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Permisos de usuarios') }}</span>
                    </a>

                    <div class="collapse" id="permissions-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('permissions.index') }}">
                                    {{ __('Listar todas las permisos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('permissions.create') }}">
                                    {{ __('Crear permiso') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- Players --}}
                <li class="nav-item">
                    <a class="nav-link" href="#players-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="players-dropdown">
                        <i class="fas fa-table-tennis"></i>
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

                {{-- Profiles --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#profiles-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="profiles-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Perfiles') }}</span>
                    </a>

                    <div class="collapse" id="profiles-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profiles.index') }}">
                                    {{ __('Listar todas los perfiles') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profiles.create') }}">
                                    {{ __('Crear perfil') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- Referees --}}
                <li class="nav-item">
                    <a class="nav-link" href="#referees-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="referees-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Referees') }}</span>
                    </a>

                    <div class="collapse" id="referees-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('referees.index') }}">
                                    {{ __('Listar todas los referees') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('referees.create') }}">
                                    {{ __('Crear referee') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Tipos de referees --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#refereeTypes-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="refereeTypes-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Referees') }}</span>
                    </a>

                    <div class="collapse" id="refereeTypes-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('refereeTypes.index') }}">
                                    {{ __('Listar todas los tipos de referees') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('refereeTypes.create') }}">
                                    {{ __('Crear tipo de referee') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- Roles --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#roles-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="roles-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Roles') }}</span>
                    </a>

                    <div class="collapse" id="roles-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">
                                    {{ __('Listar todas los tipos roles') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.create') }}">
                                    {{ __('Crear rol') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- Scores --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#scores-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="scores-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('scores') }}</span>
                    </a>

                    <div class="collapse" id="scores-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('scores.index') }}">
                                    {{ __('Listar scores') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('scores.create') }}">
                                    {{ __('Crear score') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- Sports --}}
                <li class="nav-item">
                    <a class="nav-link" href="#sports-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sports-dropdown">
                        <i class="fas fa-table-tennis"></i>
                        <span class="nav-link-text" >{{ __('Deportes') }}</span>
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

                {{-- Teams --}}
                <li class="nav-item">
                    <a class="nav-link" href="#teams-dropdown" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="teams-dropdown">
                        <i class="fas fa-table-tennis"></i>
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

                {{-- Users --}}
                <li class="nav-item">
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
                </li>


            </ul>
        </div>
    </div>
</nav>
