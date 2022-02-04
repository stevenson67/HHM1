<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'hhm');

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE) or die('Ошибка ' . mysqli_error($mysqli));
$sql = "SELECT id, name, email, comment FROM comments";
$result = $mysqli->query($sql);

$resultArray = array();

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $resultArray[] = $row;
    }

}

$mysqli->close();

echo json_encode($resultArray);