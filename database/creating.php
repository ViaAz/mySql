<?php

interface DBInfo
{
    const host = 'localhost';
    const user_name = 'root';
    const user_password = '';
    const dataBaseName = 'Blog';
}

class DataBaseStart implements DBInfo
{
    protected $connectDB;

    protected function __construct()
    {
        //create connection and create table if it doesn't exist yet
        $this->connectDB = mysqli_connect($this::host, $this::user_name, $this::user_password);
        $this->connectDB = mysqli_connect($this::host, $this::user_name, $this::user_password);
        $this->connectDB->query("CREATE DATABASE IF NOT EXISTS " . $this::dataBaseName . ";");
        $this->connectDB->select_db($this::dataBaseName);
        $this->getErrors();
    }

    protected function createUsersTable()
    {
        $querySQL = "CREATE TABLE IF NOT EXISTS Users (
        id int(11) NOT NULL UNIQUE AUTO_INCREMENT,
        firstName varchar(20) NOT NULL,
        surname varchar(20) NOT NULL,
        birthday date NOT NULL,
        login varchar(35) NOT NULL,
        email varchar(35) NOT NULL,
        password varchar(200) NOT NULL,
        PRIMARY KEY (id)
        );";
        $this->connectDB->query($querySQL);
        $this->getErrors();
    }

    protected function createImagesTable()
    {
        $querySQL = "CREATE TABLE IF NOT EXISTS Images (
        id int(11) NOT NULL UNIQUE AUTO_INCREMENT,
        img BLOB NOT NULL,
        alt varchar(100),
        PRIMARY KEY (id)
        );";
        $this->connectDB->query($querySQL);
        $this->getErrors();
    }

    protected function createNotesTable()
    {
        $querySQL = "CREATE TABLE IF NOT EXISTS Notes (
        id int(11) NOT NULL UNIQUE AUTO_INCREMENT,
        header varchar(100),
        body varchar(700),
        created date NOT NULL,
        owner_id int(11) NOT NULL,
        img_id int(11),
        PRIMARY KEY (id),
        FOREIGN KEY (owner_id) REFERENCES Users(id),
        FOREIGN KEY (img_id) REFERENCES Images(id)
        );";
        $this->connectDB->query($querySQL);
        $this->getErrors();
    }

    protected function getErrors()
    {
        if (!$this->connectDB) {
            die('failed' . mysqli_connect_error());
        }
    }

}