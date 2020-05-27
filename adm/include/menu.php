 
<div class="moving_header2 topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="index.php" class="active logo"><img class="logosisco2" src=<?php if (isset($_SESSION['tipoUser'])){echo '"../assets/images/espinho_basico.ico"';}elseif (isset($_SESSION['tipoUser2'])) {echo'"../assets/images/espinho_azul.ico"';}elseif (isset($_SESSION['tipoUser1'])) {echo'"../assets/images/espinho_roxo.ico"';}?>><span>ISCO²</span></a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" style=<?php if (isset($_SESSION['tipoUser'])){echo '"background-color: #5fbeaaff;"';}elseif (isset($_SESSION['tipoUser2'])) {echo'"background-color: #00ccffff;"';}elseif (isset($_SESSION['tipoUser1'])) {echo'"background-color: #d40055;"';}?> role="navigation">

        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="ion-navicon"></i>
                    </button>
                    <span cdefaultlass="clearfix"></span>
                </div>


                <ul class="nav navbar-nav navbar-right pull-right">

                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                    </li>

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../fotos/<?php if(isset($_SESSION['tipoUser'])){echo $_SESSION['imgUser'];} elseif(isset($_SESSION['tipoUser1'])){echo $_SESSION['imgUser1'];} elseif(isset($_SESSION['tipoUser2'])){echo $_SESSION['imgUser2'];} ?>" alt="user-img" class="img-circle">  </a>
                        <ul class="dropdown-menu">
                            <li><a href=<?php if(isset($_SESSION['tipoUser'])){echo '"adm.pdf"';} elseif(isset($_SESSION['tipoUser1'])){echo '"../pdt/manual_pdt.pdf"';} elseif(isset($_SESSION['tipoUser2'])){echo '"../professor/manual_prof.pdf"';} ?> target="_blank"><i class="ti-book m-r-5"></i> Manual do Sistema</a></li>
                            <li><a href="bloqueio-tela.php"><i class="ti-lock m-r-5"></i> Bloquear Tela</a></li>
                            <li><a href="dao/logout.php"><i class="ti-power-off m-r-5"></i> Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->

<div class="moving_header1 left side-menu side-menu-sm">
    <div class=" sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div  id="sidebar-menu">
            <ul>
                
                <?php
                if (isset($_SESSION['tipoUser'])) {

                    
                echo "
                <li class='fade-in text-muted menu-title'>Menu de Navegação</li>

                <li class='fade-in has_sub'>
                    <a href='#' class='waves-effect waves-light'><i class=' icon-note '></i><span> Cadastro </span></a>
                    <ul class='list-unstyled'>
                        <li class=''><a href='cad-turma.php' class='waves-effect'> <span> Cadastro de Turma </span> </a></li>
                        <li class=''><a href='cad-user.php' class='waves-effect'> <span> Cadastro de Usuário </span> </a></li>
                    </ul>
                </li>
                <li class='fade-in has_sub'>
                    <a href='#' class='waves-effect waves-light'><i class='icon-settings'></i><span> Manutenção </span></a>
                    <ul class='list-unstyled'>
                        <li class=''><a href='consul-turma.php' class='waves-effect'><span> Turmas </span> </a> </li>
                        <li class=''><a href='manu-user.php' class='waves-effect'><span> Usuários </span></a> </li>
                        <li class=''><a href='config_curso.php' class='waves-effect '><span>  Cursos </span></a> </li>
                    </ul>
                </li>
                ";}
                elseif (isset($_SESSION['tipoUser2'])) {
                    echo "
                    
                        <li class='text-muted menu-title'>Menu de Navegação</li>
                        <li><a href='index.php' class='active' style='border-left-color: #00ccffff !important;'><i class='ti-home' style='color: #00ccffff;'></i><span style='color: #00ccffff;'> Home </span></a></li>
                        ";
                }
                elseif (isset($_SESSION['tipoUser1'])) {
                    echo "
                    <li class='text-muted menu-title'>Menu de Navegação</li>
                    <li>
                        <a href='index.php' class='active' style='border-left-color: #d40055 !important;'><i class='ti-home' style='color: #d40055;'></i><span style='color: #d40055;'> Home </span></a>
                        
                        </li>

                        <li>
                            <a href='alunos.php'><i class='ti-menu-alt'></i><span> Alunos </span></a>
                        
                        </li>

                    ";
                }
                ?>




            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>