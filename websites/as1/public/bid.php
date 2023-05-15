<?php
ob_start();
    require 'dbcon.php';

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare("INSERT INTO bid (id, bidamount) VALUES (:id, :bidamount)");
        $values=[
            'id' => $_POST['id'],
            'bidamount' => $_POST['bidamount'],
        ];
        $stmt->execute($values);
        
        if($stmt){
            header('Location: bid.php');
            exit();
        }
    }
    // Display the inserted data in the database
    $stmt = $pdo->query("SELECT * FROM bid");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($rows) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Bid Amount</th></tr>";
        foreach($rows as $row) {
            echo "<tr><td>".$row['id']."</td><td>".$row['bidamount']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
    ob_end_flush();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid form</title>
    <link rel="stylesheet" href="ibuy.css" />
</head>
<body>
    <main>
        <!-- Bid Form -->
        <form action="bid.php" method="post">
            <label>Product ID</label>
            <input type="text" name="id" placeholder="ID">
            <br>
            <label>Bid amount</label>
            <input type="text" name="bidamount" placeholder="Bid on the auction item with above product id">
            <br>
            <input type="submit" name="submit" value="Submit Bid" />
            <br>
            <br>
            <br>
        </form>
        <a href="index.php">Index page</a>
    </main>
</body>
</html>

