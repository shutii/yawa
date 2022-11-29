

<?php 
    session_start();
    require_once "connectdb.php";
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) 
{
?>

<?php 

    $id = $_GET['id'];

    // var_dump($id);
    $sqlQuery = "SELECT * from prod WHERE id = $id";
    
    $res = $con->query($sqlQuery);

    
    if($_POST)
    {
        $pcode = $_POST ['prodcode'];
        $pname = $_POST ['productName'];
        $cat = $_POST ['category'];
        $price = $_POST ['price'];
        $qnty = $_POST ['qnty'];
        $queryUpdate = "UPDATE prod SET prodcode = '$pcode', productName= '$pname', category= '$cat', price= '$price', qnty= '$qnty' WHERE id = '$id '";  
        $res = $con->query($queryUpdate);
        // echo "\nSuccessfully Updated!";
        header("Location: home.php?Product_Successfully_Updated!");
    }     
?>


<?php 
    while($row = mysqli_fetch_object($res))
    { ?>
<title>Update Products</title>
<div class="container3">
<div class="welcome">
        <h2><?php echo $_SESSION['fname']; echo " ", $_SESSION['lname'];?></h2>
    </div>
    <div class="title">
        <h1>Update Product</h1>
    </div>
<link rel="stylesheet" href="style.css">
<form action="" method="post">
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
</div>
    
<br>
<div class="inputbox">
<input type="text" name="prodcode" required="required" value="<?php echo $row->prodcode ?>">
<span>Product Code</span>
    </div>
    <br>
    <div class="inputbox">
        <input type="text" name="productName" required="required" value="<?php echo $row->productName ?>">
        <span>Product Name</span>
    </div>
    <br>
    <div class="inputbox">
    <input type="text" name="price" required="required" value="<?php echo $row->price ?>">
    <span>Price</span>
    </div>
    <br>
    <div class="inputbox">
    <input type="number" name="qnty" required="required" value="<?php echo $row->qnty ?>">
    <span>Quantity</span>
    </div>
    <br>
    <div class="inputBtn">
        <input type="submit" name="save" value="Save">
    </div>
</form>
<p style="color:rgb(133, 133, 133)">Change your mind? <a href="home.php" class="logh">Back Home</a></p>
<?php    }
?>
<?php 
} 
else 
{
    header("Location: home.php");
    exit();
}
?>