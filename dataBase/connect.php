<?php
class DataBase{
    private string $host = 'localhost';
    private string $user_name = 'root';
    private string $user_password = '';
    private string $dataBaseName = 'BLOg';
    public string $tableName;
    public $connect;

    function __construct($tabName = "Users"){
        $this->tableName = $tabName;
        $this->connect = mysqli_connect($this->host, $this->user_name, $this->user_password, $this->dataBaseName);
        if (!$this->connect) {
            echo 'connect failed';
        }
    }

    public function getFullDB(): array {
        $querySql = 'SELECT * from Users;';
        $result = mysqli_query($this->connect, $querySql);
        if (!$result) {
            die('failed'.mysqli_connect_error());
        }
        $dataArray = [];
        while ($row = mysqli_fetch_assoc($result)) {
           array_push($dataArray, $row);
        }
        return $dataArray;
    }

    public function addNewUser($login, $email, $password) {
        $querySql = "INSERT INTO Users (login, email, password) VALUES ('$login', '$email', '$password')";
        $result = mysqli_query($this->connect, $querySql);
        if (!$result) {
            die('failed'.mysqli_connect_error());
        }

    }
    public function deleteByLogin() {

    }



}