<?php
//include("functionsGeneral.php");

$globalUserX=$_SESSION['globalUser'];
//echo $globalUserX;
$globalPerfilX=$_SESSION['globalPerfil'];
$globalNameUserX=$_SESSION['globalNameUser'];
$globalNombreUnidadX=$_SESSION['globalNombreUnidad'];
$globalNombreAreaX=$_SESSION['globalNombreArea'];
$menuModulo=$_SESSION['modulo'];
switch ($menuModulo) {
  case 1:
   $nombreModulo="RRHH";
   $estiloMenu="rojo";
  break;  
}
if($menuModulo==0){
 ?><script>window.location.href="index.php";</script><?php
}
?>
<div class="sidebar" data-color="purple" data-background-color="<?=$estiloMenu?>" data-image="assets/img/sidebar-4.jpg">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <img src="assets/img/logo_cobofar1.fw.png" width="30" />
        </a>
        <a href="index.php" class="simple-text logo-normal">
          ADM
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="assets/img/faces/persona1.png" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <?=$globalNameUserX;?>                
              </span>
            </a>
          </div>
        </div>

        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="index.php?opcion=homeModulo">
              <i class="material-icons">home</i>
              <p> <?=$nombreModulo?>
              </p>
            </a>
          </li>  
          <?php 
          switch ($menuModulo) {
              case 1:
              ?>
              <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                  <i class="material-icons">fullscreen</i>
                  <p> Tablas
                    <b class="caret"></b>
                  </p>
                </a>
                <div class="collapse" id="pagesExamples">
                  <ul class="nav">              
                    <li class="nav-item ">
                      <a class="nav-link" href="?opcion=listSucursal">
                        <span class="sidebar-mini"> HL </span>
                        <span class="sidebar-normal"> Habilitar Login</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <?php
              break;              
          ?>       
          <?php            
          }
          ?>

        </ul>
      </div>
    </div>
