<?php
//login.php
include('data4.php');
if(isset($_SESSION["type"]))
{
 header("location: index.php");
}
$message = '';

if(isset($_POST["login"]))
{
 if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
 {
  $message = "<label>Both Fields are required</label>";
 }
 else
 {
  $query = "
  SELECT * FROM user_details 
  WHERE user_email = :user_email
  ";
  $statement = $pdo->prepare($query);
  $statement->execute(
   array(
    'user_email' => $_POST["user_email"]
   )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if($_POST["user_password"]==$row["user_password"])
    {
     $insert_query = "
     INSERT INTO login_details (
      user_id, last_activity) VALUES (
      :user_id, :last_activity)
     ";
     $statement = $pdo->prepare($insert_query);
     $statement->execute(
      array(
       'user_id'  => $row["user_id"],
       'last_activity' => date("Y-m-d H:i:s")
      )
     );
     $login_id = $pdo->lastInsertId();
     if(!empty($login_id))
     {
      $_SESSION["type"] = $row["user_type"];
	  $_SESSION["user_id"] = $row["user_id"];
      $_SESSION["login_id"] = $login_id;
      $_SESSION["mail"]=$row["user_email"];
	  
	  $update_query = "
     UPDATE `user_details` SET `online_status` = '1' WHERE `user_id` = :user_id;
     ";
     $statement = $pdo->prepare($update_query);
     $statement->execute(
      array(
       'user_id'  => $row["user_id"],
      )
     );
	  
      header("location: index.php");
     }
    }
    else
    {
     $message = "<label>Wrong Password</label>";
    }
   }
  }
  else
  {
   $message = "<label>Wrong Email Address</labe>";
  }
 }
}


?>

<!DOCTYPE html>
<html>
 <head>
  <title>How to display users online using PHP with Ajax JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">How to display users online using PHP with Ajax JQuery</h2>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">Login</div>
    <div class="panel-body">
     <form method="post">
      <span class="text-danger"><?php echo $message; ?></span>
      <div class="form-group">
       <label>User Email</label>
       <input type="text" name="user_email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" name="user_password" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="login" value="Login" class="btn btn-info" />
	   <a  href="first.php" class="btn btn-info">Register</a>
      </div>
     </form>
    </div>
   </div>
  </div>
 </body>
</html>
