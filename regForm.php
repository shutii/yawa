<?php 
    session_start();
    
if (!isset($_SESSION['id']) && !isset($_SESSION['uname'])) 
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="saveReg.php" method="post">
    <div class="container">
        <div class="title">
            <h1>Register Account</h1>
        </div>
    
        <div class="inputBox">
            <input type="text" name="fname" required="required">
            <span>First Name</span>
        </div>
        <div class="inputBox">
            <input type="text" name="lname" required="required">
            <span>Last Name</span>
        </div>
        <div class="inputBox">
            <input type="text" name="addr" required="required">
            <span>Address</span>
        </div>
        <div class="inputBox">
            <input type="number" name="contact" required="required">
            <span>Contact No.</span>
        </div>
        <div class="inputBox">
            <input type="text" name="email" required="required">
            <span>Email</span>
        </div>
        <div class="inputBox">
            <input type="text" name="uname" required="required">
            <span>Username</span>
        </div>
        <div class="inputBox">
            <input type="password" name="pass" required="required">
            <span>Password</span>
        </div>
    
        <div class="inputBtn">
            <input type="submit" name="reg" value="Register">
        </div>
            <p style="color:rgb(133, 133, 133)">Already have an account? <a href="index.php" class="logh">Login here</a></p>
    </div>
</form>
</body>
</html>

<?php 
} 
else 
{
    header("Location: home.php?error");
    exit();
}
?>