<?php
//index.php
include('data4.php');

if(!isset($_SESSION["type"]))
{
 header("location: login.php");
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>online</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
div.click-to-top {
display:inline-block;
position:relative;
max-width:160px;
margin-left:10%
}

div.click-to-top:hover{
z-index:10;
}

div.click-to-top img{
-webkit-transition: all 0.8s;
moz-transition: all 0.8s;
transition: all 0.8s;
width:130px;
}

div.click-to-top img:hover{
width:140px;
z-index:10;
}

div.click-to-top span {display: none; position: absolute; bottom: 0; left: 0; right: 0; background: #fff; color: #333; }
div.click-to-top:hover span {display: block; }
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Online Portal</h2>
   <br />
   <div align="right">
    <a href="logout.php">Logout</a>
   </div>
   <br />
   <?php
   if($_SESSION["type"] =="user")
   {
    echo '<div align="center"><h2>Hi... Welcome '.$_SESSION['mail'].'</h2></div>';
	echo '<div id="user_login_status" class="panel-body">Loading....</div>';
	
   }
   else
   {
   ?>
   <div class="panel panel-default">
    <div class="panel-heading">Online User Details</div>
    <div id="user_login_status" class="panel-body">

    </div>
   </div>
   <?php
   }
   ?>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
<?php
if($_SESSION["type"] == "user")
{
?>
function update_user_activity()
{
 var action = 'update_time';
 $.ajax({
  url:"action1.php",
  method:"POST",
  data:{action:action},
  success:function(data)
  {
    $('#user_login_status').html(data);
  }
 });
}
setInterval(function(){ 
 update_user_activity();
}, 3000);


<?php
}
else
{
?>
fetch_user_login_data();
setInterval(function(){
 fetch_user_login_data();
}, 3000);
function fetch_user_login_data()
{
 var action = "fetch_data";
 $.ajax({
  url:"action1.php",
  method:"POST",
  data:{action:action},
  success:function(data)
  {
   $('#user_login_status').html(data);
  }
 });
}
<?php
}
?>

});
</script>