<?php
session_start();

require_once('./commun/connect.php');
require_once('./model/backend/backdriver.php');
require_once('./model/user.php');



class UserControler{

    private $driver;

    public function __construct($base){
        $this->driver = new Backdriver($base);
    }
    public function login(){
        if(!empty($_POST['login']) && !empty($_POST['pass'])){
            $login = trim(htmlspecialchars(addslashes($_POST['login'])));
            $pass = md5(trim(htmlspecialchars(addslashes($_POST['pass']))));
            $role = (int)$_POST['role'];
            $user = new User();
            $user->setLogin($login);
            $user->setPass($pass);
            $user->setRole($role);
            $userobj = $this->driver->getusers($user);
            if($userobj){
                $_SESSION['Auth'] = array('login'=>$userobj->getLogin(),'pass'=>$userobj->getPass(),'role'=>$userobj->getRole());
               
                header('location:index.php?action=list_chambre');
            }else{
                $erreur = "<div class='alert alert-danger'>le login ou mot de passe ne corespond pas</div>";
            }

        }
        
        require_once('./views/backend/login.php');
        
    }
        public function logout(){
        
        session_start();
        session_destroy();
        session_unset();

        header('location:index.php?action=login');
        exit;

        }

       





        public function login2(){
            if(!empty($_POST['login']) && !empty($_POST['pass'])){
                $login = trim(htmlspecialchars(addslashes($_POST['login'])));
                $pass = md5(trim(htmlspecialchars(addslashes($_POST['pass']))));
                $role = (int)$_POST['role'];
                $user = new User();
                $user->setLogin($login);
                $user->setPass($pass);
                $user->setRole($role);
                $this->driver->inscription($user);
                $userobj = $this->driver->getusers($user);
                if($userobj){
                    $_SESSION['Auth'] = array('login'=>$userobj->getLogin(),'pass'=>$userobj->getPass(),'role'=>$userobj->getRole());
                   
                    header('location:index.php?action=login');
                }else{
                    $erreur = "<div class='alert alert-danger'>le login ou mot de passe ne corespond pas</div>";
                }
               
                
    
            }
            
            require_once('./views/backend/inscription.php');
            
        }


}