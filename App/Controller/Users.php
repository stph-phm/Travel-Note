<?php


namespace App\Controller;


use App\Model\UsersManager;

class Users extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listUser()
    {
        include 'View/User/listUserView.php';
    }

    public function registerUser()
    {
        $username = "";
        $email = "";
        $pswd = "";
        $pswd2 = "";
        $first_name ="";
        $last_name = "";

        if (isset($_POST['register'])) {
            $username = $this->str_secur($_POST['username']);
            $email = $this->str_secur($_POST['email']);
            $pswd = $this->str_secur($_POST['pswd']);
            $pswd2 = $this->str_secur($_POST['pswd2']);
            $first_name  =$this->str_secur($_POST['first_name']);
            $last_name = $this->str_secur($_POST['last_name']);

            if (!empty($username) && !empty($email) && !empty($pswd) && !empty($pswd2) && !empty($first_name) && !empty($last_name)) {
                $usersManager = new UsersManager();
                $userByUsername = $usersManager->getUserByUsername($username);

                if (!$userByUsername){
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $userByEmail = $usersManager->getUserByEmail($email);

                        if (!$userByEmail) {
                            if (strlen($this->trim_secur($pswd)) >= 5 ) {
                                if ($pswd == $pswd2) {
                                    $pswdHash = password_hash($pswd, PASSWORD_DEFAULT);
                                    $usersManager->addUSer($username, $first_name, $last_name, $email, $pswdHash);

                                } else {
                                    $errorMsg = "Les mots de passe ne se correspondent pas !";
                                }
                            } else {
                                $errorMsg = "Le mot de passe doit faire plus de 5 caractère";
                            }
                        } else {
                            $errorMsg = "L'adresse mail est déjà utilisée ! Veuillez choisi un autre !";
                        }
                    } else {
                        $errorMsg = " L'adresse mail n'est pas valide! Veuillez recommencer !";
                    }
                } else {
                    $errorMsg = "L'identifiant existe déjà, veuillez choisir un nouvel !";
                }
            } else {
                $errorMsg = "Veuillez remplir tous les champs ! ";
            }
        }
        include "View/Registration/registerUserView.php";
    }


    public function profilUser()
    {
        include 'View/User/profilView.php';
    }

    public function reportUser()
    {

    }

    public function validateUser()
    {

    }

    public function deleteUser()
    {

    }

    public function loginUser()
    {
        $email ="";
        $pswd ="";

        if (isset($_POST['login'])) {
            $email = $this->str_secur($_POST['email']);
            $pswd = $this->trim_secur($_POST['pswd']);

            if (!empty($email) && !empty($pswd)) {
                $usersManager = new UsersManager();
                $userByEmail = $usersManager->getUserByEmail($email);
                $pswdCorrect = password_verify($pswd, $userByEmail['password_user']);

                if ($pswdCorrect) {
                    $_SESSION['userId'] = $userByEmail['id'];
                    $hashSession = $this->hashSession($_SESSION['userId']);
                    $_SESSION['hashUserId'] = $hashSession;

                    header('Location: index.php');
                }else {
                    $errorMsg = "Vos identifiants sont incorrects ! ";
                }

            }else {
                $errorMsg = "Vos identifiants sont incorrects ! ";
            }
        }
        include "View/Registration/loginUserView.php";
    }

    public function logoutUser()
    {

    }
}