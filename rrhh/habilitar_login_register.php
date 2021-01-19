<?php

// require_once 'conexion.php';
require_once 'styles.php';
require_once 'configModule.php';

$codigo_sucursal=$_GET['codigo_s'];
$des_sucursal=$_GET['des'];
$server=$_GET['ip'];
require_once 'conexion_externa.php';

if ($codigo > 0){
    $codigo=$codigo;
    $stmt = $dbh->prepare("SELECT * FROM usuario where PASO =:codigo");
    //Ejecutamos;
    $stmt->bindParam(':codigo',$codigo);
    $stmt->execute();
    $result = $stmt->fetch();
    $codigo = $result['PASO'];
    $usuario = $result['DES'];
    $clave = $result['CLAVE'];
    $activo = $result['ACTIVO'];    
    $estado = $result['STA'];    
    $nivel = $result['NIVEL'];    
} else {
    $codigo = 0;
    $usuario = '';
    $clave = '';
    $activo = '';
    $estado = '';
    $nivel = '';
}
?>

<div class="content">
	<div class="container-fluid">
		<div class="col-md-12">
		  <form id="form1" class="form-horizontal" action="<?=$urlhloginSave;?>" method="post">
			<div class="card">
			  <div class="card-header <?=$colorCard;?> card-header-text">
				<div class="card-text">
				  <h4 class="card-title"><?php if ($codigo == 0) echo "Registrar"; else echo "Editar";?>  <?=$nombreSingularHLogin;?></h4>                  
				</div>
                <h4 class="card-title" align="center">Sucursal : <b><?=$des_sucursal?></b></h4>
			  </div>
			  <div class="card-body ">
                <!-- <input type="hidden" name="codigo" id="codigo" value="<?=$codigo;?>"/> -->
                <input type="hidden" name="codigo_s" id="codigo_s" value="<?=$codigo_sucursal;?>"/>
                <input type="hidden" name="des" id="des" value="<?=$des_sucursal;?>"/>
                <input type="hidden" name="ip" id="ip" value="<?=$server;?>"/>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Usuario</label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input class="form-control" type="text" name="usuario" id="usuario" required="true" value="<?=$usuario;?>" onkeyup="javascript:this.value=this.value.toUpperCase();" onchange="llenar_datos_usuario()"/>
                        </div>
                    </div>
                    
                </div><!--fin campo usuario -->
                <div id="contenedor_register_hlogin">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Clave</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input class="form-control" type="text" name="clave" id="clave" required="true" value="<?=$clave;?>" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                            </div>
                        </div>
                        <label class="col-sm-1 col-form-label">Activo</label>
                        <div class="col-sm-4">
                            <div class="form-group">                    
                                <select class="selectpicker form-control form-control-sm" name="activo" id="activo" data-style="btn btn-primary" data-show-subtext="true" data-live-search="true" title="Seleccione" required="true">
                                    <!-- <option value=""></option> -->
                                    <option <?=($activo=="S")?"selected":"";?> value="S" class="text-right">SI</option>
                                    <option <?=($activo=="N")?"selected":"";?> value="N" class="text-right">NO</option>
                                </select>
                            </div>
                        </div>
                    </div><!--fin campo observaciones -->                
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <!-- <input class="form-control" type="text" name="estado" id="estado" value="<?=$estado;?>" onkeyup="javascript:this.value=this.value.toUpperCase();"/> -->
                                <select class="selectpicker form-control form-control-sm" name="estado" id="estado" data-style="btn btn-primary" data-show-subtext="true" data-live-search="true" title="Seleccione" required="true">
                                    <!-- <option value=""></option> -->
                                    <option <?=($estado=="V")?"selected":"";?> value="V" class="text-right">VENTAS</option>
                                </select>
                            </div>
                        </div>
                        <label class="col-sm-1 col-form-label">Nivel</label>
                        <div class="col-sm-4">
                            <div class="form-group">                            
                                <select class="selectpicker form-control form-control-sm" name="nivel" id="nivel" data-style="btn btn-primary" data-show-subtext="true" data-live-search="true" title="Seleccione" required="true">
                                    <!-- <option value=""></option> -->
                                    <option <?=($nivel=="7")?"selected":"";?> value="7" class="text-right">REGENTE</option>
                                    <option <?=($nivel=="4")?"selected":"";?> value="4" class="text-right">AUXILIAR</option>
                                </select>
                            </div>
                        </div>
                    </div><!--fin campo observaciones -->    
                    <input type="hidden" name="codigo" id="codigo" value="<?=$codigo;?>"/>
                </div>
                
			  </div>
			  <div class="card-footer ml-auto mr-auto">
				<button type="submit" class="<?=$buttonNormal;?>">Guardar</button>
				<a href="<?=$urlhloginList;?>&codigo=<?=$codigo_sucursal;?>&des=<?=$des_sucursal;?>&ip=<?=$server;?>" class="<?=$buttonCancel;?>">Volver</a>
			  </div>
			</div>
		  </form>
		</div>
	
	</div>
</div>