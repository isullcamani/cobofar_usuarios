<?php 
	
	if(isset($_GET['opcion'])){
		
		if ($_GET['opcion']=='listSucursal') {
			require_once('rrhh/seleccion_sucursal.php'); //ok
		}
		if ($_GET['opcion']=='hloginLista') {
			$codigo=$_GET['codigo'];
			$des=$_GET['des'];
			$ip=$_GET['ip'];
			require_once('rrhh/habilitar_login_list.php'); //ok
		}
		if ($_GET['opcion']=='hloginForm') {
			$codigo=$_GET['codigo'];
			require_once('rrhh/habilitar_login_register.php');
		}
		if ($_GET['opcion']=='hloginSave') {
			require_once('rrhh/habilitar_login_save.php');
		}
		if ($_GET['opcion']=='hloginDelete') {
			$codigo=$_GET['codigo'];
			require_once('rrhh/deleteAreas.php');
		}
		if ($_GET['opcion']=='homeModulo') {
			$codModulo=$menuModulo;
			require_once('layouts/homeModulo.php');
		}
		if ($_GET['opcion']=='homeModulo2') {
			$codModulo=$menuModulo;
			require_once('layouts/homeModulo2.php');
		}
	}else{

	}
?>