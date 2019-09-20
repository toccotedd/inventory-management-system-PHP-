<?php
   session_start();
   include "./connect.php";
 
   $code=$_GET['value'];
   if( $code){
      
	                  $sql="delete from item where Item_No='".$code."'";
					  $result=mysql_query($sql);
	                  header("location:p_add_search.php");

                       }
     
?>
