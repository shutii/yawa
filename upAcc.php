<link rel="stylesheet" href="style.css">
<?php
    require_once "connectdb.php";

    if (!isset($_SESSION['id']) && !isset($_SESSION['uname'])) 
    {
    ?>    
<?php 
    $u_id = $_GET['id'];

    // var_dump($id);
    $sqlQuery = "SELECT * from login_tbl WHERE id = $u_id";
    
    $res = $con->query($sqlQuery);

    
    if($_POST)
    {
        $fname = $_POST ['fname'];
        $lname = $_POST ['lname'];
        $addr = $_POST ['addr'];
        $contact = $_POST ['contact'];
        $email = $_POST ['email'];
        $username = $_POST ['uname'];
        $password = $_POST ['pass'];
        $queryUpdate = "UPDATE login_tbl SET fname= '$fname', lname= '$lname', address= '$addr', contact= '$contact', email= '$email', username= '$username', password= '$password' WHERE id = '$u_id '";  
        $res = $con->query($queryUpdate);
        // echo "\nSuccessfully Updated!";
        header("Location: home.php?Successfully_Updated!");
    }     
?>


<?php 
    while($row =mysqli_fetch_object($res))
{ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="post">
    <div class="container">
        <div class="title">
            <h1>Update Account</h1>
        </div>
    
        <div class="inputBox">
            <input type="text" name="fname" required="required" value="<?php echo $row->fname ?>">
            <span>First Name</span>
        </div>
        <div class="inputBox">
            <input type="text" name="lname" required="required" value="<?php echo $row->lname ?>">
            <span>Last Name</span>
        </div>
        <div class="inputBox">
            <input type="text" name="addr" required="required" value="<?php echo $row->address ?>">
            <span>Address</span>
        </div>
        <div class="inputBox">
            <input type="text" name="contact" required="required" value="<?php echo $row->contact ?>">
            <span>Contact No.</span>
        </div>
        <div class="inputBox">
            <input type="text" name="email" required="required" value="<?php echo $row->email ?>">
            <span>Email</span>
        </div>
        <div class="inputBox">
            <input type="text" name="uname" required="required" value="<?php echo $row->username ?>">
            <span>Username</span>
        </div>
        <div class="inputBox">
            <input type="password" name="pass" required="required">
            <span>Password</span>
        </div>
    
        <div class="inputBtn">
            <input type="submit" name="reg" value="Update">
        </div>

        <p style="color:rgb(133, 133, 133)">Change your mind? <a href="index.php" class="logh">Go back</a></p>
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
