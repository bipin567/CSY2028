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
<main>

<h2>Add Category</h2>
<br>
<br>
        
        <form action="addCategory.php" method="post">
            
            
            <label>ID:</label>
          
            <input type="text" name="id" placeholder="ID">
            
            
            <br>

        
            
        <label>Title</label>

            <input type="title" name="title" placeholder="title">
            
            <br>
<!-- <button type="submit">Login</button> -->
<input type="submit" name="submit" value="Submit" />
</main>
</form>

<a href="editCategory.php" class="ca">Edit Category?</a>
<br>
<a href="delCategory.php" class="ca">Delete Category?</a>
<br>
<a href="index.php" class="ca">click here to go to index page</a>;
<?php
if (isset($_POST['submit'])) {
$stmt=$pdo->prepare('insert into category(id,title)
values(:id,:title)
');
$values=[
   'id'=>$_POST['id'],
   'title'=>$_POST['title'],
      
];
$stmt->execute($values);


    if($stmt){
       
        echo "category added";
    }
    
}
?>
</body>
</html>
<?php
    require 'footer.php';
?>