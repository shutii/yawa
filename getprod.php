<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pos_inv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$pro_code = $_POST["procode"];
$stmt = $conn->prepare("SELECT id, prodcode, productName, price FROM prod WHERE prodcode = ?");
$stmt->bind_param("s",$pro_code);
$stmt->bind_result($id,$product_code,$productName,$price); 

if($stmt->execute()){
	while($stmt->fetch()){
		$output[] = array("id"=>$id,"prodcode"=>$product_code,"productName"=>$productName,"price"=>$price);
	}
	echo json_encode($output);
}

?>