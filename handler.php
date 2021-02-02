<?php
session_start();

require './database/connect.php';
$db = new DBMain();

//check user in database
if (isset($_POST['loginSubmit'])) {
    $userInfo = $db->login($_POST['login'], $_POST['password']);
    if (isset($userInfo)) {
        $_SESSION['user_info'] = $userInfo;
        $notes = $db->getNotes();
        $_SESSION['message'] = 'You are authorized';
        header('Location: blog.php');
        die();
    } else {
        $_SESSION['message'] = 'Login or password isn\'t correct';
    }
}

if (isset($_POST['registration'])) {
    $result = $db->addNewUser($_POST['firstNameInput'], $_POST['surnameInput'],
        $_POST['birthday'], $_POST['loginInput'], $_POST['emailInput'], $_POST['passwordInput']);
    if ($result){
        $_SESSION['reg_status'] = 'Registration was successful! Try to login';
        header('Location: login.php');
        die();
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    die();
}

if (isset($_GET['login'])) {
    header('Location: login.php');
    die();
}

//from link info
if (isset($_GET['registration'])) {
    $registration = true;
}

if (isset($_POST['create_note'])) {
    $db->createNotes($_POST['note_header'], $_POST['note_body']);
    header('Location: blog.php');
    die();
}