<!-- <!DOCTYPE html>
<link rel="stylesheet" href="style.css">

<form action="saveCat.php" method="post">
    <input type="text" name="categoryName" placeholder="Enter Category name">
    <br>
    <input type="text"  name="status" placeholder="Enter Status">
    <br>
   
    <input class="btn" type="submit">
</form> -->

<?php 
    session_start();
    
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) 
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="saveCat.php" method="post">
<div class="container2">

<table class="kini">
    <div class="title">
        <h1>New Category</h1>
    </div>
    <?php if (isset($_GET['error'])) 
    {
    ?>
     <p class="error"> <?php echo $_GET['error']?> </p>
     <?php
    }?>
    
    
    <div class="inputbox">
    <label for="status">Status:</label>
        <select class="combo" name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    <div class="inputBox">
        <input type="text" name="categoryName" required="required">
        <span>Category Name</span>
    </div>
    <!-- <div class="inputBox">
        <input type="text" name="status" required="required">
        <span>Status</span>
    </div> -->
    <div class="inputBtn">
        <input type="submit" name="login" value="Save">
    </div>
    <p style="color:rgb(133, 133, 133)">Change your mind? <a href="home.php" class="logh">Back Home</a></p>
</div>
</form>
</body>
</html>

<?php 
} 
else 
{
    header("Location: home.php");
    exit();
}
?>