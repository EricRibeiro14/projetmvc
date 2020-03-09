<?php
ob_start();
?>
<div class="bg-secondary text-white text-center">
    <h1>Chambres</h1>
</div>
<div class="row">
<?php
foreach($data as $val){
 ?>
<div class="card col-2 m-5" >
                <div class="card-head mt-4 "  style="background-image:url(./asset/image/<?=$val->getimage();?>);background-repeat: no-repeat ; " >
                  <p>
                    <br><br>
                    <br>
                    <br>
                    <br>
                    <br>
                  </p>
                  </div>
                  <div class="card-body">
                      <h4 class="card-title"><strong>chambre n° <?=$val->getnumchambre();?></strong></h4>
                      <ul style="list-style:none">
                        <li>Nombre de personne: <?=$val->getnbpers();?></li>
                        <br>
                        <li><?=$val->getcomfort();?></li>
                        <br>
                        <li><?=$val->getprix();?> &euro; / Nuit</li>
                      </ul>
                      
                  </div>
                  <div class="mt-5 ">
                  <p   class="align-middle"><a href="index.php?action=info2&id=<?=$val->getnumchambre();?>" class="btn btn-primary col ">info</a></p>
                  </div>
                </div>
  <?php } ?>
  </div>

<?php 
  
$contenu = ob_get_clean();
require_once('./views/gabarit.php');
?>