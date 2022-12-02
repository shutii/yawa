<?php
    require_once "connectdb.php";
    
    $cat = $_POST['category'];
    $prodcode = $_POST['prodcode'];
    $prodName = $_POST['productName'];
    $price = $_POST['price'];
    $qnty = $_POST['qnty'];

    $sql = "INSERT INTO prod (prodcode, productName,category, price, qnty) values ('$prodcode','$prodName', '$cat','$price', '$qnty')";

    $res  = $con->query($sql);
    if($res)
    {
        echo "SUCCESSFULLY ADDED!";  
        header('Location: index.php?Account_Successfully_Added!');
    }  
    else    
        echo "error happened";

?>