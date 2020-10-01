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
    
    public function listUsers()
    {
        if (!$this->isAdmin) {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }

        $usersManager = new UsersManager;
        $listUsers = $usersManager->listUsers();


        include 'View/User/listUserView.php';
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

    public function blockUser()
    {
        if (!$this->isAdmin) {
            \header('Location: index.php');
        }

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $user_id = $this->trim_secur($_GET['id']);
            $usersManager = new UsersManager;
            $userById = $usersManager->getUserById($user_id);

            if(!$userById) {
                throw new \Exception('Aucun identifiant de billet envoyé');
            } else {
                $usersManager->blockUser($user_id);

                header('Location: index.php?action=managementUsers');
            }
        } else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }
    }

    public function unblockUser() {
        if (!$this->isAdmin) {
            \header('Location: index.php');
        }

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $user_id = $this->trim_secur($_GET['id']);
            $usersManager = new UsersManager;
            $userById = $usersManager->getUserById($user_id);

            if(!$userById) {
                throw new \Exception('Aucun identifiant de billet envoyé');
            } else {
                $usersManager->unblockUser($user_id);

                header('Location: index.php?action=managementUsers');
            }
        } else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }
    }

    public function displayUser()
    {
        if (!$this->isAdmin) {
            header('Location: index.php');
        }

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $user_id = $this->trim_secur($_GET['id']);
            $usersManager = new UsersManager;
            $userById = $usersManager->getUserById($user_id);

            if (!$userById) {
                throw new \Exception('Aucun identifiant de billet envoyé');
            }
        } else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }

        include 'View/User/displayUser.php';
    }

    public function profilUser()
    {
        if (!$this->isLogin) {
        header('Location: index.php');
        }

        include 'View/User/profilView.php';
    }

}