<?php
 ob_start();

?>

<h3 class="text-center">Formulaire de modification</h3>
<div class="container ">
<form method="POST" class="mt-5" enctype="multipart/form-data">
    <div class="offset-3 col-6">
    <div class="row">
  <div class="form-group col-6">
    <label for="marque">Nombre de lits</label>
    <input type="text" class="form-control" id="marque" value="<?=$data->getnblits(); ?>"  placeholder="Nombre de lits" required name="nblits">
  </div>
  <div class="form-group col-6">
    <label for="model">Nombre de personne</label>
    <input type="text" class="form-control" id="nbpers"  value="<?=$data->getnbpers(); ?>"  placeholder="Nombre de personnes"  required name="nbpers">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-6">
    <label for="annee">confort</label>
    <input type="text" class="form-control" id="confort" placeholder="Confort"  value="<?=$data->getcomfort(); ?>"  required name="confort">
  </div>
  <div class="form-group col-6">
    <label for="pays">image</label>
    <input type="file" class="form-control" id="image" name="image">
    <img src="asset/image/<?=$data->getimage();?>" alt="">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-6">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description"  value="<?=$data->getdescription();?>" placeholder="Description"  required name="description">
  </div>
  <div class="form-group col-6">
    <label for="prix">Prix</label>
    <input type="text" class="form-control" id="prix" placeholder="Prix" value="<?=$data->getprix();?>"  required name="prix">
  </div>
  </div>
  <div class="row">
  <button type="submit" name="soumis" class="btn btn-primary col-6">Modifier</button>
 <a class="btn btn-secondary col-6" href="index.php?action=list_chambre">Annuler</a>
 </div>
</form>
</div>
</div>
<?php $contenu=ob_get_clean(); 
require_once('template.php') ?>