<?php

namespace App\Controller;


use App\Model\UsersManager;


class Users extends Controller 
{

    /**
     * Users constructor.
     */
    public function __construct() {
        parent::__construct();
    }
    
    public function signUp()
    {
        $username = "";
        $email = "";
        $pswd = "";
        $pswd2 = "";

        if (isset($_POST['submit'])) {
            $username = $this->str_secur($_POST['username']);
            $email = $this->str_secur($_POST['email']);
            $pswd = $this->str_secur($_POST['pswd']);
            $pswd2 =  $this->str_secur($_POST['pswd2']);

            //is not
            if(!empty($username) && !empty($email) && !empty($pswd) && !empty($pswd2)) {
                $usersManager = new UsersManager();
                $userByUsername = $usersManager->getUserByUsername($username);

                if(!$userByUsername) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $userByEmail = $usersManager->getUserByEmail($email);

                        if (!$userByEmail) {
                            if (strlen($pswd) >= 5) {
                                $pswdHash = password_hash($pswd, PASSWORD_DEFAULT );
                                $usersManager->addUser($username, $email, $pswdHash);

                                header('Location: index.php?action=signIn');
                            } else {
                                $errorMsg = "Le mot de passe doit faire plus de 5 caractères";
                            }
                        } else {
                            $errorMsg = "L'adresse mail est déjà utilisée ! Veuillez choisir un autre";
                        }
                    } else {
                        $errorMsg ="L'adresse mail n'est pas valide veuillez choisir un autre !";
                    }
                } else {
                    $errorMsg ="L'identifiant existe déjà, veuillez trouver un autre";
                }
            } else {
                $errorMsg = "Veuillez remplir tous les champs !";
            }
        }
        include 'View/Registration/registerUserView.php';
    }

    public function signIn()
    {
        $email = "";
        $pswd = "";
        
        if (isset($_POST['connect'])) {
            $email = $this->str_secur($_POST['email']);
            $pswd = $this->trim_secur($_POST['pswd']);
    
            if (!empty($email) && !empty($pswd)) {
                $usersManager = new UsersManager;
                $userByEmail = $userByEmail = $usersManager->getUserByEmail($email);
                $pswdCorrect = password_verify($pswd, $userByEmail['password_user']);

                if ($pswdCorrect) {
                    $_SESSION['userId'] = $userByEmail['id'];
                    $hashSession = $this->hashSession($_SESSION['userId']);
                    $_SESSION['hashUserId'] = $hashSession;

                    \header('Location: index.php');
                } 
                else {
                    $errorMsg = "Vos identifiants sont incorrects ! ";
                }
            } 
            else {
                $errorMsg = "Vos identifiants sont incorrects ! ";
            }
        }
        include 'View/Registration/loginUserView.php';
    }


    public function logoutUser()
    {
        session_destroy();
        \header("Location: index.php?action=signIn");
    }
}