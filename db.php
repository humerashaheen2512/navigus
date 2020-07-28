<html>
 <head>
  <title>How Display Users Online using PHP with Ajax JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
.alert {
  padding: 20px;
  background-color: #046b1d;
  color: white;
  text-align: center;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
 </head>
 <body>


<?php
include 'data4.php';
    $email=$_POST['userEmail'];
    $password=$_POST['password'];
    $usertype=$_POST['usertype'];
  $sql1='SELECT * FROM user_details where user_email=?';
  $stmt1=$pdo->prepare($sql1);
  $stmt1->execute([$email]);
  $data=$stmt1->fetchAll();
  if(!$data)
  {
  
  
  $iconBadge = array('002-bear.png', '003-lion.png', '004-badger.png', '006-bird.png', '015-penguin.png');
  
   $sql = "INSERT INTO user_details (user_email, user_password, user_type, user_icon) VALUES (:user_email,:user_password,:user_type,:user_icon)";
   $stmt=$pdo->prepare($sql);
   $stmt->execute([':user_email'=>$email,':user_password'=>$password,':user_type'=>$usertype, ':user_icon'=>$iconBadge[rand(0,4)]]);   
   echo '<div class="alert"><span class="closebtn"></span><strong>SUCCESSFULLY!</strong> REGISTERED SUCCESSFULLY.</div>';
   echo '</br><div style="margin: 0 0 0 47%;"><a  href="login.php" class="btn btn-info" style="text-align: center;">login</a></div>';
 }
 else 
 {
  echo "Email exists!";
 }

?> 
 </body>
</html>