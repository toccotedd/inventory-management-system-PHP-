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
				<li><a href="e_change_p.php">Change Password</a></li>
				<li class="separator"></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
		<div class="background">
			<div id="services">
	<h1>Welcome to Admin page................</h1>
			</div>
		</div>
	</div> <!-- /#contents -->
</body>
</html>