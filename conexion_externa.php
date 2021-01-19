<?php 
  // $host="localhost";
  $bd="cobofar_100";
  $user="root";
  $pass="";
  $server_bd="mysql:host=".$server.";dbname=".$bd;  
  try{
    $dbh = new PDO($server_bd, $user, $pass);
  }catch(PDOException $e){
    echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
    exit;
  }
?>