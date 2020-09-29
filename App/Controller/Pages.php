<?php

namespace App\Controller;


use App\Model\UsersManager;


class Pages extends Controller 
{
     public function showDashboard() {
          if(!$this->isAdmin) {
               \header('Location: index.php');
          }
          include 'View/Page/Dashboard/dashboardView.php';
     }
}