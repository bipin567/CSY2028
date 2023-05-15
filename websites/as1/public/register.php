<?php
 require 'dbcon.php';
 require 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="ibuyy.css" />
</head>

<body>
    <main>
        <form action="register.php" method="post">
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
        <?php
        if (isset($_POST['submit'])) {
            $stmt=$pdo->prepare('insert into register(username,email,password)
            values(:username,:email,:password)');
            $values=[
                'username'=>$_POST['username'],
                'email'=>$_POST['email'],
                'password'=>$_POST['password'],
            ];
            $stmt->execute($values);
            if($stmt){
                echo "inserted ";
                echo ' <a href="login.php" class="ca">Already have an account?</a>';
            }
        }
        ?>
    </main>
</body>

</html>
<?php
    require 'footer.php';
?>
