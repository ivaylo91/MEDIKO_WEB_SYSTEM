<?php
$pageTitle = "Регистрация";
include 'includes/header.php';
include 'includes/connect.php';

if ($_POST) {

    $_SESSION['is_register'] = false;

    //Escaping user data from form;

    $username = mysqli_real_escape_string($connection, trim($_POST['username']));

    $password = mysqli_real_escape_string($connection, trim($_POST['password']));

    if (mb_strlen($username) < 5 || mb_strlen($username) > 50) {
        echo "Невалидана дължина на потребителско име.";
    }
    if (mb_strlen($password) < 5 || mb_strlen($password) > 50) {
        echo "Невалидна дължина на паролата.";
    }

    $stmt = mysqli_prepare($connection, 'INSERT INTO users(username,password) VALUES (?,?)');

    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);

    mysqli_stmt_execute($stmt);

    if ($stmt) {

        $_SESSION['is_register'] = true;

        header("Location:index.php");
    }
}
?>
<div class="container">
    <h3>Регистрационна форма </h3>
    <form action="register.php" method="post" id="main_form">
        <label for="username">Потребителско име:</label>
        <div class="input-group">
            <input type="text" name="username" class="form-control">
            <span class="input-group-addon">
				  <i class="glyphicon glyphicon-user"></i>
            </span>
        </div>
        <p>Моля въведете потребителско име</p>
        <label for="password">Парола:</label>
        <div class="input-group">
            <input type="password" name="password" class="form-control">
                <span class="input-group-addon">
				  <i class="glyphicon glyphicon-lock"></i>
				</span>
        </div>
        <p>Моля въведете парола</p>
        <input type="submit" value="Регистрация" class="btn btn-primary">
    </form>
</div>
<?php
include 'includes/footer.php';
?>
