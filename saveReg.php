<?php
    require_once "connectdb.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $addr = $_POST['addr'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO login_tbl (fname, lname, address, contact, email, username, password) VALUES ('$fname', '$lname', '$addr', '$contact', '$email', '$uname', '$pass')";

    $res = $con->query($sql);
    if($res)
    {   
        header('Location: index.php?Account_Successfully_Created');
        // echo "\nSUCCESSFULLY UPDATED!";
    }
    else    
        echo "error happened";
    // if(isset($_POST['reg']))
    // {
    //     session_start();

    //     $_SESSION['fname'] = htmlentities($_POST['fname']);

    //     header('Location: logForm.html');
    // }


?>