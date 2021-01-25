<?php
require './dataBase/connect.php';
$test = new DataBase();
echo count($test->selectByColumnName('Login'))?>
<script>

</script>
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
        <div class="row mb-5">
            <div class="col mt-5">
                <form action="login.php" method="post" onsubmit="AddNewUser()">
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
                <button type="button" onclick="getInfo()">get DateBase</button>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <form action="login.php" method="post" onsubmit="DeleteUser()">
                    <div class="mb-3">
                        <label for="userId" class="form-label">Login</label>
                        <select name="user_id" id="userId">
                            <?php foreach($test->selectByColumnName('Login') as $item): ?>
                                <option value="<?=$item['user_id']?>"><?=$item['Login']?></option>
                            <?php endforeach;?>
                        </select>
                        <button type="button" name="deleteUser" onclick="DeleteUser">delete user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<div id="test1"></div>
<script>

    function AddNewUser() {
        <?php $test->addNewUser($_POST['login'], $_POST['email'], $_POST['password1']);?>
    }

    function DeleteUser(){
        <?php
        if(isset($_POST['user_id'])) {
            $deleteUserId = $_POST['user_id'];
            echo $deleteUserId;
            $test->deleteById($deleteUserId);
        }
        ?>
    }
    function getInfo(){
        document.getElementById('test1').innerHTML = `<?php print_r($test->getFullDB());?>`;
    }
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
        crossorigin="anonymous"></script>

</body>
</html>