<?php

require_once "connectdb.php";

$u_id = $_GET['id'];

$sql = "DELETE FROM login_tbl WHERE id= $u_id";

$res  = $con->query($sql);
if($res)
{
    echo "ACCOUNT SUCCESSFULLY DELETED!";   
    header('Location: home.php?ACCOUNT SUCCESSFULLY DELETED!');
}
else    
    echo "error happened";