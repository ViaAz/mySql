<?php
require 'connect.php';
class DataBaseStart extends DataBase {
    public $connectDB;
    private $dataBaseName;


    function __construct(string $db = "BLOg", string $tabName = "Users"){
        $this->tableName = $tabName;
        $this->dataBaseName = $db;


    }

    public function createDB($db): void{
        $this->connectDB = mysqli_connect($this->host, $this->user_name, $this->user_password);
        $this->connectDB->query("CREATE DATABASE IF NOT EXISTS $db;");
        $this->connectDB->select_db($db);
    }

    public function createNotesTable($db) {
        $querySQL = "CREATE TABLE IF NOT EXISTS Notes (
        id int NOT NULL UNIQUE,
        login varchar(35) NOT NULL,
        email varchar(35) NOT NULL,
        password varchar(200) NOT NULL,
        PRIMARY KEY (id)
        );";
        $this->connectDB->query($querySQL);
    }


}