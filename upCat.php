<link rel="stylesheet" href="style.css">
<?php
    require_once "connectdb.php";

    if (!isset($_SESSION['id']) && !isset($_SESSION['uname'])) 
    {
    ?>    
<?php 
    $id = $_GET['id'];

    // var_dump($id);
    $sqlQuery = "SELECT * from cat WHERE id = $id";
    
    $res = $con->query($sqlQuery);

    
    if($_POST)
    {
        $cname = $_POST ['categoryName'];
        $stat = $_POST ['status'];
        $queryUpdate = "UPDATE cat SET categoryName= '$cname', status= '$stat' WHERE id = '$id'";  
        $res = $con->query($queryUpdate);
        // echo "\nSuccessfully Updated!";
        header("Location: home.php?Category_Successfully_Updated!");
    }     
?>


<?php 
    while($row = mysqli_fetch_object($res))
    { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="post">
<div class="container3">

<table class="kini">
    <div class="title">
        <h1>Update Category</h1>
    </div>
    <?php if (isset($_GET['error'])) 
    {
    ?>
     <p class="error"> <?php echo $_GET['error']?> </p>
     <?php
    }?>  
    
    <div class="inputbox">
    <label for="status">Status:</label>
    <select class="combo" name="status" value="<?php echo $row->status ?>">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </div><br>

    <div class="inputBox">
        <input type="text" name="categoryName" required="required" value="<?php echo $row->categoryName ?>">
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
<?php    }
?>
<?php 
} 
else 
{
    header("Location: index.php");
    exit();
}
?>
