<?php 
    session_start();
    require_once"connectdb.php";
    
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) 
{
?>

<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" href="components/dist/css/bootstrap.css">
        <link type="text/css" href="components/dist/css/bootstrap.min.css">
        <title>Home</title>
    </head>
    <body>
        <link rel="stylesheet" href="style.css">

        <div class="containerLook">
            <div class="inputBox">
                <input type="text" name="uname" id="lookAcc" onkeyup="search()" required="required">
                <span>Search Product</span>
            </div>
        </div>

        <div class="container4">
            <div class="col-sm-8">

                <form class="form-horizontal" id="frmInvoice">
                <div class="welcome">
                    <h2>Welcome, <?php echo $_SESSION['fname']; echo " ", $_SESSION['lname'];?></h2>
                </div><br>
    
                <table class="kini" id="t1">
                    <div class="title">
                        <h1>Order Page</h1>
                    </div>
                        <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> -->
                    <div class="welcome">
                    </div>
        
                    <tr>
                        <th>I.D</th>
                        <th>Category Name</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
        
                    <?php
                        $sqlQuery = "SELECT prod.id, cat.categoryName, cat.status, prod.productName,  prod.qnty,prod.price FROM prod INNER JOIN     cat     ON  prod.category = cat.id";
                        $res = $con->query($sqlQuery);
                        while($row =mysqli_fetch_object($res))
                        {?>
                            <tr class="active-row">
                                <td><?php echo $row->id?></td>
                                <td><?php echo $row->categoryName?></td>
                                <td><?php echo $row->productName?></td>
                                <td><?php echo $row->qnty?></td>
                                <td><?php echo $row->price?></td>
                                <td><?php echo $row->status?></td>
                                <td>
                                    <div class="link">
                                        <a class="updlink" href="order.php?id=<?php echo $row->id?>">Purchase</a>
                                    </div>
                                </td>   
                            </tr>
                    <?php
                        }   
                        ?>
                </table>
                    
                <div class="btnContainer1">
                    <form method="POST" action="home.php">
                        <div class="inputBtn"><input type="submit" value="Back"></div>
                    </form>
                    <form method="POST" action="logout.php">
                       <div class="inputBtn"><input type="submit" value="Logout"></div>
                    </form>
                </div>
                </form>

            </div>

            <div class="col-sm-4">


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

        <script src="components/jquery/dist/jquery.js"></script>
        <script src="components/jquery/dist/jquery.min.js"></script>
        <script src="components/jquery.validate.min.js/"></script>

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