<?php
$pageTitle = "Добави";
include 'includes/header.php';
include 'includes/connect.php';

if (isset($_POST['add_btn'])) {

    $client = mysqli_real_escape_string($connection, trim($_POST['client']));
    $medicaments = $_POST['medicaments'];
    $address = mysqli_real_escape_string($connection, trim($_POST['address']));
    $date_produce = mysqli_real_escape_string($connection, trim($_POST['date_produce']));
    $date_expri = mysqli_real_escape_string($connection, trim($_POST['date_expiri']));
    $keywords = mysqli_real_escape_string($connection, trim($_POST['keywords']));

    if ($number = '' || $client == '' || $medicaments == '' || $address == '' || $date_produce == '' || $date_expri == ' '
        || $keywords == ''
    ) {

        echo '<p class="center">Някое от полетата е празно и записът не може да бъде осъществен.</p>';

        exit();
    }

    $insert_query = mysqli_query($connection, "INSERT INTO medicaments(client, address, medicament, date_produce, date_expiri, keywords) VALUES ('.$client.','.$address.','.$medicaments.','.$date_produce.','.$date_expri.','.$keywords.')");

    if ($insert_query) {

        echo "<p class='center'>Записът е направен успешно.</p>";
    } else {
        echo "<p class='center'>Записът е неуспешен.</p>";
    }
}
?>
<div class="container">
    <a href="main_page.php" class="btn btn-primary">Назад</a>
    <form action="add_form.php" method="post" id="add_form">
        <label for="client">Клиент:</label>
        <input type="text" name="client" class="form-control">
        <label for="address">Адрес:</label>
        <input type="text" name="address" class="form-control">
        <label for="medicament">Медикамент:</label>
        <select name="medicaments" id="medicaments" class="form-control">
            <option>Аспирин</option>
            <option>Бинт</option>
            <option>Алертозан</option>
            <option>Аналгин</option>
        </select>
        <label for="date_produce" class="control-label">Дата производство:</label>
        <div class="input-group">
            <input type="text" name="date_produce" class="form-control" placeholder="DD/MM/YYYY"
                   style="text-align:center"
                   id="fromDate" size="20">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
        <label for="date_expiri">Срок на годност:</label>
        <div class="input-group">
            <input type="text" name="date_expiri" class="form-control" style="text-align:center"
                   id="fromDate" size="20" placeholder="DD/MM/YYYY">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
        <label for="keywords">Ключови думи за търсене</label>
        <input type="text" name="keywords" id="keywords" class="form-control">

        <input type="submit" name="add_btn" value="Добави" class="btn btn-primary">
    </form>
</div>
<?php
include "includes/footer.php";
?>
