<?php
   session_start();
   include "./connect.php";
 
   $code=$_GET['value'];
   if( $code){
      
	                  $sql="update item_req set approve='yes 'where id='".$code."'";
					  $result=mysql_query($sql);
	                  header("location:approve_item.php");
                       }
     
?>