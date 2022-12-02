<?php
    require_once "connectdb.php";
    
    if(isset($_POST['purchase']))
    {
        $product = $_POST['pname'];
        $price = $_POST['price'];
        $qnty = $_POST['qty'];
        $amount = $_POST['total'];
        $total = $_POST['finaltotal'];
        $payment = $_POST['pay'];
        $discount = $_POST['disc'];
        $change = $_POST['bal'];
        $user = $_POST['uname'];
        
        $sql = "INSERT INTO orders (product, price, qnty, amount, total, payment, discount, change, user) values ('$product', '$price', '$qnty',    '$amount', '$total', '$payment', '$discount', '$change', '$user')";

        $res  = $con->query($sql);
        if($res)
        {
            echo "SUCCESSFULLY ADDED!";  
            header('Location: ordHistory.php?Purchase_Successful!');
        }  
        else    
            echo "error happened";
    }

?>