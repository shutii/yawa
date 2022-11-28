<?php 
    session_start();
    
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) 
{
?>
<title>New Products</title>
<div class="container3">
<div class="welcome">
        <h2><?php echo $_SESSION['fname']; echo " ", $_SESSION['lname'];?></h2>
    </div>
    <div class="title">
        <h1>New Category</h1>
    </div>
<link rel="stylesheet" href="style.css">
<form action="saveProd.php" method="post">
<?php
    require_once "connectdb.php";
    // var_dump($catID);
    $sql = "SELECT id, categoryName FROM cat";
    $res = $con->query($sql);
    
?>

<div class="inputbox">
<label for="category">category:</label>
<select class="combo" name="category">
    <?php
        while($rows = $res->fetch_assoc())
        {
            $catID = $rows['id'];
            $catName = $rows['categoryName'];
            echo "<option value = $catID>$catName</option>";
        }
    ?>
</select>
</div>
    
<br>
<div class="inputbox">
<input type="text" name="productName" required="required">
<span>Product Name</span>
    </div>
    <br>
    <div class="inputbox">
    <input type="text" name="price" required="required">
    <span>Price</span>
    </div>
    <br>
    <div class="inputbox">
    <input type="number" name="quanity" required="required">
    <span>Quantity</span>
    </div>
    <br>
    <div class="inputBtn">
        <input type="submit" name="save" value="Save">
    </div>
</form>
<p style="color:rgb(133, 133, 133)">Change your mind? <a href="home.php" class="logh">Back Home</a></p>

<?php 
} 
else 
{
    header("Location: home.php");
    exit();
}
?>