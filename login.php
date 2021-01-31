<?php
session_start();
//if (!empty($_SESSION['user_id'])) header('Location: index.php');
?>

<?php require_once './templates/header.php' ?>

<form method="post" class="form login">
    <fieldset>
        <?php if (!isset($registration)): ?>
            <legend>Log in</legend>
            <div class="mb-3">
                <label for="loginInput" class="form-label">User name / E-mail</label>
                <input type="text" name="login" class="form-control" id=login" required>
            </div>
            <div class="mb-3">
                <label for="passwordInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="passwordInput1" required>
            </div>
            <button type="submit" class="btn btn-primary" name="loginSubmit">Log in</button>
            <a href="?registration=true">registration</a>
        <?php else: ?>
            <legend>Registration</legend>
            <div class="mb-3">
                <label for="loginInput" class="form-label">First name:</label>
                <input type="text" name="firstNameInput" class="form-control" id=firstNameInput" required>
            </div>
            <div class="mb-3">
                <label for="loginInput" class="form-label">Surname:</label>
                <input type="text" name="surnameInput" class="form-control" id=surnameInput" required>
            </div>
            <div class="mb-3">
                <label for="loginInput" class="form-label">login:</label>
                <input type="text" name="loginInput" class="form-control" id=loginInput" required>
            </div>
            <div class="mb-3">
                <label for="loginInput" class="form-label">Email:</label>
                <input type="email" name="emailInput" class="form-control" id=emailInput" required>
            </div>
            <div class="mb-3">
                <label for="passwordInput1" class="form-label">Password:</label>
                <input type="password" name="passwordInput" class="form-control" id="passwordInput1" required>
            </div>
            <div class="mb-3">
                <label for="loginInput" class="form-label">Sex:</label>
                <select name="sex" id="" class="form-control">
                    <option value="f">female</option>
                    <option value="m">male</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="loginInput" class="form-label">Birthdays:</label>
                <input type="date" class="form-control" name="birthdays">
            </div>
            <button type="submit" class="btn btn-primary" name="registration">Registration</button>
        <?php endif; ?>
    </fieldset>

</form>
<?php require_once './templates/footer.php' ?>
