<?php

require_once 'connect.php';

$link = mysqli_connect($host, $user, $password, $db);

$id = (int)$_GET['id'];
$name = $_GET['name'];
$position = $_GET['position'];
$flight = $_GET['flight'];

$update1="UPDATE employee
    SET name='$name', position='$position'
    WHERE employee_id=$id";
$result1 = mysqli_query($link, $update1);

$update2="UPDATE crew
    SET flight='$flight'
    WHERE employee=$id";
$result2 = mysqli_query($link, $update2);

?>

<html>
<body>
<script type='text/javascript'>
    window.location = 'list.php'
</script>
</body>
</html>
