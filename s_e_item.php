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
				<li ><a href="s_check_i.php">Check Item</a></li>
				<li class="separator"></li>
				<li><a href="s_dis.php">Distribute Items</a></li>
				<li class="separator"></li>
				<li><a href="admin_search.php">Return Items</a></li>
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
				&nbsp &nbsp  &nbsp &nbsp &nbsp <p><a href="s_p_item.php">List Of Purchased Item</a></p>
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
				  $sql1="select * from item";
				   $result1=mysql_query($sql1);
				   if( $result1){
				       while($row=mysql_fetch_assoc($result1)) {
				       	  echo "<tr>";
						echo "<td>".$row['Item_No']."</td>";
										echo "<td>".$row['Item_Name']."</td>";
					echo "<td>".$row['Item_Type']."</td>";
					echo "<td>".$row['Quantity']."</td>";
					echo "<td>".$row['Unit_Price']."</td>";
					echo "<td>".$row['Date']."</td>";
						
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