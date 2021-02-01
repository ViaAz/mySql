<?php

require 'creating.php';

class Users extends DataBaseStart
{
    protected string $tableName;

    function __construct(string $tableName = 'Users')
    {
        $this->tableName = $tableName;
        parent::__construct();
        parent::createUsersTable();
        parent::createImagesTable();
        parent::createNotesTable();
    }

    public function getFullDB(): array
    {
        $querySql = "SELECT * from $this->tableName;";
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

    public function login($login, $password): ?array
    {
        $result = $this->getFullDB();
        $currentUser = null;
        foreach ($result as $item) {
            if ($item['login'] === $login && $item['password'] === $password) {
                $currentUser = $item;
            }
        }
        return $currentUser;
    }

    public function addNewUser($firstName, $surname, $birthday, $login, $email, $password)
    {
        $querySql = "INSERT INTO $this->tableName (firstName, surname, birthday, login, email, password) 
             VALUES ('$firstName', '$surname', DATE('$birthday'), '$login', '$email', '$password');";
        $result = mysqli_query($this->connectDB, $querySql);
        if (!$result) {
            die('failed' . mysqli_connect_error());
        }
    }

    public function selectByColumnName($column_name): array
    {
        $querySql = "SELECT $column_name, user_id FROM $this->tableName";
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
}