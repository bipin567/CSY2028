<?php
    require 'dbcon.php';
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

<h2>Delete Category</h2>
<br>
<br>
        
        <form action="delCategory.php" method="post">
            
            
            <label>ID:</label>
          
            <input type="text" name="id" placeholder="ID">
            
            
            <br>

        
            
        <label>Title</label>

            <input type="title" name="title" placeholder="title">
            
            <br>
<!-- <button type="submit">Login</button> -->
<input type="submit" name="submit" value="Delete" />
</form>
<a href="editCategory.php" class="ca">Edit Category?</a>
<br>
<a href="addCategory.php" class="ca">Add Category?</a>
<br>
<a href="index.php" class="ca">click here to go to index page</a>;
<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    // Check if the category exists
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM category WHERE id = ?');
    $stmt->execute([$id]);
    $count = $stmt->fetchColumn();

    if ($count == 1) {
        // Delete the category
        $stmt = $pdo->prepare('DELETE FROM category WHERE id = ?');
        $stmt->execute([$id]);
        echo '<p>Category deleted!!</p>';
    } else {
        echo '<p>Category not found.</p>';
    }
}
?>

</body>
</html>
<?php
    require 'footer.php';
?>