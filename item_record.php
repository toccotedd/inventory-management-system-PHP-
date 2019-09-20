<?php
   session_start();
   include "./connect.php";
    if(isset($_SESSION['username'])){
      $sql="select * from admin where username='".$_SESSION['username']."' and type='Property'";
	  $res=mysql_query($sql);
	  if(mysql_num_rows($res) > 0){
	      }else{
		    header("location:index.php");
		       }
       }else{
	    header("location:index.php");
	        }		

    if(isset($_POST['submit_create'])){ 
       $error=""; 
       $email="";	   
			$Item_no=$_POST['Item_no'];
			$Item_name=$_POST['Item_name'];
			$Item_type=$_POST['Item_type'];
			$quantity=$_POST['quantity'];
			$unit=$_POST['unit'];
			$total=$unit * $quantity;
			$date=$_POST['date'];
			$checked='no';
			if($Item_no && $Item_name && $Item_type && $quantity && $unit && $date){
			   $sql="insert into item values('".$Item_no."','".$Item_name."','".$Item_type."','".$quantity."','".$unit."','".$total."','".$date."','".$checked."')";
			   $result=mysql_query($sql);
			   if($result){
			     $error="Account Created Successfully"; 
			              }else{
						  echo(mysql_error());
						       }
			   }else{
			    $error="please fill all fields..."; 
			       }
				}
   
   ?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<<title>Tax Management System::</title>
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
				<li><a href="add_item.php">Register Item</a></li>
				<li class="separator"></li>
				<li ><a href="item_record.php">Item Record</a></li>
				<li class="separator"></li>
				<li><a href="add_search.php">Search Item</a></li>
				<li class="separator"></li>
				<li><a href="change_p.php">Change Password</a></li>
				<li class="separator"></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
		<div class="background">
			<div id="services">
		<form action="emp_search.php" method="post"class="second_form">
			
		</form>
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
			<th>Checked</th>
			</tr>
			    <?php
				  $sql1="select * from item";
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
					echo "<td>".$row['checked_or']."</td>";
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