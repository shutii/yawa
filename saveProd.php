<?php
    require_once "connectdb.php";
    
    $cat = $_POST['category'];
    $prodName = $_POST['productName'];
    $price = $_POST['price'];
    $quantity = $_POST['qnty'];

    $sql = "INSERT INTO prod (productName,category, price, qnty) values ('$prodName', '$cat','$price', '$quantity')";

    $res  = $con->query($sql);
    if($res)
    {
        echo "SUCCESSFULLY ADDED!";  
        header('Location: index.php?Account_Successfully_Added!');
    }  
    else    
        echo "error happened";

?>