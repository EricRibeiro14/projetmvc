<?php

require_once('./model/driver.php');

class Backdriver extends Driver{
    public function __construct($base)
    {
        parent::__construct($base);
    }



    public function addChambre(Chambre $chambre){
        $sql="INSERT INTO chambre(prix, nblits, nbpers, confort, image, description) VALUES (?,?,?,?,?,?)";
        $res = $this->base->prepare($sql);
        $tab = [$chambre->getPrix(), $chambre->getNblits(),$chambre->getNbpers(), $chambre->getComfort(), $chambre->getImage (), $chambre->getDescription()];
        $res->execute($tab);
            return $this->base->lastInsertId();
    }



    public function supChambre(Chambre $chambre){
        $sql = "DELETE FROM chambre WHERE numchambre = ?";
        $res = $this->base->prepare($sql);
        $res->execute([$chambre->getNumchambre()]);
        if($res){
            unlink("./asset/".$chambre->getImage());
        }else{
            echo"echec...";
        }
    }



    public function editerChambre($id){
        $sql = "SELECT * FROM chambre WHERE numchambre =?";
        $res = $this->base->prepare($sql);
        $res->execute([$id]);
        $data  =$res->fetch(PDO::FETCH_OBJ);
        $veh = new Chambre();
        $veh->setNumchambre($data->numchambre);
        $veh->setNblits($data->nblits);
        $veh->setNbpers($data->nbpers);
        $veh->setPrix($data->prix);
        $veh->setComfort($data->confort);
        $veh->setDescription($data->description);
        $veh->setImage($data->image);
        return $veh;
    }



    public function updateChambre(Chambre $cha){
        if($cha->getImage() == ""){
    $sql ="UPDATE chambre SET prix=?,nblits=?,nbpers=?,confort=?,description=?
    WHERE numchambre=".$cha->getNumchambre();
    $tab = [$cha->getPrix(),$cha->getNblits(),$cha->getNbpers(),$cha->getComfort(),$cha->getDescription()];
    $res = $this->base->prepare($sql);
    
        }else{
            $sql ="UPDATE chambre SET prix=?,nblits=?,nbpers=?,confort=?,image=?,description=?
            WHERE numchambre=".$cha->getNumchambre();
    $tab = [$cha->getPrix(),$cha->getNblits(),$cha->getNbpers(),$cha->getComfort(),$cha->getImage(), $cha->getDescription()];
    $res = $this->base->prepare($sql);
        }
        $res->execute($tab);
    if($res){
        header("location:./index.php?action=list_chambre");
    }else{
        echo"erreur...";
    }
    }



    public function addReservation(Reservation $resa){
        $sql="INSERT INTO reservations(numclient, numchambre, datearivee, datedepart) VALUES (?,?,?,?)";
        $res = $this->base->prepare($sql);
        $tab = [$resa->getNumclient(), $resa->getNumchambre(), $resa->getDatearrivee (), $resa->getDatedepart()];
        $res->execute($tab);

    }




    public function editresa($id){
        $sql="SELECT * FROM reservations WHERE numchambre= ?";
        $res = $this->base->prepare($sql);
        $res->execute([$id]);
        $data  =$res->fetch(PDO::FETCH_OBJ);
        $veh = new Reservation();
        $veh->setNumclient($data->numclient);
        $veh->setNumchambre($data->numchambre);
        $veh->setDatearrivee($data->datearivee);
        $veh->setDatedepart($data->datedepart);
        return $veh;
    }


    public function modifresa(Reservation $resa){
        $sql ="UPDATE reservations SET numchambre=?,datearivee=?,datedepart=?
    WHERE numchambre=".$_GET['id']." AND numclient=".$_GET["numclient"];
    $tab = [$resa->getNumchambre(),$resa->getDatearrivee(),$resa->getDatedepart()];
    $res = $this->base->prepare($sql);
    $res->execute($tab);
    if($res){
        header("location:./index.php?action=list_resa");
    }else{
        echo"erreur...";
    }
    }

    public function getUsers(User $user){
        
        $sql = "SELECT * FROM utilisateurs 
        WHERE(login = :login)
         AND (pass = :pass) ";
         $res = $this->base->prepare($sql);
         $res->execute(array('login'=>$user->getLogin(), 'pass'=>$user->getPass()));
         if($res){
            $row = $res->fetch();
            $newUser = new User();
            $newUser->setLogin($row['login']);
            $newUser->setPass($row['pass']);
            $newUser->setRole($row['role']);
            return $newUser;
         }
         //header('location:./index.php?action=list_veh');
    }

