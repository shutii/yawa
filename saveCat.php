<?php
    require_once "connectdb.php";

    $catName = $_POST['categoryName'];
    $catStatus = $_POST['status'];

    $sql = "INSERT INTO cat (categoryName, status) values ('$catName', '$catStatus')";
    //$sql = "INSERT INTO cat (categoryName, stat) values ('$catName', '$stat)";

    $res  = $con->query($sql);
    if($res)
    {   
        header('Location: home.php');
        echo "\nAccount_Successfully_Updated!";
    }
    else    
        echo "error happened";
?>