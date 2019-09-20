<?php
   session_start();
   include "./connect.php";  
  if(isset($_SESSION['username'])){
      $sql="select * from admin where username='".$_SESSION['username']."' and type='store'";
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
				<li ><a href="s_check_i.php">Check Item</a></li>
				<li class="separator"></li>
				<li><a href="admin_manage.php">Distribute Items</a></li>
				<li class="separator"></li>
				<li><a href="s_return.php">Return Items</a></li>
				<li class="separator"></li>
				<li><a href="s_item_record.php">Record Item</a></li>
				<li class="separator"></li>
				<li><a href="s_report.php">Report</a></li>
				<li class="separator"></li>
				<li><a href="s_change_p.php">Change Password</a></li>
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
			<th>Date</th>
			</tr>
			    <?php
				  $sql1="select * from item_req where return_or='yes'";
				   $result1=mysql_query($sql1);
				   if( $result1){
				       while($row=mysql_fetch_assoc($result1)) {
				       	  echo "<tr>";
						echo "<td>".$row['item_no']."</td>";
					
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
				
				
			</div>
		</div>
	</div> <!-- /#contents -->
</body>
</html>