<?php


require_once('./commun/connect.php');
require_once('./model/Chambre.php');
require_once('./asset/stripe/vendor/autoload.php');

class PublicControler{
    private $driver;

    public function __construct($base){
        $this->driver = new Backdriver($base);
    }
    public function acceuil(){
        $data = $this->driver->listeChambre("");
        require_once('./views/frontend/acceuil.php');
    }
    public function payement(){
        if(isset($_POST['stripeToken']) && !empty($_POST['stripeToken'])){
            $token = $_POST['stripeToken'];
            $prix = $_POST['total'];
            $id = $_POST['id'];

            \Stripe\Stripe::setApiKey("pk_test_C3pR4HvmW0RtHPmeJZoBpfPR00m7mzxGLU");
            $charge = \Stripe\Charge::create([
                'amount'=>$prix.'00',
                'currency'=>'eur',
                'description'=>'ventes de véhicules',
                'source'=> $token
            ]);
        }


        require_once('./views/frontend/payement.php');
    }
}