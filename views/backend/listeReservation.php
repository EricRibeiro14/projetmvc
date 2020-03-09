<?php
ob_start();
?>
<div class="container">
  <h2 class="text-center mb-5">liste des Reservations</h2>
  <form action="" method="POST">
  <div class="input-group mb-3 col-5 offset-7">
  <input type="text" class="form-control" name="mcle" placeholder="Rechercher">
  <div class="input-group-append">
    <button class="btn btn-success" type="submit">Go</button>
  </div>
</div>
  </form>        
  <table class="table">
    <thead class="bg-danger">
      <tr class="text-center">
        <th>Numero de client</th>
        <th>Numero de chambre</th>
       <th>Date d'arrivee</th>
        <th>Date de depart</th>
        <th >Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php
         foreach($data as $d){ ?>
      <tr class="text-center">
        <td><?=$d->getnumclient();?></td>
        <td><?=$d->getnumchambre();?></td>
        <td><?php echo date('d/m/y' , strtotime($d->getdatearrivee()));?></td>
        <td><?php echo date('d/m/y' , strtotime($d->getdatedepart()));?></td>
        <div class="row">
        <td> <a href="./index.php?action=modif_resa&id=<?=$d->getnumchambre();?>&depart=<?=$d->getdatedepart();?>&&numclient=<?=$d->getnumclient();?>" class="btn btn-warning text-white">modifier</a></td>
     
        
      </div>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php
$contenu = ob_get_clean();
require_once('template.php');
?>