<?php


// require_once 'conexion.php';
require_once 'functions.php';
require_once 'configModule.php';
ini_set('display_errors',1);

// $dbh = new Conexion();
$codigo_sucursal=$_POST['codigo_s'];
$des_sucursal=$_POST['des'];
$server=$_POST['ip'];
require_once 'conexion_externa.php'; 
try {
    $codigo = $_POST["codigo"];
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $activo = $_POST["activo"];
    $estado = $_POST["estado"];
    $nivel = $_POST["nivel"];
    switch ($nivel) {
        case '7': 
            $idgrupo=21;
            break;
        case '4':
            $idgrupo=20;
            break;
    }
    if ($_POST["codigo"] == 0){    
        $codigo=obtenerPasoUsuario($server);//PASO USUARIO
        $sql="INSERT INTO USUARIO(PASO,DES,CLAVE,ACTIVO,STA,NIVEL) values ('$codigo', '$usuario', '$clave', '$activo', '$estado', '$nivel')";
        // echo $sql;
        $stmt = $dbh->prepare($sql);
        $flagSuccess=$stmt->execute();
        if($flagSuccess){
            //insertamos grupo usr
            $sqlGrupoUser="INSERT INTO GRUPOUSER(IDGRUPO,PASO) values ('$idgrupo','$codigo')";
            // echo $sqlGrupoUser;
            $stmtGrupoUser = $dbh->prepare($sqlGrupoUser);
            $flagSuccessGU=$stmtGrupoUser->execute();
            // $tabla_id = $dbh->lastInsertId();    
        }
        showAlertSuccessError($flagSuccess,$urlhloginList."&codigo=".$codigo_sucursal."&des=".$des_sucursal."&ip=".$server);
    }else {//update
        $stmt = $dbh->prepare("UPDATE USUARIO set DES=:usuario,CLAVE=:clave,ACTIVO=:activo,STA=:estado,NIVEL=:nivel where PASO = :codigo");        
        //Bind
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':clave', $clave);
        $stmt->bindParam(':activo', $activo);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':nivel', $nivel);
        $flagSuccess=$stmt->execute();
        // $tabla_id = $dbh->lastInsertId();        
        if($flagSuccess){
            //insertamos grupo usr
            $sqlGrupoUser="UPDATE GRUPOUSER SET IDGRUPO=$idgrupo WHERE PASO = $codigo ";
            // echo $sqlGrupoUser;
            $stmtGrupoUser = $dbh->prepare($sqlGrupoUser);
            $flagSuccessGU=$stmtGrupoUser->execute();
            // $tabla_id = $dbh->lastInsertId();    
        }
        showAlertSuccessError($flagSuccess,$urlhloginList."&codigo=".$codigo_sucursal."&des=".$des_sucursal."&ip=".$server);    
    }//si es insert o update
    
} catch(PDOException $ex){
    //manejar error
    echo "Un error ocurrio".$ex->getMessage();
}
?>