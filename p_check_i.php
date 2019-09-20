<?php
   session_start();
   include "./connect.php";  
   if(isset($_SESSION['username'])){
      $sql="select * from admin where username='".$_SESSION['username']."' and type='Property_Expert'";
	  $res=mysql_query($sql);
	  if(mysql_num_rows($res) > 0){
	      }else{
		    header("location:index.php");
		       }
       }else{
	    header("location:index.php");
	        }
   
   ?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Tax Management System::</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" charset="utf-8" />	
	<![endif]-->
</head>

<body>
	<div id="header">
		</br></br></br></br></br></br></br>
		<div id="navigation">
			<ul>
				<li><a href="p_add_item.php">Register Item</a></li>
				<li class="separator"></li>
				<li ><a href="p_check_i.php">Check Item </a></li>
				<li class="separator"></li>
				<li><a href="p_add_search.php">Search Item</a></li>
				<li class="separator"></li>
				<li><a href="p_change_p.php">Change Password</a></li>
				<li class="separator"></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
		<div class="background">
			<div id="services">
		
		 <form class="former_form">
			<fieldset>
			<legend><h4>Check Those Items...</h4></legend>
			<table class="table">
			<tr>
			<th>Item No</th>
			<th>Item Name</th>
			<th>Item Type</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Total Price</th>
			<th>Date</th>
			<th>Check</th>
			</tr>
			    <?php
				  $sql1="select * from item where checked_or='no'";
				   $result1=mysql_query($sql1);
				   if( $result1){
				       while($row=mysql_fetch_assoc($result1)) {
				       	  echo "<tr>";
						echo "<td>".$row['Item_No']."</td>";
						$no=$row['Item_No'];
					echo "<td>".$row['Item_Name']."</td>";
					echo "<td>".$row['Item_Type']."</td>";
					echo "<td>".$row['Quantity']."</td>";
					echo "<td>".$row['Unit_Price']."</td>";
					echo "<td>".$row['Total_Price']."</td>";
					echo "<td>".$row['Date']."</td>";
						echo "<td><a href=\"p_check_item.php?value=$no\">check</a></td>";
					    echo "</tr>";
				       }
						
				       }else{
					   $error="Error occured 404";
					        }
				
				?>
		    </table>
			</fieldset>
			</form>
				
				
			</div>
		</div>
	</div> <!-- /#contents -->
</body>
</html>