<!DOCTYPE html>
<html>
<head>
<title>pharmacy management system</title>
		<meta name = "viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,"/>
		<style>
		body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
		.b{
position : absolute;
	  top : 1%;
	  left :92%;
}
.e{
position : absolute;
	  top : 1%;
	  left :82.5%;
}
.topnav {
  overflow: hidden;
  background-color: #333;
  position:absolute;
  top:18%;
  width:100%;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
.topnav .search-container {
  position:absolute;
  left:72%;

}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  position:absolute;
  left:72%;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 50%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
.a{
font-family : times new roman;
position:absolute;
top:2.5%;
left:38%;
		color : white;
		font-weight : bold;
	}
	.bnm{
		position : absolute;
		top:1%;
		left :2%;
	}
	body{
background-image: url("../images/custback.jpg");
 background-repeat: repeat-y;
  background-size: cover;
   background-attachment: fixed;
}
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
	#ava{
	font-family : times new roman;
	color:white;
	}
</style>
<script>
function myFunction()
{
alert("please add the items first");
}
</script>
</head>
<body onload="myFunction()">

<div class="topnav">
  <a class ="active"href="bill.php">CART</a>
  <a href="viewbill.php">VIEW BILLS</a>
  <div class="b">
    <a href="../html/admindash1.html">BACK</a>
  </div>
  <div class="e">
    <a href="check.php">PROCEED</a>
  </div>
</div>
<div class="a">
<center>
<h1>CUSTOMER DETAILS</h1>
</center>
</div>
<div class="bnm">
<img src="../images/plus.jpg" width="100" height="100">
</div>


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
		 $sql = mysqli_query($conn,"select * from bill");
		 if(!$sql)
		{
			echo ("not sucess");
		}
		else
		{
		if(mysqli_num_rows($sql)>0)
		{
		 while($row = mysqli_fetch_assoc($sql))
		{
		  $id = $row["medid"];
		   $id1=$row['quantity'];
		   $sql1 = mysqli_query($conn,"select * from medicine where medid='$id'");
		   if(!$sql1)
		{
			echo ("not sucess");
		}
		else
		{
		if(mysqli_num_rows($sql1)>0)
		{
		echo "<center><table>
		<tr>
			<th>MEDID</th><th>NAME</th><th>QUANTITY</th><th>PRICE</th><th>DELETE</th>
		</tr>";
		 while($row = mysqli_fetch_assoc($sql1))
		{  
		$id2=($row['tabprice']*$id1);
		   echo "<tr><td>".$row["medid"]."</td><td>" .$row["medname"]."</td><td>".$id1."</td><td>".$id2."</td><td><a href='../php/next.php?id=$id'><img src='../images/delete.jpg' width='70' height='70' border='0' align= 'middle'></a></td></tr>";		
		}
		}
		}
		}
		echo "</table></center>";  
		}
		else
		{
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><center><img src='../images/sad.gif' width='150' height='150' border='0' align= 'middle'></center><center><h2 id = 'ava'>NO ITEMS IN THE CART</h2></center>";
		}
		}
		}
	?>
</div>
</body>
</html>