<?php
   session_start();
   include "./connect.php";
 
   $code=$_GET['value'];
   if( $code){
      
	                  $sql="delete from admin where username='".$code."'";
					  $result=mysql_query($sql);
	                  header("location:emp_search.php");

                       }
     
?>
