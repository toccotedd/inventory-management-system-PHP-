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

    if(isset($_POST['submit_create'])){ 
       $error=""; 
       $email="";	   
			$code=$_POST['code'];
			$first_name=$_POST['first_name'];
			$last_name=$_POST['last_name'];
			$gender=$_POST['sex'];
			$sex=$_POST['sex'];
			$phone=$_POST['phone'];
			$type=$_POST['type'];
			$email=$_POST['email'];
			$address=$_POST['address'];
			$password=$_POST['password'];
			$username=$_POST['username'];
			if($code && $first_name && $last_name && $gender && $sex && $phone && $type && $email && $password && $username && $address){
			   $sql="insert into hired values('".$code."','".$first_name."','".$last_name."','".$gender."','".$type."','".$address."','".$phone."','".$email."','".$username."','".$password."')";
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
		
		  <form action="p_add_search.php" method="post"class="second_form">
			<fieldset>
			<legend><h4>Searching Item</h4></legend>
				<input type="text"placeholder="Item Number"name="code"></br>
				<input type="submit"value="Search"name="submit_search"id="shrink">
				<input type="reset"value="Reset"id="shrink">
			</fieldset>
		</form>
		 <form class="former_form">
			<fieldset>
			<legend><h4>Detailed Information here...</h4></legend>
			<table class="table">
			<tr>
			<th>Item No</th>
			<th>Item Name</th>
			<th>Item Type </th>
			<th>Quality</th>
			<th>unit Price</th>
			<th>Total Price</th>
			<th>Update/Delete</th>
			</tr>
			    <?php
				  if(isset($_POST['submit_search'])){ 
	
	         $error="";
		     $code=$_POST['code'];
		    if($code){
		            $sql1="select * from item where Item_No='".$code."'";
				   $result1=mysql_query($sql1);
				   if( $result1){
				        $row=mysql_fetch_assoc($result1);
						echo "<tr>";
						echo "<td>".$row['Item_No']."</td>";
					echo "<td>".$row['Item_Name']."</td>";
					echo "<td>".$row['Item_Type']."</td>";
					echo "<td>".$row['Quantity']."</td>";
					echo "<td>".$row['Unit_Price']."</td>";
					echo "<td>".$row['Total_Price']."</td>";
						echo "<td><a href=\"p_delete_item.php?value=$code\">Delete</a></td>";
					    echo "</tr>";
				       }else{
					   $error="Error occured 404";
					        }
		      }else{
			  $error="please insert merchant code....";
			       }
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