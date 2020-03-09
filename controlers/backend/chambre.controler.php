<?php
require_once('./commun/connect.php');
require_once("./model/backend/backdriver.php");
require_once("./model/chambre.php");
class ChambreControler{
    private $driver;
    private $chambre;
    public function __construct($base)
    {
        $this->driver = new Backdriver($base);
        $chambre = new Chambre();
    }
    public function getChambre($mcle){
        
        $data = $this->driver->listeChambre($mcle);

        require_once('./views/backend/listeChambre.php'); 
     }

     public function addChambre(){
        if(isset($_POST["soumis"]) && isset($_POST["prix"]) && isset($_POST["nbpers"])){
            $prix = trim(htmlspecialchars(addslashes($_POST['prix'])));
            $nbpers = (int)$_POST["nbpers"];
            $nblits = (int)$_POST["nblits"];
            $confort = trim(htmlspecialchars(addslashes($_POST['confort'])));
            $image  = $_FILES['image']['name'];
            $description = trim(htmlspecialchars(addslashes($_POST['description'])));
            
            $destination  = './asset/image/';
            move_uploaded_file($_FILES['image']['name'],$destination.$_FILES['image']['name']);
            
            $chambre = new Chambre();
            $chambre->setPrix($prix);
            $chambre->setNbpers($nbpers);
            $chambre->setNblits($nblits);
            $chambre->setComfort($confort);
            $chambre->setImage($image);
            $chambre->setDescription($description);

            $this->driver->addChambre($chambre);

                header("location:index.php?action=list_chambre");
        
        }  
    }
public function a(){
    require_once('./views/backend/ajoutChambre.php');
}

public function suprimer($numchambre, $image){
        
    $chambre = new Chambre;
    $chambre->setNumChambre($numchambre);
    $chambre->setImage($image);
    unlink("./asset/image".$chambre->getImage());
    $this->driver->supChambre($chambre);
    header("location:./index.php?action=list_chambre");
}
public function edit($id){
        
    if(isset($_POST["soumis"]) && isset($_POST["nblits"])  && isset($_POST["nbpers"]) && strlen($_POST["confort"])>=2){
        $id = (int)trim(htmlspecialchars(addslashes($_POST['numchambre'])));
        $nbpers = trim(htmlspecialchars(addslashes($_POST['nbpers'])));
        $nblits = trim(htmlspecialchars(addslashes($_POST['nblits'])));
        $confort = trim(htmlspecialchars(addslashes($_POST['confort'])));
        $prix = intval(($_POST['prix']));
        $image = $_FILES['image']['name'];
        $numchambre  = (int)$_GET['id'];
        $description = trim(htmlspecialchars(addslashes($_POST['description'])));
        $destination  = 'image/';
        move_uploaded_file($_FILES['image']['name'],$destination.$_FILES['image']['name']);
        $cha = new Chambre();
        $cha->setNumchambre($numchambre);
        $cha->setNblits($nblits);
        $cha->setNbpers($nbpers);
        $cha->setComfort($confort);
        $cha->setDescription($description);
        $cha->setPrix($prix);
        $cha->setImage($image);
        $this->driver->updateChambre($cha);
        
        
        header("location:./index.php?action=list_chambre");

}
$data = $this->driver->editerChambre($id);
    $datacat = $this->driver->listeChambre($id);
    require_once('./views/backend/editChambre.php');


}
    public function info($id){
        $data = $this->driver->editerChambre($id);
    require_once('./views/backend/infoChambre.php');
    }  
    public function info2($id){
        $data = $this->driver->editerChambre($id);
    require_once('./views/backend/infoClient.php');
    }

    
}