<?php
interface DBInfo {
    const host = 'localhost';
    const user_name = 'root';
    const user_password = '';
    const dataBaseName = 'Blog';
}

class DataBase implements DBInfo{
    protected string $tableName;
    protected $connect;

    function __construct(string $tabName = "Users"){
        $this->tableName = $tabName;
        $this->connect = mysqli_connect($this::host, $this::user_name, $this::user_password, $this::dataBaseName);
        if (!$this->connect) {
            echo 'connect failed';
        }
    }

    public function getFullDB(): array {
        $querySql = "SELECT * from $this->tableName;";
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

    public function login($login, $password): ?array {
        $result = $this->getFullDB();
        $currentUser = null;
        foreach ($result as $item) {
            if ($item['login'] === $login && $item['password'] === $password) {
                $currentUser = $item;
            }
        }
        return $currentUser;
    }

    public function addNewUser($login, $email, $password) {
        $querySql = "INSERT INTO $this->tableName 
(login, email, password) VALUES ('$login', '$email', '$password')";
        $result = mysqli_query($this->connect, $querySql);
        if (!$result) {
            die('failed'.mysqli_connect_error());
        }

    }

    public function deleteById($user_id) {
        $querySql = "DELETE FROM $this->tableName WHERE user_id = '$user_id';";
        $result = mysqli_query($this->connect, $querySql);
        if (!$result) {
            die('failed'.mysqli_connect_error());
        }

    }

    public function selectByColumnName($column_name): array {
        $querySql = "SELECT $column_name, user_id FROM $this->tableName";
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
}