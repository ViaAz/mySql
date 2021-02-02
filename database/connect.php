<?php

require 'creating.php';

class DBMain extends DataBaseStart
{
    protected string $tableNameUsers = 'Users';
    protected string $tableNameNotes = 'Notes';

    function __construct()
    {
        parent::__construct();
        parent::createUsersTable();
        parent::createImagesTable();
        parent::createNotesTable();
    }

    protected function getFullTable(string $tableName): array
    {
        $querySql = "SELECT * from $tableName;";
        $result = mysqli_query($this->connectDB, $querySql);
        if (!$result) {
            die('failed' . mysqli_connect_error());
        }
        $dataArray = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($dataArray, $row);
        }
        return $dataArray;
    }

    public function login(string $login, string $password): ?array
    {
        $result = $this->getFullTable($this->tableNameUsers);
        $currentUser = null;
        foreach ($result as $item) {
            if ($item['login'] === $login && $item['password'] === $password) {
                $currentUser = $item;
            }
        }
        return $currentUser;
    }

    public function addNewUser(string $firstName, string $surname, $birthday, string $login, string $email, string $password): ?bool
    {
//        $password = password_hash($password, PASSWORD_DEFAULT);
        $querySql = "INSERT INTO $this->tableNameUsers (firstName, surname, birthday, login, email, password) 
             VALUES ('$firstName', '$surname', DATE('$birthday'), '$login', '$email', '$password');";
        $result = mysqli_query($this->connectDB, $querySql);
        if (!$result) {
            die('failed' . mysqli_connect_error());
        }
        return (bool) $result;
    }

    public function createNotes($header, $body) {
        $curUser = (int) $_SESSION['user_info']['id'];
        $header = $this->connectDB->real_escape_string($header);
        $body = $this->connectDB->real_escape_string($body);
        $querySql = "INSERT INTO $this->tableNameNotes (header, body, created, owner_id) 
             VALUES ('$header', '$body', NOW(), '$curUser');";
        $result = mysqli_query($this->connectDB, $querySql);
        echo $result;
        if (!$result) {
            die('failed' . mysqli_connect_error());
        }
    }

    public function getNotes(): ?array {
        $querySql = "SELECT Notes.id, Notes.header, Notes.body, Users.login, CONCAT(Users.firstName, ' ', Users.surname) as userName
        FROM $this->tableNameNotes 
        LEFT JOIN Users ON Notes.owner_id = Users.id";
        $result = mysqli_query($this->connectDB, $querySql);
        if (!$result) {
            die('failed' . mysqli_connect_error());
        }        $dataArray = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($dataArray, $row);
        }
        return $dataArray;
    }

}