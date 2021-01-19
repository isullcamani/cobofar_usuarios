  <?php
  require_once 'conexion.php';
//  require_once 'conexion_externa.php';
  //Enviar correo con funcion Enviar
  // require_once 'notificaciones_sistema/PHPMailer/send.php';
  // require_once 'notificaciones_sistema/PHPMailer/PHPMailer/src/Exception.php';
  // require_once 'notificaciones_sistema/PHPMailer/PHPMailer/src/PHPMailer.php';
  // require_once 'notificaciones_sistema/PHPMailer/PHPMailer/src/SMTP.php';

  date_default_timezone_set('America/La_Paz');

  /*function showAlertSuccessError($bandera, $url){
    if($bandera==true){
       echo "<script>
          alerts.showSwal('success-message','$url');
       </script>";
    }else{
       echo "<script>
          alerts.showSwal('error-message','$url');
       </script>";
    }
  }*/

  function callService($parametros, $url){
    $parametros=json_encode($parametros);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $remote_server_output = curl_exec ($ch);
    curl_close ($ch);
    return $remote_server_output;   
  }

  function nameMes($month){
    setlocale(LC_TIME, 'es_ES');
    $monthNum  = $month;
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = strftime('%B', $dateObj->getTimestamp());
    return $monthName;
  }

  function abrevMes($month){
    if($month==1){    return ("Ene");   }
    if($month==2){    return ("Feb");  }
    if($month==3){    return ("Mar");  }
    if($month==4){    return ("Abr");  }
    if($month==5){    return ("May");  }
    if($month==6){    return ("Jun");  } 
    if($month==7){    return ("Jul");  }
    if($month==8){    return ("Ago");  }
    if($month==9){    return ("Sep");  }
    if($month==10){    return ("Oct");  }         
    if($month==11){    return ("Nov");  }         
    if($month==12){    return ("Dic");  }             
  }
  function nombreMes($month){
    if($month==1){    return ("Enero");   }
    if($month==2){    return ("Febrero");  }
    if($month==3){    return ("Marzo");  }
    if($month==4){    return ("Abril");  }
    if($month==5){    return ("Mayo");  }
    if($month==6){    return ("Junio");  } 
    if($month==7){    return ("Julio");  }
    if($month==8){    return ("Agosto");  }
    if($month==9){    return ("Septiembre");  }
    if($month==10){    return ("Octubre");  }         
    if($month==11){    return ("Noviembre");  }         
    if($month==12){    return ("Diciembre");  }             
  }

  function obtenerPasoUsuario($server){
    $server=$server;
    require 'conexion_externa.php'; 
    $stmt = $dbh->prepare("SELECT paso from usuario ORDER BY paso desc limit 1");     
    $stmt->execute();
    $valor=0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $valor=$row['paso'];
    }
    $valor++;
    return($valor);
  }
  function datos_server($index){
    $valor=0;
    switch ($index) {
      case '1':
        $bd="cobofar_100";
        $valor=$bd;
        break;
      case '2':
        $user="root";
        $valor=$user;
        break;
      case '3':
        $pass="";
        $valor=$pass;
        break;
      case '4':
        break;      
    }
    return $valor;
  }


?>