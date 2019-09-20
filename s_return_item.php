<?php
   session_start();
   include "./connect.php";
 
   $code=$_GET['value'];
   if( $code){
      
	                  $sql="update item_req set return_or='yes' where id='".$code."'";
					  $result=mysql_query($sql);
	                  header("location:s_return.php");
                       }
     
?>