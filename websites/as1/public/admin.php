<?php
ob_start();
    session_start();
    require 'dbcon.php';
    require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="ibuy.css" />
    

</head>

<body>
<main>
    <form action="admin.php" method="post">
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
</main>

<?php
if (isset($_POST['submit'])) {
    // Retrieve admin's data from the database
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username= :username AND email= :email AND password= :password");
    $params = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ];
    $stmt->execute($params);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        // If admin's data is found, set session variable
        $_SESSION['admin'] = $admin['username'];

        // Redirect to the next page
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}
ob_end_flush();
?>

<?php
    require 'footer.php';
?>
