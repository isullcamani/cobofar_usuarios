<?php  

require_once 'configModule.php'; 
require_once 'styles.php';

$codigo_sucursal=$codigo;
$des_sucursal=$des;
$server=$ip;
$_SESSION['conexion']=$codigo_sucursal;
$_SESSION['conexion_nombre']=$des_sucursal;
$_SESSION['conexion_ip']=$server;
require_once 'conexion_externa.php'; 
$sql="SELECT * from usuario ORDER BY DES asc";
//$dbh = new PDO("mysql:host=localhost;dbname=prueba","root","");
$stmt = $dbh->prepare($sql);
//ejecutamos
$stmt->execute();
//bindColumn
$stmt->bindColumn('PASO', $paso);
$stmt->bindColumn('DES', $des);
$stmt->bindColumn('CLAVE', $clave);
$stmt->bindColumn('ACTIVO', $activo);
$stmt->bindColumn('STA', $sta);
$stmt->bindColumn('NIVEL', $nivel);
?>
<div class="content">
	<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header <?=$colorCard;?> card-header-icon">
            <div class="card-icon">
              <i class="material-icons"><?=$iconCard;?></i>
            </div>
            <h4 class="card-title"><?=$nombrePluralHlogin?></h4>
            <h4 class="card-title" align="center">Sucursal : <b><?=$des_sucursal?></b></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="tablePaginatorHead">
                <thead>
                  <tr>                    
                    <th>Paso</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Activo</th>
                    <th>Estado</th>
                    <th>Nivel</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $index=1;
                  while ($row = $stmt->fetch(PDO::FETCH_BOUND)) { 
                      switch ($activo) {
                        case 'S':
                            $activo="SI";                            
                            $label='<span style="padding:1;" class="badge badge-success">';
                          break;
                        case 'N':
                            $activo="NO";
                            $label='<span style="padding:1;" class="badge badge-danger">';
                          break;                  
                      }
                      switch ($sta) {
                        case 'V':
                            $sta="Ventas";
                          break;                        
                      }
                    ?>
                    <tr>
                      <td><?=$paso;?></td>
                      <td ><?=$des;?></td>
                      <td><?=$clave;?></td>
                      <td><?=$label.$activo;?></span></td>
                      <td><?=$sta;?></td>
                      <td><?=$nivel;?></td>                                                
                      <td class="td-actions text-right">
                        <a href='<?=$urlhloginForm;?>&codigo=<?=$paso;?>&codigo_s=<?=$codigo_sucursal;?>&des=<?=$des_sucursal;?>&ip=<?=$server;?>' rel="tooltip" class="<?=$buttonEdit;?>">
                            <i class="material-icons"><?=$iconEdit;?></i>
                        </a>                        
                      </td>
                    </tr>
                  <?php $index++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>              
				<div class="card-footer fixed-bottom">                    
          <button class="<?=$buttonNormal;?>" onClick="location.href='<?=$urlhloginForm;?>&codigo=0&codigo_s=<?=$codigo_sucursal;?>&des=<?=$des_sucursal;?>&ip=<?=$server;?>'">Registrar</button>
          <a href="<?=$urlListSucursales;?>" class="<?=$buttonCancel;?>">Volver</a>
        </div>              
      </div>
    </div>  
  </div>
</div>
