<?php
session_start();
$sucursal_cod = $_POST["sucursal"];
require_once 'conexion_externa.php';
$stmt = $dbh->prepare("SELECT AGE1,DES,CODIGO,IP FROM almacen where CODIGO=$sucursal_cod");
//Ejecutamos;
$stmt->bindParam(':codigo',$codigo);
$stmt->execute();
$result = $stmt->fetch();
$codigo = $result['CODIGO'];
$des = $result['DES'];
$ip = $result['IP'];


$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//echo $sucursal_ip."aqui";
session_destroy();

header("location:index.php?conn='S'&codigo=$codigo&des=$des&ip=$ip");

?>