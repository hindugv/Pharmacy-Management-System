<!DOCTYPE html>
<html>
<head>
<title>pharmacy management system</title>
		<meta name = "viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,"/>
		<link rel = "stylesheet" type = "text/css" href = "../css/stock.css"/>
		<style>
		table{
	border-collapse : collapse;
	width :90%;
	position:absolute;
top:28%;
left:5%;
right:5%;
	}
	th{
	font-family : times new roman;
	color:white;
	border: 1.5px solid #ddd;
	border-color : orange;
	text-align:center;
	font-size : 20px;
	padding: 15px;
	background-color: maroon;
	
	}
	td {
	font-family : times new roman;
	color:white;
	 border: 1.5px solid #ddd;
	border-color : orange;
	font-size : 18px;
	text-align:center;
	padding: 15px;
	}
		</style>
<script>
function myFunction() {
    alert("not sufficient quantity available");
}
</script>
</head>
<body onload ="myFunction()" >

<div class="topnav">
  <a class="active" href="medicine.php">MEDICINES</a>
  <a href="toilteries.php">TOILTERIES</a>
  <a href="babycareproducts.php">BABY CARE PRODUCTS</a>
  <a href="skincareproducts.php">SKIN CARE PRODUCTS</a>
    <div class="search-container">
    <form action="sea.php" method = "get">
      <input type="text" placeholder="Search.." name="search"><button type="submit">Search</button>
    </form>
  </div>
  <div class="b">
 <a href="../html/userdash.html">BACK</a>
  </div>
</div>
<div class="a">
<center>
<h1>PRODUCT DETAILS</h1>
</center>
</div>
<div class="bnm">
<img src="../images/plus.jpg" width="100" height="100">
</div>

  <center><table>
		<tr>
			<th>MEDID</th><th>MEDNAME</th><th>CMPID</th><th>MFGDATE</th><th>EXPDATE</th><th>BOXNO</th><th>TABPRICE</th><th>TOTPRICE</th><th>QUANTITY</th><th>ADD</th>
		</tr>
	<?php
	$host = "127.0.0.1";
	$user = "pms";
	$pass = "gvhindu@98";
	$dbname = "pharmacy";
	$conn = mysqli_Connect("$host","$user","$pass","$dbname");
	if(!$conn)
	{
		echo("Server not connected".mysqli_error($conn));
	}
	else
	{
		$sql = mysqli_query($conn,"select * from medicine where type ='medicines'");
		if(!$sql)
		{
			echo ("not sucess");
		}
		else
		{
		session_start();
		if(mysqli_num_rows($sql)>=0)
		{
		 while($row = mysqli_fetch_assoc($sql))
		{
		   $id = $row["medid"];
		   echo "<tr><td>"
		   .$row["medid"]."</td><td>" .$row["medname"]."</td><td>".$row["cmpid"]."</td><td>" .$row["mfgdate"]."</td><td>" .$row["expdate"].
           "</td><td>".$row["boxno"]."</td><td>".$row["tabprice"]."</td><td>" .$row["totprice"]. "</td><td>".$row["quantity"].
		   "</td><td><a href='../php/expcheck.php?id=$id'><img src='../images/cart.png' width='40' height='40' border='0' align= 'middle'></a></td></tr>";	
		}
		echo "</table></center>";
		}
		}
		}?>
		</body>
</html>
