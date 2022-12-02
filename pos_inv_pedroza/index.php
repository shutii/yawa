<?php 
    session_start();
    
if (!isset($_SESSION['id']) && !isset($_SESSION['uname'])) 
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="veriflog.php" method="post">
<div class="container2">
    <div class="title">
    <h1>Login</h1>
    </div>
    <?php if (isset($_GET['error'])) 
    {
    ?>
     <p class="error"> <?php echo $_GET['error']?> </p>
     <?php
    }?>
    <div class="inputBox">
        <input type="text" name="uname" required="required">
        <span>Username</span>
    </div>
    <div class="inputBox">
        <input type="password" name="pass" required="required">
        <span>Password</span>
    </div>

    <div class="inputBtn">
        <input type="submit" name="login" value="Login">
    </div>
    <p style="color:rgb(133, 133, 133)">Don't have an account? <a href="regForm.php" class="logh">Register here</a></p>
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