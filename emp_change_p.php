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

 if(isset($_POST['submit_search'])){ 
       $error=""; 
  	   
			$old=md5($_POST['o_password']);
			$new=md5($_POST['n_password']);
			$conf=md5($_POST['c_password']);
			if($old && $new && $conf ){
				if($new==$conf){
					$sql="update employee set password='".$new."' where username='".$_SESSION['username']."'";
			   $result=mysql_query($sql);
			   if($result){
			     $error="password Changed Successfully"; 
			              }else{
						  echo(mysql_error());
						       }
						   }else{
						   	   $error="pls confirm password"; 
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
				<li><a href="e_change_p.php">Change Password</a></li>
				<li class="separator"></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
		<div class="background">
			<div id="services">
	          <form action="emp_change_p.php" method="post"class="signup_form">
			<fieldset>
			<legend><h3>Change Password!</h3></legend>
			<i><center><font color="red"size="2px"><?php if(isset($_POST['submit_search'])) echo "".$error.""; ?></font></center></i>
		    
			<input type="text"placeholder="old Password"name="o_password"></br>
				<input type="text"placeholder="new Password"name="n_password"></br>
				<input type="text"placeholder="confirm Password"name="c_password"></br>
				<input type="submit"value="Change"name="submit_search"id="shrink">
				<input type="reset"value="Reset"id="shrink">
			</fieldset>
			</form>
			</div>
		</div>
	</div> <!-- /#contents -->
</body>
</html>