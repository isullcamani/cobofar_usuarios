<?php

require_once 'configModule.php';

require_once '../styles.php';

require_once '../functionsGeneral.php';
require_once '../functions.php';


$usuario=$_GET["usuario"];
$server=$_GET["ip"];
require_once '../conexion_externa.php';
$sql="SELECT * from usuario where des like '$usuario'";
$stmt2 = $dbh->prepare($sql);
$stmt2->execute();
$result2=$stmt2->fetch();

$codigo=$result2['PASO'];
$des=$result2['DES'];
$clave=$result2['CLAVE'];
$activo=$result2['ACTIVO'];
$estado=$result2['STA'];
$nivel=$result2['NIVEL'];
?>

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
                <option value=""></option>
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
                <option value=""></option>
                <option <?=($estado=="V")?"selected":"";?> value="V" class="text-right">VENTAS</option>
            </select>
        </div>
    </div>
    <label class="col-sm-1 col-form-label">Nivel</label>
    <div class="col-sm-4">
        <div class="form-group">                            
            <select class="selectpicker form-control form-control-sm" name="nivel" id="nivel" data-style="btn btn-primary" data-show-subtext="true" data-live-search="true" title="Seleccione" required="true">
                <option value=""></option>
                <option <?=($nivel=="7")?"selected":"";?> value="7" class="text-right">REGENTE</option>
                <option <?=($nivel=="4")?"selected":"";?> value="4" class="text-right">AUXILIAR</option>
            </select>
        </div>
    </div>
</div><!--fin campo observaciones --> 

<input type="hidden" name="codigo" id="codigo" value="<?=$codigo;?>"/>
