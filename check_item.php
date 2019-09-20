<?php
   session_start();
   include "./connect.php";
 
   $code=$_GET['value'];
   if( $code){
      
	                  $sql="update item set checked_or='yes' where Item_No='".$code."'";
					  $result=mysql_query($sql);
	                  header("location:check_i.php");
                       }
     
?>