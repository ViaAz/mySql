<?php
require './dataBase/connect.php';
$db = new DataBase();
if (isset($_POST['submit'])) {
    $db->addNewUser($_POST['login'], $_POST['email'], $_POST['password1']);
}

if (isset($_POST['deleteUser'])) {
    $deleteUserId = $_POST['user_id'];
    $db->deleteById($deleteUserId);
}

if(isset($_POST['getDB'])) {
    $dataBaseInfo = $db->getFullDB();
}


