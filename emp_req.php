<?php
   session_start();
   include "./connect.php";  
  if(isset($_SESSION['username'])){
      $sql="select * from employee where username='".$_SESSION['username']."'";
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
			$emp_id=$_SESSION['username'];
			$Item_name=$_POST['Item_name'];
			$Item_type=$_POST['Item_type'];
			$quantity=$_POST['quantity'];
			$unit=$_POST['unit'];
			$date=$_POST['date'];
			$approve='no';
			$return='no';
			if($Item_no && $Item_name && $Item_type && $quantity && $unit && $date){
			   $sql="insert into item_req values(NULL,'".$emp_id."','".$Item_no."','".$Item_name."','".$Item_type."','".$quantity."','".$unit."','".$date."','".$approve."','".$return."')";
			   $result=mysql_query($sql);
			   if($result){
			     $error="Request Sent Successfully"; 
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
				<li ><a href="emp_req.php">Request Item</a></li>
				<li class="separator"></li>
				<li><a href="emp_change_p.php">Change Password</a></li>
				<li class="separator"></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
		<div class="background">
			<div id="services">
	<form action="emp_req.php" method="post"class="signup_form">
			<fieldset>
			<legend><h3>Reuest Item!</h3></legend>
			<i><center><font color="red"size="2px"><?php if(isset($_POST['submit_create'])) echo "".$error.""; ?></font></center></i>
		    
			<input type="text"placeholder="Item No"name="Item_no"></br>
			<input type="text"placeholder="Item Name"name="Item_name"></br>
			<input type="text"placeholder="Item Type"name="Item_type"></br>
			<input type="text"placeholder="Quantity"name="quantity"></br>
			<input type="text"placeholder="Describution"name="unit"></br>
			<input type="date"value="2011-08-19"name="date"></br>

			
				
				<input type="submit"value="Record"name="submit_create"id="shrink">
				<input type="Reset"value="Clear"id="shrink">
			</fieldset>
			</form>
			</div>
		</div>
	</div> <!-- /#contents -->
</body>
</html>