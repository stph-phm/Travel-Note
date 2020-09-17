<?php
namespace App\Model;

class Manager {
     protected function dbConnect()
     {
          include \dirname(\dirname(__DIR__)) . '/Config/config.php';

          $db = new \PDO("mysql:host=$host;dbname=$dbName;charset=utf8",$login, $passwd);
          return $db;
     }
}