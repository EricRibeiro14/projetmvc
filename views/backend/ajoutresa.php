<?php ob_start();?>
<h3 class="text-center" class="mt-5">Ajout de Reservation</h3>
<div class="container ">
<form method="POST" class="mt-5" enctype="multipart/form-data">
    <div class="offset-3 col-6">
    <div class="row">
  <div class="form-group col-6">
    <label for="marque">Numero de chambre</label>
    <input type="text" class="form-control" id="marque"  placeholder="Numero de chambre" required name="numchambre">
  </div>
  <div class="form-group col-6">
    <label for="model">Numero client</label>
    <input type="text" class="form-control" id="model"  placeholder="Numero client"  required name="numclient">
  </div>
  </div><br>
  <div class="row">
  <div class="form-group col-6">
    <label for="annee">Date arrivee</label>
    <input type="date" class="form-control" id="annee" placeholder="Confort"  required name="datearrivee">
  </div>
  <div class="form-group col-6">
    <label for="datedepart">Date de depart</label>
    <input type="date" class="form-control" id="datedepart"  required  name="datedepart">
  </div>
  </div><br>
  <button type="submit" name="soumis" class="btn btn-primary col">Ajouter</button>
</form>
</div>
</div>
<?php $contenu=ob_get_clean(); 
require_once('template.php') ?>