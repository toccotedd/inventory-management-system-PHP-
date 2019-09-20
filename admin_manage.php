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

    if(isset($_POST['submit_create'])){ 
       $error=""; 
        $error1=""; 
       $email="";	   
			$name=$_POST['name'];
			$gender=$_POST['sex'];
			$address=$_POST['address'];
			$phone=$_POST['phone'];
			$type=$_POST['type'];
			$age=$_POST['age'];
			$qualification=$_POST['qualification'];
			$password=$_POST['password'];
			$username=$_POST['username'];
			if($name && $gender && $qualification && $phone && $type && $age && $password && $username && $address){
			   $sql="insert into admin values(NULL,'".$name."','".$address."','".$qualification."','".$age."','".$gender."','".$phone."','".$type."','".$username."','".$password."')";
			   $result=mysql_query($sql);
			   if($result){
			     $error="Account Created Successfully"; 
			              }else{
						  echo(mysql_error());
						       }
			   }else{
			    $error1="please fill all fields..."; 
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
	<script language="javascript"type="text/javascript">
function letteronly(){
  var charCode=event.keyCode;
  if((charCode > 64 && charCode<91 )|| (charCode > 96 && charCode <123)|| charCode==32)
    return true;
  else
    return false;
}
</script>
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
		<form action="admin_manage.php" method="post"class="signup_form">
			<fieldset>
			<legend><h3>CREATING ACCOUNT!</h3></legend>
			<i><center><font color="green"size="2px"><?php if(isset($_POST['submit_create'])) echo "".$error.""; ?></font></center></i>
		    <i><center><font color="red"size="2px"><?php if(isset($_POST['submit_create'])) echo "".$error1.""; ?></font></center></i>
			<input type="text"placeholder="Name"name="name"onKeyPress="return letteronly(event)" ></br>
			<input type="text"placeholder="Address"name="address"></br>
				<select name="sex"style="width:306px;height:40px;margin-top:15px;">
			<option value="">Select Sex</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			</select></br>
			<input type="text"placeholder="phone"name="phone"></br>
			<input type="date"placeholder="Date Of Birth"name="age"></br>
			<input type="text"placeholder="qualification"name="qualification"></br>
			<input type="text"placeholder="username"name="username"></br>
			<input type="password"placeholder="password"name="password"></br>
			<select name="type"style="width:306px;height:40px;margin-top:15px;">
			<option value="">Select Type</option>			
			<option value="store">store man</option>
			<option value="Property">Property registration and control</option>
			<option value="Property_Expert">Property expert</option>
			<option value="Technical">Technical committee</option>
			</select></br>
				
				<input type="submit"value="Create"name="submit_create"id="shrink">
				<input type="Reset"value="Clear"id="shrink">
			</fieldset>
			</form>
				
				
				
			</div>
		</div>
	</div> <!-- /#contents -->
</body>
</html>