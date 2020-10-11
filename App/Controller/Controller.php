<?php
namespace App\Controller;


use App\Model\UsersManager;
use App\Session\FlashSession;

class Controller
{
    public $userInfo;
    public $isLogin;
    public $isAdmin;
    public $displauFlash;

    function __construct() {
        $this->isLogin = $this->isLogin();
        $this->isAdmin = $this->isAdmin();
        $this->displayFlash = $this->displayFlash();
    }

    public function isLogin()
    {
        if (isset($_SESSION['userId']) && $this->ifHashSession()) {
            $userManager = new UsersManager;
            $this->userInfo = $userManager->getUserById($_SESSION['userId']);
        } else {
            $this->userInfo = false;
        }
        return $this->userInfo;
    }

    public function isAdmin()
    {
        if($this->isLogin()) {
            if ($this->userInfo['is_admin'] == 1) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function hashSession($valeur)
    {
        return hash("sha256", $valeur);
    }

    public function ifHashSession()
    {
        $hashSession = $this->hashSession($_SESSION['userId']);
        if ($hashSession == $_SESSION['hashUserId']) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param $string
     * @return string
     */
    public function str_secur($string)
    {
        return trim(htmlspecialchars($string));
    }

    /**
     * @param $string
     * @return string
     */
    public function trim_secur($string)
    {
        return trim($string);
    }

    /**
     * @param $string
     * @return string
     */
    public function nl2br_secur($string)
    {
        return nl2br($string);
    }

    public function displayFlash() {
        if (isset($_SESSION['flash'])) {
            $flashSession = new FlashSession();
            return $flashSession->getSession();
        }
        return [];
    }
}