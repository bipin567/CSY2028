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
    <link rel="stylesheet" href="ibuy.css" />
</head>

<body>
    <main>

<h2>Add Auction</h2>
<br>
<br>
        
        <form action="addAuction.php" method="post">
            
            
            <label>ID:</label>
          
            <input type="text" name="id" placeholder="ID">
            
            
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
            <label for="enddate">Auction End date</label>
        <input type="date" name="enddate" id="enddate">
        <!-- <label for = "checkbox">Do you agree to the terms and conditions?</label>
        <input type = "checkbox" name="myCheckbox" value="ticked" /> -->
        <!-- <input type ="submit" value ="Sign Up" name="submit" /> -->
        <input type="submit" name="submit" value="Submit" />
        <br>
        
        <!-- <a href="login.php" class="ca">Already have an account?</a> -->
  <!-- <button type="submit" class="register-button">submit</button> -->
</form>
<a href="editAuction.php" class="ca">Edit Auction?</a>
<br>
<a href="delAuction.php" class="ca">Delete Auction?</a>
<br>
<a href="index.php" class="ca">click here</a>;


</main>
<?php
if (isset($_POST['submit'])) {
$stmt=$pdo->prepare('insert into auction(id,title,description,category,enddate)
values(:id,:title,:description,:category,:enddate)
');
$values=[
   'id'=>$_POST['id'],
   'title'=>$_POST['title'],
   'description'=>$_POST['description'],
   'category'=>$_POST['category'],
   'enddate'=>$_POST['enddate'],
      
];
$stmt->execute($values);


    if($stmt){
        echo "Auction added in index page,Tap ibuy to go to index page ";
        echo '<br>';
        // echo 'click here to go to next page'.'<a href="login.php">click here</a>';
        
    }
    
}
?>
</body>
</html>
<?php
    require 'footer.php';
?>