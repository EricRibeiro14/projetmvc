<?php
ob_start();
?>
<div class="container">
  <h2 class="text-center mb-5">liste des Chambres</h2>
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
        <th>Numero</th>
        <th>Prix</th>
        <th>Nombre de lits</th>
        <th>Nombre de personnes</th>
        <th>Confort</th>
        <th>Image</th>
        <th colspan="3">Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php
         foreach($data as $d){ ?>
      <tr class="text-center">
        <td><?=$d->getnumchambre();?></td>
        <td><?=$d->getPrix();?>&euro;</td>
        <td><?=$d->getnblits();?></td>
        <td><?=$d->getnbpers();?></td>
        <td><?=$d->getComfort();?></td>
        <td><img src="./asset/image/<?=$d->getImage();?>" style="width: 150px" alt=""></td>
        <div class="row">
        <td> <a href="./index.php?action=info&id=<?=$d->getnumchambre();?>" class="btn btn-success ">Info</a></td>
        <?php if(isset($_SESSION['Auth'])){
          if($_SESSION['Auth']['role'] == 1){?>
          <td><a onclick="return confirm('etez-vous sure de vouloir suprimer')" href="./index.php?action=suprimer&image=<?=$d->getImage()?>&id=<?=$d->getnumchambre();?>" class="btn btn-danger col ">Suprimer</a></td>
        <td> <a href="./index.php?action=edit&id=<?=$d->getnumchambre();?>" class="btn btn-warning text-white">modifier</a></td>
         <?php }}?>
        
     
        
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