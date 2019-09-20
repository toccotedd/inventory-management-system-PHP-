<?php
   session_start();
   include "./connect.php"; 	
    if(isset($_POST['submit_create'])){ 
       $error=""; 	   
			$emp_id=$_POST['emp_id'];
			$emp_name=$_POST['emp_name'];
			$address=$_POST['address'];
			$facuilty=$_POST['facuilty'];
			$sex=$_POST['sex'];
			$department=$_POST['department'];
			$username=$_POST['username'];
			$password=md5($_POST['password']);

			if($emp_id && $emp_name && $address && $facuilty && $sex && $department && $password && $username){
			   $sql="insert into employee values('".$emp_id."','".$emp_name."','".$address."','".$facuilty."','".$department."','".$sex."','".$username."','".$password."')";
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
			
		</div>
	</div> <!-- /#header -->
	<div id="contents">
		<div class="background">
			<div id="services">
				<a href="index.php">back</a>
		<form action="new_user.php" method="post"class="signup_form">
			<fieldset>
			<legend><h3> &nbsp &nbsp CREATING ACCOUNT ! &nbsp &nbsp</h3></legend>
			<i><center><font color="red"size="2px"><?php if(isset($_POST['submit_create'])) echo "".$error.""; ?></font></center></i>
		    
			<input type="text"placeholder="Employee Id"name="emp_id"></br>
			<input type="text"placeholder="Employee Name"name="emp_name"></br>
			<input type="text"placeholder="Address"name="address"></br>
			<input type="text"placeholder="Facuilty"name="facuilty"></br>
			<select name="department"style="width:306px;height:40px;margin-top:15px;">
			<option value="">Select Department</option>
			<option value="CS">Computer Science</option>
			<option value="IT">Information Technology</option>
			</select></br>
			<select name="sex"style="width:306px;height:40px;margin-top:15px;">
			<option value="">Select Gender</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			</select></br>
			<input type="text"placeholder="Username"name="username"></br>
			<input type="password"placeholder="password"name="password"></br>
			
				<input type="submit"value="Create"name="submit_create"id="shrink">
				<input type="Reset"value="Clear"id="shrink">
			</fieldset>
			</form>
				
				
				
			</div>
		</div>
	</div> <!-- /#contents -->
</body>
</html>