<?php

require_once "connectdb.php";

$p_id = $_GET['id'];

$sql = "DELETE FROM cat WHERE id= $p_id";

$res  = $con->query($sql);
if($res)
{
    echo "ACCOUNT SUCCESSFULLY DELETED!";   
    header('Location: home.php?CATEGORY SUCCESSFULLY DELETED!');
}
else    
    echo "error happened";