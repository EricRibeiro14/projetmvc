<?php
class AuthControler{
    static function islogged(){
        if(isset($_SESSION['Auth'])){
            return true;
        }else{
            return false;
        }
    }
}


?>