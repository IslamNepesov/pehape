<?php
require_once 'connect.php';

$link = mysqli_connect($host, $user, $password, $db)
or die ("An error occured: " . mysqli_error($link));

echo "Connection established.<br/>";

$sql = "SELECT employee_id, name, position FROM employee";

if (mysqli_query($link, $sql)) {
    echo "Query OK<br/>";
} else {
    echo "An error occured: " . mysqli_error($link);
}

$result = mysqli_query($link, $sql);

echo "<table border='1'>
<tr>
<th>id</th>
<th>name</th>
<th>position</th>
<th>edition</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    $id = $row['employee_id'];
    $name = $row['name'];
    $position = $row['position'];
    echo "<tr>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $name . "</td>";
    echo "<td>" . $position . "</td>";
    echo "<td><a href='edit.php?id=$id&name=$name&position=$position'>edit</a><br></td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($link);

?>
