<?php
   session_start();
   include "./connect.php";
  if(isset($_POST['submit_login'])){ 
          $error="";
         $username=$_POST['username'];
         $password=md5($_POST['password']);
         $type=$_POST['type'];
           if($username && $password ){
            $sql="select * from admin where username='".$username."' and password='".$password."'";
            $result=mysql_query($sql);
            if(mysql_num_rows($result) > 0){
               $row=mysql_fetch_assoc($result);
               $error="logged in success";
               $_SESSION['username']=$row['username'];
               if($type=="Admin"){
                  header("location:admin.php");
               }
               if($type=="store"){
                  header("location:store.php");
               }
               if($type=="Property"){
                  header("location:Property.php");
               }
                if($type=="Property_Expert"){
                  header("location:Property_e.php");
               }
                if($type=="Technical"){
                  header("location:technical.php");
               }
            
            }else{
                             $sql2="select * from employee where username='".$username."' and password='".$password."'";
                             $result2=mysql_query($sql2);
                             if(mysql_num_rows($result2) > 0 && $type='Employee'){
                                   $row2=mysql_fetch_assoc($result2);
                                    $_SESSION['username']=$row2['username'];
                                    header("location:employee.php");
                                 }else{
                                      $error="There is Not such Account...";
                                      }
                                    
                                                           }
           }else{
           $error="pls fill all fields";
           }
         }
   ?>
<html>
<head>
<link href="loginpage.css"type="text/css"rel="stylesheet">
<script src="./js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script src="./js/superfish.js" type="text/javascript"></script>
<!-- SLIDER CONTROLLER-->
<link rel="stylesheet" type="text/css" href="./css/nivo-slider.css" media="screen" />
<script type="text/javascript" src="./Slider_js/jquery.nivo.slider.js"></script>
<!--custtom script -->
<script src="./Slider_js/custom.js" type="text/javascript"></script>
<style>
.nivoSlider {
  position:relative;
    width:754;
    height:350px;
  background-color:#123456;
  margin:20px 0 0 0px;
}
</style>
</head>
<body>
<div class="page">
	<div class="header">
		bhhjbg
	</div>
	<div class="main">
         <div class="left">
         	<div class="featured">
      <div id="slider-wrapper">
          <div id="slider" class="nivoSlider"> 
      <img src="./images/e1.jpg" alt="Image" title="#htmlcaption1"/> 
      <img src="./images/e2.jpg" alt="Image" title="#htmlcaption2"/> 
      <img src="./images/e3.jpg" alt="Image" title="#htmlcaption3"/> 
      <img src="./images/e4.jpg" alt="Image" title="#htmlcaption4"/>
      <img src="./images/e5.jpg" alt="Image" title="#htmlcaption5"/> 
    
      </div>

        </div>
       </div> 
         	<div content>
         		<h1>Mission</h1>
         		<p>bcuvbhfbvfhgbvhgfcbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvh</p>
         		<p>bcuvbhfbvfhgbvhgfcbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvh</p>
         		<p>bcuvbhfbvfhgbvhgfcbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvh</p>
         	</div>
         	<div content>
         		<h1>Mission</h1>
         		<p>bcuvbhfbvfhgbvhgfcbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvh</p>
         		<p>bcuvbhfbvfhgbvhgfcbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvh</p>
         		<p>bcuvbhfbvfhgbvhgfcbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvh</p>
         	</div>
         </div>
         <div class="right">
        <div id="login_form">
        	<h1>Login Form</h1>
					    <form action="index.php"method="post">
                    	<label for="login">Username:</label>
                    	<input type="text" class="fields" name="username" title="Enter username here"  />
                        <div class="clear"></div>
                        <label for="login">Password:</label>
                        <input type="password" class="fields" name="password"  title="Enter Password here"  autocomplete="off"/>
                        <div class="clear"></div>
                        <label for="login">User Type:</label>
						    	<select name="type" style="width:260px;height:34px;margin-top:5px;">
                    	          <option value="Admin">Admin</option>
                    	          <option value="Property">Property registration and control</option>
                    	          <option value="Property_Expert">Property Expert</option>
                    	          <option value="store">store</option>         
                                  <option value="Technical">Technical</option>
                                  <option value="Employee">Employee</option>
                                  
                                 	</select>
                     <div id="space_div"></div>
                        <input type="submit" class="button" name="submit_login" value="Log in" /></br>
                        <p style="margin-left:220px;"><a href="new_user.php">Create Account </a></p>
                        <center><font color="red"size="5px"><?php if(isset($_POST['submit_login'])) echo "".$error.""?></font></center>
                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                         </form>						
                    
                    </div>
         </div>
	</div>
<div class="footer">
<p>we are interested in this</p>
</div>
</div>
</body>
</html>