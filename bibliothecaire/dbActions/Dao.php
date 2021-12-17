<?php

abstract class Dao
{

    protected $dbConnect;
    private $dsn = 'mysql:host=localhost;dbname=fil_rouge_maj01;charset=utf8';
    private $userName = 'root';
    private $password = '';

    //CREATION DU CONSTRUCTEUR
    public function __construct()
    {
        $this->dbConnect = $this->dbConnection();
    }

    //METHODE POUR LA CONNECTION A LA DB
    private function dbConnection()
    {
        try {
            $dbCo = new PDO($this->dsn, $this->userName, $this->password);
            $dbCo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbCo;
        } catch (PDOException $e) {
            header('Location:views/erreurs/redirect_erreurDataBase.php');
            exit();
        }
    }
}
