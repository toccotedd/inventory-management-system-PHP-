<?php
   session_start();
   include "./connect.php";  
  if(isset($_SESSION['username'])){
      $sql="select * from admin where username='".$_SESSION['username']."' and type='Admin'";
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
				<li ><a href="check_i.php">Check Item</a></li>
				<li class="separator"></li>
				<li><a href="admin_manage.php">Add Employee</a></li>
				<li class="separator"></li>
				<li><a href="emp_search.php">Search Employee</a></li>
				<li class="separator"></li>
				<li><a href="approve_item.php">Approve Item</a></li>
				<li class="separator"></li>
				<li><a href="chenge_password.php">C.Password</a></li>
				<li class="separator"></li>
				<li><a href="admin_user.php">User</a></li>
				<li class="separator"></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
		<div class="background">
			<div id="services">
		
		  <form action="emp_search.php" method="post"class="second_form">
			<fieldset>
			<legend><h4>Searching Employee</h4></legend>
				<input type="text"placeholder="Id"name="code"></br>
				<input type="submit"value="Search"name="submit_search"id="shrink">
				<input type="reset"value="Reset"id="shrink">
			</fieldset>
		</form>
		 <form class="former_form">
			<fieldset>
			<legend><h4>Detailed Information here...</h4></legend>
			<table class="table">
			<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Qualification</th>
			<th>DOB</th>
			<th>sex</th>
			<th>Phone number</th>
			<th>user type</th>
			<th>username</th>
			<th>password</th>
			<th>Delete</th>
			</tr>
			    <?php
				  if(isset($_POST['submit_search'])){ 
	
	         $error="";
		     $code=$_POST['code'];
		    if($code){
		            $sql1="select * from admin where Id='".$code."'";
				   $result1=mysql_query($sql1);
				   if( $result1){
				        $row=mysql_fetch_assoc($result1);
						echo "<tr>";
						echo "<td>".$row['Name']."</td>";
					echo "<td>".$row['Address']."</td>";
					echo "<td>".$row['Qualification']."</td>";
					echo "<td>".$row['Age']."</td>";
					echo "<td>".$row['Sex']."</td>";
					echo "<td>".$row['Phone_number']."</td>";
					echo "<td>".$row['type']."</td>";
					echo "<td>".$row['username']."</td>";
					echo "<td>".$row['password']."</td>";
						echo "<td><a href=\"delete_emp.php?value=$code\">Delete</a></td>";
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