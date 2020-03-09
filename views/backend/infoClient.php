<?php ob_start(); ?>
<h2 class='text-center'>Detail Chambre n° <?=$_GET['id'];?></h2>
<div class="row">
    <div class="col-4">
        <img class="col" src="./asset/image/<?=$data->getimage();?>" alt="">
    </div>
    
    <div class="col-5">
    
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Numero de chambre</b> : <?=$_GET['id'];?> </li>
        <li class="list-group-item"><b>Confort</b> : <?=$data->getcomfort();?></li>
        <li class="list-group-item"><b>Prix</b> : <?=$data->getprix();?> &euro; / Nuit</li>
        <li class="list-group-item"><b>Nombre de personnes</b> : <?=$data->getnbpers();?></li>
        <li class="list-group-item"><b>Description</b> : <?=$data->getdescription();?></li>
        <div class="row offset-4">
        <li class="list-group-item "><a class="btn btn-secondary" href="index.php">Retour</a></li>
        <li class="list-group-item " ><a class="btn btn-success" href="index.php?action=reserver&id=<?=$data->getnumchambre();?>">Reserver</a></li>
        </div>
    </ul>
    
    </div>
</div>

<?php $contenu=ob_get_clean();?>
<?php require_once('./views/gabarit.php');?>
