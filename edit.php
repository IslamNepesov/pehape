<?php

require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $db)
or die ("Ошибка подключения к базе данных" . mysqli_error());

$id = (int)$_GET['id'];
$name = $_GET['name'];
$position = $_GET['position'];

echo "<form method='GET' action='edit.php'>
<input type='hidden' name='id' value='$id'>
<table border='1'>
<tr>
<th>name</th>
<th>position</th>
</tr>
<tr>
<td><input type='text' name='name' value='$name'></td>
<td><input type='text' name='position' value='$position'></td>
</tr>
</table>
<p><input type='submit' name='enter' value='submit changes'></p>
</form>";


if (isset($_GET['enter'])) {
    $update="UPDATE employee
    SET name='$name', position='$position'
    WHERE employee_id=$id";
    $result = mysqli_query($link, $update);
}

echo "<p><a href='list.php?'>back to list.php</a></p>"

?>
