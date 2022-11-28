<?php

require_once "connectdb.php";

$p_id = $_GET['id'];

$sql = "DELETE FROM prod WHERE id= $p_id";

$res  = $con->query($sql);
if($res)
{
    echo "ACCOUNT SUCCESSFULLY DELETED!";   
    header('Location: home.php?ACCOUNT SUCCESSFULLY DELETED!');
}
else    
    echo "error happened";