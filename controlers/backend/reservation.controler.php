<?php
require_once('./commun/connect.php');
require_once("./model/backend/backdriver.php");
require_once("./model/chambre.php");
require_once("./model/reservation.php");
class ReservationControler{
    private $driver;
    private $resa;
    public function __construct($base)
    {
        $this->driver = new Backdriver($base);
        $resa = new Reservation();
    }




    public function getresa($mcle){
        $data = $this->driver->listeReservation($mcle);

        require_once('./views/backend/listeReservation.php'); 
    }





    public function modif_resa($id){
       
            $erreur="";
            if(isset($_POST["soumis"]) && isset($_POST["numchambre"])  && isset($_POST["datearrivee"]) && isset($_POST["datedepart"])){
                
                if($_POST['datedepart'] > $_GET['depart']){ 
                $id = (int)trim(htmlspecialchars(addslashes($_POST['numchambre'])));
                $arrivee = trim(htmlspecialchars(addslashes($_POST['datearrivee'])));
                $depart = trim(htmlspecialchars(addslashes($_POST['datedepart'])));
                $numclient = (int)$_GET['numclient'];
                $resa = new Reservation();
                $resa->setNumclient($numclient);
                $resa->setDatearrivee($arrivee);
                $resa->setDatedepart($depart);
                $resa->setNumchambre($id);
                $this->driver->modifresa($resa);        
                header("location:./index.php?action=list_resa");
                }else{
                    $erreur = "<div class='alert alert-danger col text-center mt-3'><strong>La modification n'est pas correcte</strong></div>";
                }
               
        }
      
            $data = $this->driver->editresa($id);
            require_once('./views/backend/editreservation.php');
    }





    public function addresa(){
        if(isset($_POST["soumis"]) && isset($_POST["datearrivee"]) && isset($_POST["datedepart"])){
            $arrivee = $_POST['datearrivee'];
            $depart = $_POST["datedepart"];
            $numclient=(int)$_POST["numclient"];
            $numchambre = (int)$_POST["numchambre"];
            $resa = new Reservation();
            $resa->setNumchambre($numchambre);
            $resa->setNumclient($numclient);
            $resa->setDatearrivee($arrivee);
            $resa->setDatedepart($depart);

            $this->driver->addReservation($resa);

                header("location:index.php?action=list_resa");
        
        } 
        require_once("./views/backend/ajoutresa.php");
    }
    


    public function addresa2(){
        if(isset($_POST["soumis"]) && isset($_POST["datearrivee"]) && isset($_POST["datedepart"])){
            $arrivee = ($_POST['datearrivee']);
            $depart = $_POST["datedepart"];
            $numclient=(int)$_POST["numclient"];
            $numchambre = (int)$_POST["numchambre"];
            $resa = new Reservation();
            $resa->setNumclient($numclient);
            $resa->setNumchambre($numchambre);
            $resa->setDatearrivee($arrivee);
            $resa->setDatedepart($depart);
            $this->driver->addReservation($resa);
                header("location:index.php?action=resum&id=".$_GET['id']."&&arrivee=".$arrivee."&&depart=".$depart);
        
        } 
        require_once("./views/backend/ajoutresaclient.php");
    }

    public function resumer($id){
        //$data = $this->driver->editresa($id);
        $data2=$this->driver->editerChambre($id);
        //$data = $this->driver->listeReservation($id);
        //$data2=$this->driver->listeChambre($id);
        require_once("./views/backend/resumer.php");
    }
}