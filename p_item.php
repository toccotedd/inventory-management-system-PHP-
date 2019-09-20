<?php
   session_start();
   include "./connect.php";
   if(isset($_SESSION['username'])){
      $sql="select * from admin where username='".$_SESSION['username']."' and type='Technical'";
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
  	   
			$item=$_POST['item_name'];
			$body=$_POST['r_body'];
			$reporter=$_SESSION['username'];
			if($item && $body ){
					$sql="Insert INTO item_report VALUES(NULL,'".$item."','".$body."','".$reporter."')";
			   $result=mysql_query($sql);
			   if($result){
			     $error="Report Inserted Successfully"; 
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
				<li ><a href="T_check_i.php">Check Item</a></li>
				<li class="separator"></li>
				<li><a href="T_report.php">Report</a></li>
				<li class="separator"></li>
				<li><a href="T_change_p.php">Change Password</a></li>
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
			<legend><h4>List Items...</h4></legend>
			<table class="table">
			<tr>
			<th>Item No</th>
			<th>Item Name</th>
			<th>Item Type</th>
			<th>Quantity</th>
			<th>Unit Price</th>
		
			<th>Date</th>
			</tr>
			    <?php
				  $sql1="select * from item_req where approve='yes'";
				   $result1=mysql_query($sql1);
				   if( $result1){
				       while($row=mysql_fetch_assoc($result1)) {
				       	  echo "<tr>";
						echo "<td>".$row['item_no']."</td>";
						$no=$row['item_no'];
					echo "<td>".$row['item_name']."</td>";
					echo "<td>".$row['item_type']."</td>";
					echo "<td>".$row['quantity']."</td>";
					echo "<td>".$row['unit']."</td>";
					echo "<td>".$row['date']."</td>";
						
					    echo "</tr>";
				       }
						
				       }else{
					   $error="Error occured 404";
					        }
				
				?>
		    </table>
			</fieldset>
			</form>
		&nbsp &nbsp  &nbsp &nbsp &nbsp <p><a href="e_item.php">List Of Exist Item</a></p>		
				
				
			</div>
		</div>
	</div> <!-- /#contents -->
</body>
</html>