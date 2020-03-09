<?php

require_once("../connect.php");
require_once("../autoload.php");
require_once('vendor/autoload.php');
var_dump($_POST);
if(isset($_POST['stripeToken']) && !empty($_POST['stripeToken'])){
    $token = $_POST['stripeToken'];
    $prix = $_POST['prix'];
    $id = $_POST['id'];
    \Stripe\Stripe::setApiKey('sk_test_JUU4DS3wDh0hAPNEmz9BFgct00gA7M39tc');
    $charge = \Stripe\Charge::create([
        'amount'=>$prix."00",
        'currency'=>'eur',
        'description'=>'Ventes de Vehicules',
        'source'=>$token,
    ]);
}
if($charge){
    $driver = new Driver($base);
    $veh = new Vehicule();
    $veh->setEtat(0);
    $veh->setId($id);
    $driver->changer($veh);
   header('location:../index.php');

}