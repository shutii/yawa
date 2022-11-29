<?php 
    session_start();
    require_once"connectdb.php";
    
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) 
{
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
<link rel="stylesheet" href="style.css">

<div class="containerLook">
    <div class="inputBox">
        <input type="text" name="uname" id="lookAcc" onkeyup="search()" required="required">
        <span>Search Account</span>
    </div>
</div>

<div class="container4">
    <div class="welcome">
        <h2>Welcome, <?php echo $_SESSION['fname']; echo " ", $_SESSION['lname'];?></h2>
    </div>
<table class="kini" id="t1">
    <div class="title">
        <h1>Home Page</h1>
    </div>

    <div class="welcome">
        <h2>Category List</h2>
    </div>
   <tr>
       <th>I.D</th>
       <th>Category Name</th>
       <th>Status</th>
       <th>Actions</th>
   </tr>


   <?php
       $sqlQuery = "SELECT id, categoryName, status FROM cat";
       $res = $con->query($sqlQuery);
       while($row =mysqli_fetch_object($res))
       {
           ?>
               <tr class="active-row">
                   <td><?php echo $row->id?></td>
                   <td><?php echo $row->categoryName?></td>
                   <td><?php echo $row->status?></td>
                   <td>
                       <div class="link">
                       <a class="updlink" href="upCat.php?id=<?php echo $row->id?>">Update</a>
                       | 
                       <a class="dellink" href="delCat.php?id=<?php echo $row->id?>">Delete</a>
                       </div>
                   </td>   
               </tr>
       <?php
       }   
    ?>
</table>

<table class="kini" id="t2">

<div class="welcome">
        <h2>Product List</h2>
    </div>
<tr>
       <th>Code</th>
       <th>Category Name</th>
       <th>Product Name</th>
       <th>Quantity</th>
       <th>Price</th>
       <th>Status</th>
       <th>Actions</th>
   </tr>


   <?php
       $sqlQuery = "SELECT prod.prodcode, prod.id, cat.categoryName, cat.status, prod.productName,  prod.qnty,prod.price FROM prod INNER JOIN cat ON prod.category = cat.id";
       $res = $con->query($sqlQuery);
       while($row =mysqli_fetch_object($res))
       {
           ?>
               <tr class="active-row">
                   <td><?php echo $row->prodcode?></td>
                   <td><?php echo $row->categoryName?></td>
                   <td><?php echo $row->productName?></td>
                   <td><?php echo $row->qnty?></td>
                   <td><?php echo $row->price?></td>
                   <td><?php echo $row->status?></td>
                   <td>
                       <div class="link">
                       <a class="updlink" href="upProd.php?id=<?php echo $row->id?>">Update</a>
                       | 
                       <a class="dellink" href="delProd.php?id=<?php echo $row->id?>">Delete</a>
                       </div>
                   </td>   
               </tr>
       <?php
       }   
    ?>
</table>

<div class="btnContainer">
<form method="POST" action="order.php">
   <div class="inputBtn1"><input type="submit" value="Order"></div>
</form>

<form method="POST" action="addCat.php">
   <div class="inputBtn1"><input type="submit" value="+Category"></div>
</form>

<form method="POST" action="addProd.php">
   <div class="inputBtn1"><input type="submit" value="+Product"></div>
</form>

<form method="POST" action="users.php">
   <div class="inputBtn1"><input type="submit" value="Accounts"></div>
</form>

<form method="POST" action="logout.php">
   <div class="inputBtn1"><input type="submit" value="Logout"></div>
</form>
</div>
</div>

<script>
    function search() 
    {
        var input, filter, table, tr, td, txtValue;
        input = document.getElementById("lookAcc");
        filter = input.value.toUpperCase();
        table = document.getElementById("t1");
        tr = table.getElementsByTagName("tr");
        for (let i = 1; i < tr.length; i++) 
        {
            // td = tr[i].getElementsByTagName("td")[1];
            td = tr[i];
            if (td) 
            {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) 
                {
                    tr[i].style.display = "";
                } 
                else 
                {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
</script>

</body>

</html>

<?php 
} 
else 
{
    header("Location: index.php");
    exit();
}
?>