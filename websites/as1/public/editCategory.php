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
    <title>Category</title>
    <link rel="stylesheet" href="ibuy.css" />
</head>
<body>
<main>

<h2>Edit Category</h2>
<br>
<br>
        
        <form action="editCategory.php" method="post">
            
            
            <label>ID:</label>
          
            <input type="text" name="id" placeholder="ID">
            
            
            <br>

        
            
        <label>Title</label>

            <input type="title" name="title" placeholder="title">
            
            <br>
<!-- <button type="submit">Login</button> -->
<input type="submit" name="submit" value="Submit" />

</form>

<a href="delCategory.php">del Category?</a></main>
<br>
<a href="addCategory.php" class="ca">Add Category?</a>
<br>
<a href="index.php" class="ca">click here to go to index page</a>;
<?php
if (isset($_POST['submit'])) {
    $stmt = $pdo->prepare('UPDATE category SET title = :title WHERE id = :id');

    $values = [
        'title' => $_POST['title'],
        'id' => intval($_POST['id'])
    ];

    $stmt->execute($values);
    echo '<p>Category edited!!</p>';
   
} else if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM category WHERE id = :id');

    $values = [
        'id' => intval($_GET['id'])
    ];

    $stmt->execute($values);

    $key = $stmt->fetch();
}
?>
</body>
</html>
<?php
    require 'footer.php';
?>