<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
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
    <div class="container-md">
        <div class="row">
            <div class="col mt-5">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="loginInput" class="form-label">Login</label>
                        <input type="text" name="login" class="form-control" id=loginInput">
                    </div>
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="emailInput"
                               aria-describedby="emailHelp" >
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="passwordInput1" class="form-label">Password</label>
                        <input type="password" name="password1" class="form-control" id="passwordInput1">
                    </div>
<!--                    <div class="mb-3">-->
<!--                        <label for="passwordInput2" class="form-label">Password confirm</label>-->
<!--                        <input type="password" name="password2" class="form-control" id="passwordInput2">-->
<!--                    </div>-->
<!--                    <div class="mb-3 form-check">-->
<!--                        <input type="checkbox" class="form-check-input" id="IAgree">-->
<!--                        <label class="form-check-label" for="IAgree">I agree</label>-->
<!--                    </div>-->
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
require './dataBase/connect.php';
$test = new DataBase();
$test->addNewUser('basik', 'basik@test.com', 'test1233');
print_r($test->getFullDB());
?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
        crossorigin="anonymous"></script>
</body>
</html>