    public function inscription(User $user){
        $sql = "INSERT INTO utilisateurs(login,pass,role) VALUES(?,?,?)";
        $res = $this->base->prepare($sql);
        $res->execute([$user->getLogin(),$user->getPass(),$user->getRole()]);
        if($res){
            $row = $res->fetch();
            $newUser = new User();
            $newUser->setLogin($row['login']);
            $newUser->setPass($row['pass']);
            return $newUser;
        }
    }





    /*public function addreservation2(Reservation $resa){
        if(isset($_GET['id'])){

            if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['datearrivee'])&& !empty($_POST['datedepart'])){ 
                 //reservation
                    $datearrivee = $_POST['datearrivee'];
                    $datedepart = $_POST['datedepart'];
                    if($datearrivee < $datedepart){
                  //Client
                    $nom = trim(addslashes(htmlentities($_POST['nom'])));
                    $prenom = trim(addslashes(htmlentities($_POST['prenom'])));
                    $tel = (int)$_POST['tel'];
                    $adresse = trim(addslashes(htmlentities($_POST['adresse'])));
                    $numchambre = (int)$_GET['id'];
                    $verif_client = "SELECT * FROM client WHERE nom = ? AND prenom = ? AND tel = ? AND adresse = ?";
                    $rows = $this->base->prepare($verif_client);
                    $rows->execute([$nom,$prenom,$tel,$adresse]);

                    $verif_resa = "SELECT * FROM reservations WHERE numchambre = ? AND datearivee = ? AND datedepart = ?";
                    $rows2 = $this->base->prepare($verif_resa);
                    $rows2->execute([$numchambre,$datearrivee,$datedepart]);
      
                    if($rows){
                      $numClient = "SELECT numclient FROM client WHERE nom = ? AND prenom = ? AND tel = ? AND adresse = ?";
                      $result_numClient = $this->base->prepare($numClient);
                      $rows3 = $result_numClient->execute([$nom,$prenom,$tel,$adresse]);
                      
                      if($rows2){
                        $erreur = '<div class="alert alert-danger text-center  mt-5">Cette chambre n\'est pas disponible a vos dates.</div>';
                      }else{
                        $resa = "INSERT INTO reservations(numclient, numchambre, datearivee, datedepart) VALUES (?,?,?,?)";
                        $result_resa = $this->base->prepare($resa);
                        $r = $result_resa->execute([$rows3['numclient'],$numchambre,$datearrivee,$datedepart]);
                        if($r){
                          header('location:index.php?action=result_resa&id='.$numchambre);
                        }else{
                            $erreur = '<div class="alert alert-danger text-center mt-5">Erreur lors de l\'éxecution de la requête.</div>';
                        }
                      }
                    }else{
                      $client = "INSERT INTO client(nom, prenom, tel, adresse) VALUES (?,?,?,?)";
                      $result_client = $this->base->prepare($client);
                      $result_client->execute([$nom,$prenom,$tel,$adresse]);
                      if($rows2){
                        
                        $erreur = '<div class="alert alert-danger text-center  mt-5">Cette chambre n\'est pas disponible a vos dates.</div>';
                      }else{
                        $numClient = "SELECT numclient FROM client WHERE nom = ? AND prenom = ? AND tel = ? AND adresse = ?";
                        $result_numClient = $this->base->prepare($numClient);
                        $result_numClient->execute([$nom,$prenom,$tel,$adresse]);
                        $resa = "INSERT INTO reservations(numclient, numchambre, datearivee, datedepart) VALUES (?,?,?,?)";
                        $result_resa = $this->base->prepare($resa);
                        $result_resa->execute([$rows3['numclient'],$numchambre,$datearrivee,$datedepart]);
                        if($result_client && $result_resa){
                           $success = '<div class="alert alert-success">felicitation votre reservation a été prise en compte </div> ';
                        }else{
                            $erreur = '<div class="alert alert-danger text-center col-4 offset-4 mt-5">Erreur lors de l\'éxecution de la requête.test</div>';
                        }
                      }
                    }
      
            }else{
              $erreur = "<div class='alert alert-danger text-center'><strong> les dates ne sont pas correct</strong> </div>";
            }
          }else{
            $erreur = "<br>Merci de compléter tous les champs.";
          }
        }
        return $erreur;
        return $success;
    }*/
    
}