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
    <title>Document</title>
    <link rel="stylesheet" href="ibuyy.css" />
</head>
<body>
<main>

<h2>Edit Auction</h2>
<br>
<br>
        
        <form action="editAuction.php" method="post">
            
            
            <label>ID:</label>
          
            <input type="text" name="id" placeholder="Enter product ID to change">
            
            
            <br>

        
            
        <label>Title</label>

            <input type="title" name="title" placeholder="title">
            
            <br>


        
        <label>Description</label>
        
        <textarea name="description" placeholder="description"></textarea>
    <br>



       
        <label for ="category">Categories</label>
        
        <select id="category"name="category">
    <option value ="home&garden"> Home and Garden</option>
    <option value ="Electronics"> Electronics</option>
    <option value ="fashion"> Fashion</option>
    <option value ="Sport"> Sport</option>
    <option value ="Health"> Health</option>
    <option value ="Toys"> Toys</option>
    <option value ="Motors"> Motors</option>
    <option value ="More"> More</option>
</select>
            <br>

            <br>
<label>Auction End date</label>
<input type ="date" name="enddate" >

        <!-- <label for = "checkbox">Do you agree to the terms and conditions?</label>
        <input type = "checkbox" name="myCheckbox" value="ticked" /> -->
        <!-- <input type ="submit" value ="Sign Up" name="submit" /> -->
        <input type="submit" name="submit" value="Submit" />
        <!-- <a href="login.php" class="ca">Already have an account?</a> -->
  <!-- <button type="submit" class="register-button">submit</button> -->
</form>
 <a href="index.php" class="ca">Go to index page to view all auction,click here</a>;

</main>
<?php
if (isset($_POST['submit'])) {
    $stmt = $pdo->prepare('UPDATE auction SET title = :title, description = :description, enddate = :enddate, category = :category WHERE id = :id');

    $values = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'enddate' => $_POST['enddate'],
        'category' => $_POST['category'],
        'id' => intval($_POST['id'])
    ];
    $stmt->execute($values);
    echo '<p>auction edited</p>';
    echo '<br>';
    echo ' <a href="index.php" class="ca">Go to index page to view auction,click here</a>';
    echo '<br>';
    echo ' <a href="delAuction.php" class="ca">Delete Auction?</a>';
    echo '<br>';
    echo ' <a href="addAuction.php" class="ca">Click here to add auction</a>';
   
} else if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM auction WHERE id = :id');

    $values = [
        'id' => intval($_GET['id'])
    ];

    $stmt->execute($values);

    $key = $stmt->fetch();
}
?>




</body>
</main>
</html>
<?php
    require 'footer.php';
?>