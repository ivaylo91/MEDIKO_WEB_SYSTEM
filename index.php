<?php
$pageTitle = "Вход";
session_start();
include 'includes/header.php';
include 'includes/connect.php';


if (isset($_POST['login_btn'])) {

    $username = mysqli_real_escape_string($connection, trim($_POST['username']));
    $password = mysqli_real_escape_string($connection, trim($_POST['password']));

    $encrypt = md5($password);

    $query = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password'";

    $run = mysqli_query($connection, $query);

    if (mysqli_num_rows($run) > 0) {

        $_SESSION['username'] = $username;


        echo '<script>window.open("main_page.php","_self")</script>';

    } else {
        echo '<script>alert("Username or password are incorrect")</script>';
        echo '<script>window.open("index.php","_self")</script>';
    }
}
?>
    <div class="container">
        <h3>Потребителски вход</h3>
        <form method="post" id="main_form">
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
            <input type="submit" name="login_btn" value="Вход" class="btn btn-primary">
            <a href="register.php" class="btn btn-primary" id="register">Регистрация</a>
        </form>
    </div>
<?php
include 'includes/footer.php';
?>