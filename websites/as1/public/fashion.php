<?php
    require 'dbcon.php';
    require 'header.php';
    require 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<main>
<body>
<?php
      $stmt = $pdo->prepare("SELECT * FROM auction WHERE category='fashion'");
      $stmt->execute();
  
      while($chabi = $stmt->fetch()) {
          echo '<img src="product.png" alt="product name">';
          echo '<article>';
          echo'<h2>'.'Product ID: '.$chabi['id'].'</h2>';
          echo '<h2>Product name: '.$chabi['title'].'</h2>';
          echo '<h3>Product category: '.$chabi['category'].'</h3>';
          echo '<p>Product description: '.$chabi['description'].'</p>';
          echo '<p>Product end date: '.$chabi['enddate'].'</p>';
          echo '</article>';
      }
?>
</body>
</main>
</html>
<?php
    require 'footer.php';
?>