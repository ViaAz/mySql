<?php
//require './handler.php';
require './dataBase/creating.php';
$test = new DataBaseStart();
//global $dataBaseInfo, $db;
//unset($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
          integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
</head>
<body>
<header>

</header>
<main>
    <div class="container">
        <div class="row mb-5">
            <div class="col mt-5 mb-5">
                <form method="post">
                    <div class="mb-3">
                        <label for="loginInput" class="form-label">Login</label>
                        <input type="text" name="login" class="form-control" id=loginInput" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="emailInput" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwordInput1" class="form-label">Password</label>
                        <input type="password" name="password1" class="form-control" id="passwordInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwordInput2" class="form-label">Password confirm</label>
                        <input type="password" name="password2" class="form-control" id="passwordInput2" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
            <div class="col-12 mb-5">
                <form action="" method="post">
                    <button type="submit" name="getDB">show Data Base</button>
                    <div id="dateBaseList">
                        <?php
                         print_r($dataBaseInfo);
                        ?>
                    </div>
                </form>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <form method="post">
                    <div class="mb-3">
                        <label for="userId" class="form-label">Login</label>
                        <select name="user_id" id="userId">
                            <?php foreach($db->selectByColumnName('Login') as $item): ?>
                                <option value="<?=$item['user_id']?>"><?=$item['Login']?></option>
                            <?php endforeach;?>
                        </select>
                        <button class="btn btn-primary" type="submit" name="deleteUser">delete user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
        crossorigin="anonymous"></script>
</body>
</html>