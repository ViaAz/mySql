<?php
require 'connect.php';
class DataBaseStart extends DataBase {
    public $connectDB;

    function __construct(string $dataBaseName = "BLOgTest222", string $tabName = "Users"){
        $this->tableName = $tabName;
        $this->connectDB = mysqli_connect($this->host, $this->user_name, $this->user_password);
        $this->connectDB->query("CREATE DATABASE IF NOT EXISTS $dataBaseName;");
        $this->connectDB->select_db($dataBaseName);
        $this->connectDB->query("CREATE TABLE IF NOT EXISTS $tabName (
        user_id int NOT NULL UNIQUE,
        login varchar(35) NOT NULL,
        email varchar(35) NOT NULL,
        password varchar(35) NOT NULL,
        PRIMARY KEY (user_id)
        );");


    }

    public function AddDataBase($db) {
        //        if ($this->connectDB->query("SHOW DATABASES LIKE '$db';")) {
//            echo "exist";
//            $this->connectDB->select_db($db);
//            if ($this->connectDB) echo "goooood!!";
//        } else {
//            $this->connectDB = $this->connect->query("CREATE DATABASE '$db';");
//            echo "created";
//            if ($this->connectDB) echo "goooood!!";
//        }
    }


}