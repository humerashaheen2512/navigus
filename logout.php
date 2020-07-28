<?php
//logout.php
include('data4.php');

$update_query = "
     UPDATE `user_details` SET `online_status` = '0' WHERE `user_id` = :user_id;
     ";
     $statement = $pdo->prepare($update_query);
     $statement->execute(
      array(
       'user_id'  => $_SESSION["user_id"],
      )
     );
session_destroy();
header("location:login.php");
?>