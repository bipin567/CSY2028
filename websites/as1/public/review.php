<?php
ob_start();
    require 'dbcon.php';
    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare("INSERT INTO review (id, review) VALUES (:id, :review)");
        $values=[
            'id' => $_POST['id'],
            'review' => $_POST['review'],
        ];
        $stmt->execute($values);
        
        if($stmt){
            header('Location: review.php');
            exit();
        }
    }

    // Display the inserted data in the database
    $stmt = $pdo->query("SELECT * FROM review");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($rows) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>review</th></tr>";
        foreach($rows as $row) {
            echo "<tr><td>".$row['id']."</td><td>".$row['review']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No reviews found.";
    }
    ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ibuy.css" />
</head>
<body>
    <main>
        
        <!-- Review Form -->
        <form action="review.php" method="post">
            <label>Product ID</label>
            <input type="text" name="id" placeholder="ID">
            <br>
            <label>Review of auction items</label>
            <textarea name="review" placeholder="Write review of the auction item with above product id"></textarea>
            <br>
            <input type="submit" name="submit" value="Submit Review" />
            <br>
            <br>
            <br>
        </form>
        <a href="index.php">Index page</a>
    </main>
</body>
</html>
