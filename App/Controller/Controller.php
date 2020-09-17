<?php
namespace App\Controller;


class Controller
{
    public $userInfo;
    public $isLogin;
    public $isAdmin;

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
}