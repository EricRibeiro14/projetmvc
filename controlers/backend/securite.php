<?php
session_start();
require_once("Auth.controler.php");
if(!AuthControler::islogged()){
    header("location:index.php?action=login");
    exit;
}



?>