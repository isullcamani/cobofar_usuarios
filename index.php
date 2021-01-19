<?php
	//carga la plantilla con la header y el footer
$host="";
require_once 'conexion.php';
require_once 'styles.php';
require_once 'functions.php';
require_once 'functionsGeneral.php';
set_time_limit(0);
ini_set("session.cookie_lifetime","28800");
ini_set("session.gc_maxlifetime","28800");  
session_start();
$_SESSION['conexion']=1;
$_SESSION['conexion_ip']="";
$_SESSION['conexion_nombre']="";


$_SESSION['globalUser']=1;
$_SESSION['globalNameUser']="Usuario RRHH"; 
$_SESSION['globalUnidad']="1";
$_SESSION['globalNombreUnidad']="OF. RLP";
$_SESSION['globalArea']="1";
$_SESSION['globalNombreArea']="OF. CENTRAL";
$_SESSION['globalPerfil']=1;
$_SESSION['modulo']=1;

$_SESSION['globalNombreGestion']=1;
$_SESSION['globalMes']=1;

require_once('layouts/layout.php');


 ?>


