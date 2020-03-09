<?php
try{
    $base = new PDO('mysql:host=127.0.0.1; dbname=projetphp','root','');
    //$bass->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
}catch(Exception $ex){
    die("erreur de conexion : ".$ex->getMessage());
}
?>