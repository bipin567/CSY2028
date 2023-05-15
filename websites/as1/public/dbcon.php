<?php
$username = 'student';
$password = 'student';
$dbname = 'assignment1';
$server = 'mysql';
$pdo = new PDO('mysql:dbname='.$dbname.';host='.$server, $username, $password);

if ($pdo) {
    echo "Connected to database successfully";
}
?>