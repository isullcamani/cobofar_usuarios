<?php 
if(isset($_GET['q'])){
       $q=$_GET['q'];
       $url= $_GET["opcion"];
 ?><!--<a class='flotante' title="Cambiar la sesión" href='#'><img src='assets/img/nuevoUser.svg' width="35" height="35" border="0" onclick="alerts.showSwal('warning-message-change-user','change.php?q=<?=$q;?>&url=<?=$url?>')"/></a>--><?php
 $urlListGestionTrabajo="#";
$urllistUnidadOrganizacional="#";
$urmesCurso="#";
$urmesCurso2="#";
}else{
 $urlListGestionTrabajo="index.php?opcion=listGestionTrabajo";
$urllistUnidadOrganizacional="index.php?opcion=listUnidadOrganizacional";
$urmesCurso="index.php?opcion=mesCurso";
$urmesCurso2="index.php?opcion=mesCurso2"; 
}

?>
<div class="main-panel">
<!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
            <?php 
              $globalNombreGestion=$_SESSION['globalNombreGestion'];
              $globalMes=$_SESSION['globalMes'];
              $globalNombreUnidad=$_SESSION['globalNombreUnidad'];
              $globalNombreArea=$_SESSION['globalNombreArea'];
              $fechaSistema=date("d/m/Y");
              $horaSistema=date("H:i");
            ?>
            <h6>Unidad: </h6>&nbsp;<h4 class="text-danger font-weight-bold"><a title="Cambiar Oficina de Trabajo" style="color:#FF0000; " href='<?=$urllistUnidadOrganizacional?>' >[ <?=$globalNombreUnidad;?> ]</a></h4> &nbsp;&nbsp; <h6>Area: </h6>&nbsp;<h4 class="text-danger font-weight-bold"><a title="Aceptar Solicitud" style="color:#FF0000; " href='#' >[ <?=$globalNombreArea;?> ]</a></h4>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">                        
            </ul>
          </div>
        </div>
      </nav>
<!-- End Navbar -->