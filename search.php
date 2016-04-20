<?php
$pageTitle = "Търсене";
include 'includes/header.php';
include 'includes/connect.php';

echo "<a href='includes/logout.php' class='btn btn-primary'>Изход</a>";
echo "<a href='main_page.php' class='btn btn-primary' id='left'>Назад</a>";

echo "<p class='center'>Резултати от търсенето </p>";
$current_date = date(".d/m/Y.");
echo "<p class='right'>Днес е:$current_date</p>";

if (isset($_POST['value'])) {

    $searchq = mysqli_real_escape_string($connection, $_POST['value']);
    $query = mysqli_query($connection, "SELECT * FROM medicaments WHERE keywords LIKE '%$searchq%'");

    $count = mysqli_num_rows($query);

    if ($count == 0) {
        echo "<p class='center'>Няма намерени резултати.</p>";
    } else {
        echo "<table class='table table-condensed'>";
        echo "<thead>
            <th>Номер</th>
            <th>Клиент</th>
            <th>Адрес</th>
            <th>Медикамент</th>
            <th>Дата на производство</th>
            <th>Срок на годност</th>
            <th>Действия</th>
        </thead>";
        while ($row = mysqli_fetch_array($query)) {

            $id = $row['id'];
            $client = $row['client'];
            $address = $row['address'];
            $medicament = $row['medicament'];
            $date_produce = $row['date_produce'];
            $date_expiri = $row['date_expiri'];

            echo $output ="
                  <tr>
                     <td>$id</td>
                     <td>$client</td> 
                     <td>$address</td>
                     <td>$medicament</td>
                     <td>$date_produce</td>
                     <td>$date_expiri</td>
                     <td><a href='edit.php?edit=$id' class='btn btn-default'>Промени</a></td>
                  </tr>";
        }
    }
}
?>
<?php
include "includes/footer.php"
?>
