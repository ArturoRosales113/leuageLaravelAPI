<div class="row mt-2">
    <div class="row panel-icons">

        @role('super-admin')
        <!-- Deportes-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('sports.index') }}">
                <div class="glyph fs1 circle-access2">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy2 icon-pm-deportes"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span class="path11"></span><span
                                class="path12"></span><span class="path13"></span><span class="path14"></span><span
                                class="path15"></span><span class="path16"></span></span>
                    </div>
                </div>
                <br>Deportes
            </a>
        </div>

        <!--Estadios-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('locations.index') }}">
                <div class="glyph fs1 circle-access">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy icon-pm-estadios"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span class="path11"></span><span
                                class="path12"></span></span>
                    </div>
                </div>
                <br>Estadios
            </a>
        </div>

        <!-- Ligas-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('leagues.index') }}">
                <div class="glyph fs1 circle-access">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy icon-pm-ligas"></span>
                    </div>
                </div>
                <br>Ligas
            </a>
        </div>

        <!-- Equipos-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('teams.index') }}">
                <div class="glyph fs1 circle-access">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy icon-pm-teams"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span class="path11"></span><span
                                class="path12"></span><span class="path13"></span></span>
                    </div>
                </div>
                <br>Equipos
            </a>
        </div>


        <!-- Jugadores -->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('players.index') }}">
                <div class="glyph fs1 circle-access2">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy3 icon-pm-jugadores"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span class="path11"></span><span
                                class="path12"></span><span class="path13"></span><span class="path14"></span><span
                                class="path15"></span><span class="path16"></span><span class="path17"></span><span
                                class="path18"></span><span class="path19"></span><span class="path20"></span><span
                                class="path21"></span><span class="path22"></span><span class="path23"></span><span
                                class="path24"></span></span>
                    </div>
                </div>
                <br>Jugadores
            </a>
        </div>

        <!-- arbitros-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('referees.index') }}">
                <div class="glyph fs1 circle-access">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy icon-pm-referees"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span class="path11"></span><span
                                class="path12"></span><span class="path13"></span></span>
                    </div>
                </div>
                <br>Arbitros
            </a>
        </div>
        @endrole

        @role('league_administrator')
        <!-- Deportes-->

        <!--Estadios-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('locations.index') }}">
                <div class="glyph fs1 circle-access">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy icon-pm-estadios"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span class="path11"></span><span
                                class="path12"></span></span>
                    </div>
                </div>
                <br>Estadios
            </a>
        </div>

        <!-- Ligas-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('leagues.index') }}">
                <div class="glyph fs1 circle-access">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy icon-pm-ligas"></span>
                    </div>
                </div>
                <br>Ligas
            </a>
        </div>

        <!-- Equipos-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('teams.index') }}">
                <div class="glyph fs1 circle-access">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy icon-pm-teams"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span class="path11"></span><span
                                class="path12"></span><span class="path13"></span></span>
                    </div>
                </div>
                <br>Equipos
            </a>
        </div>


        <!-- Jugadores -->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('players.index') }}">
                <div class="glyph fs1 circle-access2">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy3 icon-pm-jugadores"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span class="path11"></span><span
                                class="path12"></span><span class="path13"></span><span class="path14"></span><span
                                class="path15"></span><span class="path16"></span><span class="path17"></span><span
                                class="path18"></span><span class="path19"></span><span class="path20"></span><span
                                class="path21"></span><span class="path22"></span><span class="path23"></span><span
                                class="path24"></span></span>
                    </div>
                </div>
                <br>Jugadores
            </a>
        </div>

        <!-- arbitros-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('referees.index') }}">
                <div class="glyph fs1 circle-access">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy icon-pm-referees"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span class="path11"></span><span
                                class="path12"></span><span class="path13"></span></span>
                    </div>
                </div>
                <br>Arbitros
            </a>
        </div>
        @endrole


        @role('player')
        <!-- Ligas-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('leagues.index') }}">
                <div class="glyph fs1 circle-access">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy icon-pm-ligas"></span>
                    </div>
                </div>
                <br>Ligas
            </a>
        </div>

        <!-- Equipos-->
        <div class="col-sm panel-cont ml-2 mr-2 pt-3 pb-3">
            <a class="nav-link" href="{{ route('teams.index') }}">
                <div class="glyph fs1 circle-access">
                    <div class="clearfix bshadow0 pbs">
                        <span class="pmy icon-pm-teams"><span class="path1"></span><span class="path2"></span><span
                                class="path3"></span><span class="path4"></span><span class="path5"></span><span
                                class="path6"></span><span class="path7"></span><span class="path8"></span><span
                                class="path9"></span><span class="path10"></span><span class="path11"></span><span
                                class="path12"></span><span class="path13"></span></span>
                    </div>
                </div>
                <br>Equipos
            </a>
        </div>
        @endrole





    </div>
</div>