<?php
ob_start(); // start output buffering

session_start();
// $username = 'student';
// $password = 'student';
// $dbname = 'assignment1';
// $server = 'mysql';
// $pdo = new PDO('mysql:dbname=' . $dbname . ';host=' . $server, $username, $password);

// if (!$pdo) {
//     die('Could not connect to the database!');
// }
    require 'dbcon.php';
    require 'header.php';
if (isset($_POST['submit'])) {
    $stmt = $pdo->prepare("SELECT * FROM register WHERE username = :username AND email = :email AND password = :password");
    $names = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ];
    $stmt->execute($names);

    foreach ($stmt as $data) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];
        if ($_SESSION['username'] == $data['username'] && $_SESSION['email'] == $data['email'] && $_SESSION['password'] == $data['password']) {
            header('Location: index.php');
            exit(); // make sure to exit after the header to prevent further code execution
        }
    }
}

ob_end_flush(); // flush the output buffer and send any output to the browser
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="ibuy.css" />
</head>
<body>
    <main>
        <form action="login.php" method="post">
            <label>User Name:</label>
            <input type="text" name="username" placeholder="UserName">
            <br>
            <label>Email Address:</label>
            <input type="email" name="email" placeholder="Email">
            <br>
            <label>Password:</label>
            <input type="password" name="password" placeholder="Password">
            <br>
            <input type="submit" name="submit" value="Submit" />
        </form>
        <a href="register.php">Create an account</a>
        <br>
        <br>
        <a href="admin.php">Login as admin</a>
    </main>
</body>
</html>
