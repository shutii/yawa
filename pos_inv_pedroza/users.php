<?php 
    session_start();
    require_once"connectdb.php";
    
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) 
{
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accounts</title>
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



    <!-- <input type="text" id="lookAcc" onkeyup="search()" placeholder="Search User Account" title="Type in a name"> -->
<table class="kini" id="t1">
    <div class="title">
        <h1>Manage Accounts</h1>
    </div>
   <tr>
       <th>I.D</th>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Contact No.</th>
       <th>Email Address</th>
       <th>Address</th>
       <th>Actions</th>
   </tr>


   <?php
       $sqlQuery = "SELECT id, fname, lname, contact, email, address FROM login_tbl";
       $res = $con->query($sqlQuery);
       while($row =mysqli_fetch_object($res))
       {
           ?>
               <tr class="active-row">
                   <td><?php echo $row->id?></td>
                   <td><?php echo $row->fname?></td>
                   <td><?php echo $row->lname?></td>
                   <td><?php echo $row->contact?></td>
                   <td><?php echo $row->email?></td>
                   <td><?php echo $row->address?></td>
                   <td>
                       <div class="link">
                       <a class="updlink" href="upAcc.php?id=<?php echo $row->id?>">Update</a>
                       | 
                       <a class="dellink" href="delAcc.php?id=<?php echo $row->id?>">Delete</a>
                       </div>
                   </td>   
               </tr>
       <?php
       }   
    ?>

</table>

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

<div class="btnContainer1">
    <form method="POST" action="home.php">
       <div class="inputBtn"><input type="submit" value="back"></div>
    </form>
    <form method="POST" action="logout.php">
       <div class="inputBtn"><input type="submit" value="Logout"></div>
    </form>
</div>

</div>

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