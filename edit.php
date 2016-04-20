<?php
$pageTitle = "Промени";
include 'includes/header.php';
include 'includes/connect.php';

if (isset($_GET['update'])) {

    $update = $_GET['update'];

    $query = mysqli_query($connection, "SELECT * FROM medicaments WHERE id ='$update'");

    while ($res = mysqli_fetch_array($query)) {

        $id = $res[0];
    }
}
if (isset($_POST['submit'])) {

    $newDateProduce = $_POST['newDateProduce'];

    $newDateExpiri = $_POST['newDateExpiri'];

    $id = $_POST['id'];

    $sql = mysqli_query($connection, "UPDATE medicaments SET date_produce = '$newDateProduce', date_expiri ='$newDateExpiri'");

    if ($sql) {
        echo "<p class='center'>Промените са направени успешно.</p>";
    } else {
        echo "<p class='center'>Промените не са направени успешно.</p>";
    }
}
?>
<a href="main_page.php" class="btn btn-primary">Назад</a>
<a href="includes/logout.php" class="btn btn-primary">Изход</a>

<h3>Промени</h3>
<div class="container">
    <form action="edit.php" method="post" id="main_form">
        <label for="date_expiri">Дата на производство:</label>
        <div class="input-group">
            <input type="text" name="newDateProduce" class="form-control" placeholder="DD/MM/YYYY"
                   style="text-align:center"
                   id="fromDate" size="20">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
        <label for="date_produce">Срок на годност:</label>
        <div class="input-group">
            <input type="text" name="newDateExpiri" class="form-control" placeholder="DD/MM/YYYY"
                   style="text-align:center"
                   id="fromDate" size="20">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
        <input type="hidden" name="id" value="<?php echo $update; ?>">
        <input type="submit" name="submit" value="Промени" class="btn btn-primary">
    </form>
</div>
<?php
include "includes/footer.php";
?>
