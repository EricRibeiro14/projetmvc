
<?php ob_start() ?>
<div class="container col-5 bg-warning rounded">

<form class="pt-3 pb-3 mt-5 mb-5  " method="POST">
<h3 class="text-center">Créé votre reservation :</h3>
<div class="row mt-3 ">
  <div class="form-group  col-6">
    <label  for="exampleInputEmail1">Nom</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="" required name="nom">
    <small id="emailHelp" class="form-text text-muted">obligatoire</small>
  </div>
  <div class="form-group  col-6">
    <label for="exampleInputEmail1">Prenom</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="" required name="prenom">
    <small id="emailHelp" class="form-text text-muted">obligatoire</small>
  </div>
  </div>
  <div class="row ">
  <div class="form-group  col-6">
    <label for="exampleInputEmail1">Telephone</label>
    <input type="number" class="form-control"  aria-describedby="emailHelp" placeholder="" required name="tel">
    <small id="emailHelp" class="form-text text-muted">obligatoire</small>
  </div>
  <div class="form-group  col-6">
    <label for="exampleInputEmail1">Adresse</label>
    <input type="text" class="form-control"   required name="adresse">
    <small id="emailHelp" class="form-text text-muted">obligatoire</small>
  </div>
  </div>
  <div class="row ">
  <div class="form-group  col-6">
    <label for="exampleInputPassword1">Date d'arrivee</label>
    <input type="date" class="form-control"  placeholder="" name="datearrivee">
  </div>
  <div class="form-group  col-6">
    <label for="exampleInputPassword1">Date de depart</label>
    <input type="date" class="form-control" placeholder="" name="datedepart">
  </div>
  </div>
  <p class="text-center mt-4">
  <button type="submit" class="btn btn-primary" name="soumis">Réserver</button>
    </p>
    
</form>
</div>
<?php $contenu=ob_get_clean(); ?>
<?php require_once("./views/gabarit.php");?>
