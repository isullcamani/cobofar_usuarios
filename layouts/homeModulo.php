<?php
switch ($codModulo) {
  case 1:
   $nombreModulo="RRHH";
   $cardTema="card-themes";
   $iconoTitulo="local_atm";
   $estiloHome="#DC5143";
   $fondoModulo="fondo-dashboard-recursoshumanos";
  break; 
}
?>
<section class="after-loop">
  <div class="container">
    <div class="div-center text-center">    
      <img src="assets/img/logo_cobofar.png" width="660" height="160" alt="">
      <h3>Modulo <?=$nombreModulo?></h3>
      <p>
        <a href="index.php" class="btn btn-primary btn-lg">IR A LA PAGINA DE INICIO</a>
      </p>      
    </div>
 
  </div>
</section>