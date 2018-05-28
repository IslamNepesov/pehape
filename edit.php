<?php

require_once 'connect.php';

$link = mysqli_connect($host, $user, $password, $db)
or die ("An error occured: " . mysqli_error($link));

$query = "SELECT number FROM flight";
$result = mysqli_query($link, $query)

?>

<html>
<body>
<form method='GET' action='update.php'>
<input type='hidden' name='id' value='<?=@$_GET['id']?>'>
<table border='1'>
<tr>
    <th>name</th>
    <th>position</th>
    <th>flight</th>
</tr>
<tr>
    <td><input type='text' name='name' value='<?=@$_GET['name']?>'></td>
    <td><input type='text' name='position' value='<?=@$_GET['position']?>'></td>
    <td><select name='flight'>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
                if ($row['number'] == $_GET['flight'])
                    echo "<option selected value='" . $row['number'] . "'>" . $row['number'] . "</option>";
                else
                    echo "<option value='" . $row['number'] . "'>" . $row['number'] . "</option>";
            }
            ?>
        </select></td>
</tr>
</table>
<p><input type='submit' name='enter' value='submit changes'></p>
</form>
</body>
</html>