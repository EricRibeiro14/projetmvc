<?php ob_start();?>
<h3 class="text-center" class="mt-5">Formulaire d'ajout de Chambre</h3>
<div class="container ">
<form method="POST" class="mt-5" enctype="multipart/form-data">
    <div class="offset-3 col-6">
    <div class="row">
  <div class="form-group col-6">
    <label for="marque">Nombre de lits</label>
    <input type="text" class="form-control" id="marque"  placeholder="Nombre de lits" required name="nblits">
  </div>
  <div class="form-group col-6">
    <label for="model">Nombre de personne</label>
    <input type="text" class="form-control" id="model"  placeholder="Nombre de personnes"  required name="nbpers">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-6">
    <label for="annee">confort</label>
    <input type="text" class="form-control" id="annee" placeholder="Confort"  required name="confort">
  </div>
  <div class="form-group col-6">
    <label for="pays">image</label>
    <input type="file" class="form-control" id="pays"  required  name="image">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-6">
    <label for="image">Description</label>
    <input type="text" class="form-control" id="image" placeholder="Description"  required name="description">
  </div>
  <div class="form-group col-6">
    <label for="image">Prix</label>
    <input type="text" class="form-control" id="image" placeholder="Prix"  required name="prix">
  </div>
  </div>
  <button type="submit" name="soumis" class="btn btn-primary col">Ajouter</button>
</form>
</div>
</div>
<?php $contenu=ob_get_clean(); 
require_once('template.php') ?>