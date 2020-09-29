<?php


namespace App\Controller;


class Error extends Controller
{
    public function displayErrorBlock(\Exception $e)
    {
        $errorMsgBlock = $e->getMessage();
        include 'View/Page/errorMsgBlock.php';
    }
}