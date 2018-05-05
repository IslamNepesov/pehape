<?php
require_once 'connect.php';
 
$link = mysqli_connect($host, $user, $password, $db)
or die ("Ошибка подключения к базе данных" . mysqli_error());

$name = strtr($_GET['name'], '*', '%');
$education = strtr($_GET['education'], '*', '%');

echo "<form method='GET' action='search.php'>
<p>Введите фамилию сторудника: <input type='text' name='name' value='$name'></p>
<p>Введите образование сотрудника: <input type='text' name='education' value='$education'></p>
<p><input type='submit' name='enter' value='Поиск'></p>
</form>";

if (isset($_GET['enter'])) {
    $sql="SELECT name, education
    FROM employee
    WHERE name LIKE '%$name%' AND education LIKE '%$education%'";

    $result = mysqli_query($link, $sql);
    echo "<table border='1'>
    <tr> 
    <th>name</th>
    <th>education</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['education'] . "</td>";
        echo "</tr>";
    }
echo "</table>";
}

mysqli_close($link);
?>
