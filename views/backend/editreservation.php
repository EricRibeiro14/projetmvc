<?php
 ob_start();
?>

<h3 class="text-center">Formulaire de modification</h3>
<div class="container ">
<form method="POST" class="mt-5" enctype="multipart/form-data">
<div class="offset-3 col-6">
    <div class="row">
        <div class="form-group col-6">
    <label for="numchambre">Numero de chambre</label>
    <input type="texte" readonly class="form-control" id="numchambre" name="numchambre" value="<?=$data->getnumchambre();?>">
  </div>
  <div class="form-group col-6">
    <label for="description">numclient</label>
    <input type="text" class="form-control" id="description" readonly value="<?=$data->getnumclient();?>"   required name="numclient">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-6">
    <label for="prix">Date d'arrivee</label>
    <input type="date" class="form-control" id="datearrivee" readonly value="<?=$data->getdatearrivee();?>"  required name="datearrivee">
  </div>
  <div class="form-group col-6">
    <label for="prix">Date de depart</label>
    <input type="date" class="form-control" id="prix" placeholder="Prix" value="<?=$data->getdatedepart();?>"  required name="datedepart">
  </div>
  </div>
  <div class="row">
  <button type="submit" name="soumis" class="btn btn-primary col-6">Modifier</button>
 <a class="btn btn-secondary col-6" href="index.php?action=list_resa">Annuler</a>
 </div>
 <?php if(isset($erreur)){
   echo $erreur;
 };?>
</form>
</div>
</div>

<?php $contenu=ob_get_clean(); 
require_once('template.php') ?>