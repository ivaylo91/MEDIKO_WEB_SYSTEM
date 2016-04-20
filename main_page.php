<?php
$pageTitle = "Добре дошли";
include 'includes/header.php';
include 'includes/connect.php';
$run = mysqli_query($connection, "SELECT * FROM medicaments");
$current_date = date(".d/m/Y.");
echo "<p class='right'>Днес е:$current_date</p>";

?>
    <a href="includes/logout.php" class="btn btn-primary">Изход</a>
    <a href="add_form.php" class="btn btn-primary">Добавяне на Аптечки</a>
    <form action="search.php" class="input-group" id="search_form" method="post">
        <input type="text" name="value" value="" autocomplete="off" class="form-control" id="search">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-search"></span>
        </div>
    </form>
    <div class="container row">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Номер</th>
                <th>Клиент</th>
                <th>Адрес</th>
                <th>Медикамент</th>
                <th>Дата на производство:</th>
                <th>Срок на годност:</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($run)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['client']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['medicament'] ?></td>
                    <td><?php echo $row['date_produce']; ?></td>
                    <td><?php echo $row['date_expiri']; ?></td>
                    <td><a href="edit.php?update =<?php echo $row['id']; ?>" class="btn btn-default">Промени</a></td>
                    <?php
                    if ($current_date == $row['date_expiri']) {
                        echo "<script>alert('Изтекъл срок на годност')</script>";
                        echo "<td class='red-notify'>Изтекъл</td>";
                    }
                    if ($current_date != $row['date_expiri']) {
                        echo "<td class='green-notify'>В срок</td>";
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
<?php
include 'includes/footer.php';
?>