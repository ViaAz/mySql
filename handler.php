<?php
session_start();

require './dataBase/connect.php';
$db = new Users();

//check user in database
if (isset($_POST['loginSubmit'])) {
    $userInfo = $db->login($_POST['login'], $_POST['password']);
    if (isset($userInfo)) {
        $_SESSION['user_info'] = $userInfo;
        $_SESSION['message'] = 'You are authorized';
    } else {
        echo 'I am sorry';
    }
}

if (isset($_POST['registration'])) {
    $result = $db->addNewUser($_POST['firstNameInput'], $_POST['surnameInput'],
        $_POST['birthday'], $_POST['loginInput'], $_POST['emailInput'], $_POST['passwordInput']);
    var_dump($result);
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}

if (isset($_GET['login'])) {
    header('Location: login.php');
}

//registration new user
if (isset($_POST['submit'])) {
    $db->addNewUser($_POST['login'], $_POST['email'], $_POST['password1']);
}

if (isset($_POST['deleteUser'])) {
    $deleteUserId = $_POST['user_id'];
    $db->deleteById($deleteUserId);
}

//from link info
if (isset($_GET['registration'])) {
    $registration = true;
}
