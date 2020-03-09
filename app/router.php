<?php

require_once('./commun/connect.php');
require_once('./controlers/backend/Chambre.controler.php');
require_once('./controlers/backend/reservation.controler.php');
require_once('./controlers/frontend/publicControler.php');
require_once('./controlers/backend/user.controler.php');



class Router{
    private $ctrlChambre;
    private $ctrlResa;
    public function __construct($base)
    {
    $this->ctrlChambre = new ChambreControler($base);
    $this->ctrlResa = new reservationControler($base);
    $this->ctrlpub = new publicControler($base);
    $this->ctrluser = new userControler($base);
}
public function url(){
    try {
        if(isset($_GET['action'])){
            if($_GET['action'] == 'list_chambre'){
                if($_SERVER["REQUEST_METHOD"] === 'POST'){
                    $this->ctrlChambre->getChambre($_POST['mcle']);
                    }else{
                    $this->ctrlChambre->getChambre("");
                }                
            }elseif($_GET['action'] == 'ajout_chambre'){
                if($_SERVER["REQUEST_METHOD"] === 'POST'){
                    $this->ctrlChambre->addChambre();
                }else{
                    $this->ctrlChambre->a();
                }
            }elseif($_GET['action'] == 'suprimer'){
                if(isset($_GET['id']) && $_GET['image']){
                    $numchambre = intval(htmlspecialchars($_GET['id']));
                    $image = intval(htmlspecialchars($_GET['image']));
                    $this->ctrlChambre->suprimer($numchambre,$image);
                }

            }elseif($_GET['action'] == 'edit'){
                if(isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    if($id!=0){
                        $this->ctrlChambre->edit($id);
                    }
                }
            }elseif($_GET["action"] == "list_resa"){
                if($_SERVER["REQUEST_METHOD"] === 'POST'){
                    $this->ctrlResa->getresa($_POST['mcle']);
                    }else{
                        $this->ctrlResa->getresa("");
                }
                    
                
            }elseif($_GET["action"] === "info"){
                if(isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    if($id!=0){
                        $this->ctrlChambre->info($id);
                    }
                }
            }elseif($_GET["action"] === "modif_resa"){
                if(isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    if($id!=0){
                        $this->ctrlResa->modif_resa($id);
                    }
                }
            }elseif($_GET['action'] === "ajout_resa"){
                
                        $this->ctrlResa->addresa();
            }elseif($_GET['action'] === "info2"){
                if(isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    if($id!=0){
                $this->ctrlChambre->info2($id);
                    }
                }
            }elseif($_GET['action'] === "reserver"){
                if(isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    if($id!=0){
                $this->ctrlResa->addresa2($id);
                    }
                }
                }elseif($_GET['action'] === "login"){
                    $this->ctrluser->login();
                
            }elseif($_GET['action'] === "logout"){
                $this->ctrluser->logout();
            
        }elseif($_GET['action'] === "inscription"){
            $this->ctrluser->login2();
        
    }elseif($_GET['action'] === "resum"){
        if(isset($_GET['id'])){
            $id = (int)$_GET['id'];
            if($id!=0){                
                    $this->ctrlResa->resumer($id);
                
            }
        }
            
    
    
}else{

        throw new Exception("");

                }
        }else{
            $this->ctrlpub->acceuil();  
    }
}catch (\Throwable $th) {
    $this->page404("");
}
}
private function page404($mserreur){
    require_once('./views/page404.php');
}
}