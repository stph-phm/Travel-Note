<?php


namespace App\Controller;


class Users
{
    public function listUser()
    {
        include 'View/User/listUserView.php';
    }

    public function registerUser()
    {
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
        include "View/Registration/loginUserView.php";
    }

    public function logoutUser()
    {

    }
}