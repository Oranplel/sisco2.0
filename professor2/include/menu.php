

<div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                 <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Sisc<i class="md md-album"></i></span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            </div>

                           


                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../fotos/<?php echo $_SESSION['imgUser2'];?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="manual_pdt.pdf" target="_blank"><i class="ti-book m-r-5"></i> Manual do Sistema</a></li>
                                        <li><a href="bloqueio-tela.php"><i class="ti-lock m-r-5"></i> Bloquear Tela</a></li>
                                        <li><a href="perfil_professor.php"><i class="ti-user m-r-5"></i> Perfil</a></li>
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

             <div class="left side-menu side-menu-sm">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <!--- Divider -->
                  

                            

                            <div id="sidebar-menu">
                        <ul>


                                        <li class="text-muted menu-title">Menu de Navegação</li>
                           <li>
                                <a href="index.php" ><i class="ti-home"></i><span> Home </span></a>
                               
                            </li>
                             <li>
                                <a href="#" class="active"><i class="ti-user"></i><span> Perfil </span></a>
                               
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->