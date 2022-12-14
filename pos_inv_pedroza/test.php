<?php 
    session_start();
    require_once"connectdb.php";
    
if (isset($_SESSION['id']) && isset($_SESSION['uname'])) 
{
?>

<html>
	<head>
    <title>Order</title>
		<link href="components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
		<link href="components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>

	<div class="container4">

	<table class="kini" id="t2">	

		<div class="welcome">
            <h2>Welcome, <?php echo $_SESSION['fname']; echo " ", $_SESSION['lname'];?></h2>
        </div><br>

        <div class="title">
            <h1>Order Page</h1>
        </div>
            	<tr>
                   <th>Code</th>
                   <th>Category Name</th>
                   <th>Product Name</th>
                   <th>Quantity</th>
                   <th>Price</th>
                   <th>Status</th>
				   <th>Action</th>
               </tr>


               <?php
                   $sqlQuery = "SELECT prod.id, prod.prodcode, cat.categoryName, cat.status, prod.productName,  prod.qnty,prod.price FROM prod INNER JOIN cat ON prod.category = cat.id";
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
										<a class="updlink" href="upProd.php?id=<?php echo $row->id?>">View</a>
                       					| 
                       					<a class="dellink" href="delProd.php?id=<?php echo $row->id?>">Buy</a>
                                	</div>
                                </td> 
                           </tr>
                   <?php
                   }   
                ?>
    </table>

    <div class="containerLook1">
        <div class="inputBox">
            <input type="text" name="uname" id="lookup" onkeyup="search()" required="required">
            <span>Search Product</span>
        </div>
    </div>

	<script>
        function search() 
        {
            var input, filter, table, tr, td, txtValue;
            input = document.getElementById("lookup");
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

    <link rel="stylesheet" href="style.css">
	<div class = "container-fluid bg-2 text-center">
		<div class ="col-sm-8">
                <!-- <div class="welcome">
                    <h2>Welcome, <?php echo $_SESSION['fname']; echo " ", $_SESSION['lname'];?></h2>
                </div><br>
                <table class="kini" id="t1">
                    <div class="title">
                        <h1>Order Page</h1> -->
			<form class = "form-horizontal" id="formInvoice">
				<table class = "table table-bordered">
					<tr>
						<th>Product Code</th>
						<th>Product</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Amount</th>
						<th>option</th>
					</tr>
					<tr>
						<td>
                            <div class="inputBox1">
                                <input type="text" class="form-control" name="procode" id="procode" required="required">
                                <span>Product Code</span>
                            </div>
                            <!-- <input type = "text" class = "form-control" id ="procode" name= "procode" placeholder = "Product Code" required/> -->
                        </td>
						<td>
                            <div class="inputBox1">
                                <input type="text" class="form-control" name="pname" id="pname"  required="required">
                                <span>Product Name</span>
                            </div>
                            <!-- <input type = "text" class = "form-control" id ="pname" name= "pname" placeholder = "Product Name" required/> -->
                        </td>
						<td>
							<div class="inputBox1">
                                <input type="text" class="form-control" name="price" id="price" required="required">
                                <span>Price</span>
                            </div>
                            <!-- <input type = "text" class = "form-control" id ="price" name= "price" placeholder = "Price" required/> -->
                        </td>
						<td>
							<div class="inputBox1">
                                <input type="number" class="form-control" name="qty" id="qty" required="required">
                                <span>Quantity</span>
                            </div>
                            <!-- <input type = "number" class = "form-control" id ="qty" name= "qty" placeholder = "Quantity" required/> -->
                        </td>
						<td>
							<div class="inputBox1">
                                <input type="text" class="form-control" name="total" id="total" required="required">
                                <span>Total</span>
                            </div>
                            <!-- <input type = "text" class = "form-control" id ="total" name= "total" placeholder = "Total" required/> -->
                        </td>
						<td>
                            <button type = "button" class = "btn btn-success" id ="add" name= "add" onclick="addProduct()"> Add </button>
                        </td>
					</tr>
				</table>
			</form>
			
			<table class = "table table-bordered" id="product_list">
				<caption>Products</caption>
				<thead>
					<tr>
						<th style = "width: 40px">Oprtion</th>				
						<th>Code</th>				
						<th>Product</th>				
						<th>Price</th>				
						<th>Quantity</th>				
						<th>Amount</th>				
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>

		</div>
		<div class = "col-sm-4" align="right">
			<div class="form-group" align="left">
				<!-- <label>Total</label> -->
				<!-- <input type="text" class="form-control" id="finaltotal" name = "finaltotal" placeholder="Total" required/> -->
				<div class="inputBox2">
                    <input type="text" class="form-control" name="finaltotal" id="finaltotal" required="required">
                    <span>Total</span>
                </div>
			</div>
			<div class="form-group" align="left">
				<!-- <label>Payment Amount</label> -->
				<!-- <input type="text" class="form-control" id="pay" name = "pay" placeholder="Pay" required/> -->
				<div class="inputBox2">
                    <input type="text" class="form-control" name="pay" id="pay" required="required">
                    <span>Payment</span>
                </div>
			</div>
			<div class="form-group" align="left">
				<!-- <label>Balance</label> -->
				<!-- <input type="text" class="form-control" id="bal" name = "bal" placeholder="Balance" required/> -->
				<div class="inputBox2">
                    <input type="text" class="form-control" name="bal" id="bal" required="required">
                    <span>Balance</span>
                </div>
			</div>
		</div>
	</div>
		<div class="btnContainer1">
            <form method="POST" action="home.php">
                <div class="inputBtn"><input type="submit" value="Back"></div>
            </form>
            <form method="POST" action="logout.php">
               <div class="inputBtn"><input type="submit" value="Logout"></div>
            </form>
        </div>
    </div>

	<script src = "components/jquery/dist/jquery.js"></script>
	<script src = "components/jquery/dist/jquery.min.js"></script>
	<script src = "components/jquery.validate.min.js"></script>
	
	<script>
	
		getProductCode();
		
		function getProductCode(){
			$("#procode").empty();
			$("#procode").keyup(function (e){
				//var q = $("#procode").val();
				$.ajax({
					type: "POST",
					url: "getprod.php",
					dataType: "JSON",
					data: {procode: $("#procode").val()},
					
					success: function(data){
						$("#pname").val(data[0].productName);
						$("#price").val(data[0].price);
						$("#qty").focus();
					}
				});
			});
		}
		
		$(function()
        {
			$("#price, #qty").on("keydown keyup click",qty);
			function qty(){
				var sum = (
					Number($("#price").val())*Number($("#qty").val())
				);
				$('#total').val(sum);
				console.log(sum);
			}
		});

        $(function(){
			$("#pay,#finaltotal").on("keydown keyup click",finaltot);
			function finaltot(){
				var sum = (
					Number($("#pay").val()) - Number($("#finaltotal").val())
				);
				$('#bal').val(sum);
			}
		});


        function addProduct()
        {
            var products = {
                procode : $("#procode").val(),
                pname : $("#pname").val(),
                price : $("#price").val(),
                qty : $("#qty").val(),
                total : $("#total").val(),
                button : '<button type ="button" class="button" class="btn btn-danger">delete</button>'
            };

            addRow(products);
            $('formInvoice')[0].reset();
        }

        var total =0;
        function addRow(products)
        {
            var $table = $('#product_list tbody');
            var $row =
                $("<tr>" + 
                    "<td><Button type='button' name='record' class='btn btn-danger btn-xs' name='record' onclick='deleterow(this)'>Delete</td>"+
                    "<td>" + products.procode + "</td>" + 
                    "<td>" + products.pname + "</td>" + 
                    "<td>" + products.price + "</td>" + 
                    "<td>" + products.qty + "</td>" + 
                    "<td>" + products.total + "</td>" + 
                    "</tr>"
                );
                $row.data("procode", products.procode);
                $row.data("pname", products.pname);
                $row.data("price", products.price);
                $row.data("qty", products.qty);
                $row.data("total", products.total);

                total +=Number(products.total);

                    $('#finaltotal').val(total);
                
                $table.append($row);

                $row.find('deleterow').click(function(event)
                {
                    deleteRow($(event.currentTarget).parent('tr'));
                });
        }

        function deleterow(e)
        {
            product_total_cost=parseInt($(e).parent().parent().find('td:last').text(),10);
            total-=product_total_cost;
            $('#finaltotal').val(total);
            $(e).parent().parent().remove();
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