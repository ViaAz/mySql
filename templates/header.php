<?php
session_start();
require './handler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
          integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
<header class="header">
    <nav class="d-flex justify-content-between align-items-center">
        <a href="index.php">PHP WAY</a>
        <div >
            <?php if(!isset($_SESSION['user_info'])): ?>
                <a href="?login">
                    <button class="btn btn-primary" name="login_act">log in</button>
                </a>
            <?php else: ?>
                <a href="blog.php" class="font-weight-bold">Blog</a>

                <span class="ml-5 mr-2"><?php echo 'Hello, '.$_SESSION['user_info']['login'];?></span>
                <a href="?logout">
                    <button class="btn btn-primary" name="logout_act">log out</button>
                </a>
            <?php endif;?>
        </div>

    </nav>
</header>
<main>
    <div class="container">
        <div class="row mb-5">
            <div class="col mt-5 mb-5">