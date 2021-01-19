<?php

require_once 'conexion.php';
require_once 'styles.php';
require_once 'configModule.php';
require_once 'functions.php';

$dbh = new Conexion();
$sql="SELECT AGE1,DES,CODIGO,IP FROM almacen order by des";
$stmt = $dbh->prepare($sql);
//ejecutamos
$stmt->execute();
//bindColumn
$stmt->bindColumn('DES', $des);
$stmt->bindColumn('CODIGO', $codigo);
$stmt->bindColumn('IP', $ip);
$stmt->bindColumn('AGE1', $age1);
?>

<div class="content">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="card">
			  <div class="card-header <?=$colorCard;?> card-header-text">
				<div class="card-text">
				  <h4 class="card-title">Lista de Sucursales</h4>
				</div>
			  </div>
			  <div class="card-body ">
                <div class="table-responsive">
                  <table class="table" id="tablePaginator">
                    <thead>
                      <tr>                        
                        <th>Codigo</th>
                        <th>Sucursal</th>
                        <th>Ip</th>
                        <!-- <th>Estado</th> -->
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $index=1;
                      while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
                        // $estado="activo";
                        // $ip="localhost";
                        // $bd=datos_server(1);
                        // $user=datos_server(2);
                        // $pass=datos_server(3);
                        // $server_bd="mysql:host=".$ip.";dbname=".$bd;
                        // set_time_limit(0);
                        // try{
                        //   $dbh = new PDO($server_bd, $user, $pass);
                        //   echo "¡La conexión está bien!";
                        // }catch(PDOException $e){
                        //   echo "Error:";
                        // }

                        // $mysqli = new mysqli($ip, $user, $pass, $bd);
                        
                        // /* comprobar si el servidor sigue vivo */
                        // if ($mysqli->ping()) {
                        //     echo "¡La conexión está bien!";
                        // }else {
                        //     echo "Error:";
                        // }
                        /* cerrar conexión */
                        // $mysqli->close();

                        ?>
                        <tr>
                          <td><?=$codigo;?></td>
                          <td ><?=$des;?></td>
                          <td><?=$ip;?></td>                          
                          <!-- <td><?=$estado;?></td>   -->                        
                          <td class="td-actions text-right">
                            <a href='<?=$urlhloginList;?>&codigo=<?=$codigo;?>&des=<?=$des;?>&ip=<?=$ip;?>' rel="tooltip" class="<?=$buttonEdit;?>">Conectar
                            </a>                            
                          </td>
                        </tr>
                      <?php $index++; } ?>
                    </tbody>
                  </table>
                </div>

			  </div>
			  <div class="card-footer ml-auto mr-auto">
				<!-- <button type="submit" class="<?=$buttonCeleste;?>">Conectar</button> -->
				<!-- <a href="<?=$urlListAreas;?>" class="<?=$buttonCancel;?>">Volver</a> -->
			  </div>
			</div>
		  <!-- </form> -->
		</div>
	
	</div>
</div>