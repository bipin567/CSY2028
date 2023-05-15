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
    <title>Delete Auction</title>
    <link rel="stylesheet" href="ibuyy.css" />
</head>
<body>
<main>

<h2>Delete Auction</h2>
<br>
<br>
        
        <form action="delAuction.php" method="post">
            
            
            <label for="id">ID:</label>
          
            <input type="text" name="id" id="id" placeholder="ID">
            


        <input type="submit" name="submit" value="Submit" />
</form>
</main>
<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    // Check if the category exists
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM auction WHERE id = ?');
    $stmt->execute([$id]);
    $count = $stmt->fetchColumn();

    if ($count == 1) {
        // Delete the auction
        $stmt = $pdo->prepare('DELETE FROM auction WHERE id = ?');
        $stmt->execute([$id]);
        echo '<p>Auction deleted!</p>';
        echo '<br>';
    echo ' <a href="index.php" class="ca">Go to index page to view all auction,click here</a>';
    echo '<br>';
    echo ' <a href="editAuction.php" class="ca">EDit Auction?</a>';
    echo '<br>';
    echo ' <a href="addAuction.php" class="ca">Click here to add auction</a>';
    } else {
        echo '<p>Auction not found.</p>';
        echo '<br>';
        echo ' <a href="index.php" class="ca">Go to index page to view all auction,click here</a>';
        echo '<br>';
        echo ' <a href="editAuction.php" class="ca">Edit Auction?</a>';
        echo '<br>';
        echo ' <a href="addAuction.php" class="ca">Click here to add auction</a>';
    }
}
?>
</body>
</html>
<?php
    require 'footer.php';
?>
