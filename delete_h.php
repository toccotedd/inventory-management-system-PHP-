<?php
   session_start();
  require_once('Connections/localhost.php'); 
 
   $code=$_GET['value'];
   if( $code){
      
	                  $sql="delete from idcard where IDCARD='".$code."'";
					  $result=mysql_query($sql);
	                  header("location:emp_search.php");

                       }
     
?>
