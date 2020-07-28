<?php
//action.php
include('data4.php');
if(isset($_POST["action"]))
{
 if($_POST["action"] == "update_time")
 {
  $query = "UPDATE login_details SET last_activity = :last_activity  WHERE login_details_id = :login_details_id";
  $statement = $pdo->prepare($query);
  $statement->execute(
   array(
    'last_activity'  => date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa'))),
    'login_details_id' => $_SESSION["login_id"]
   )
  );
 }
 if($_POST["action"] == "fetch_data")
 {

  $output = '';
  $query = "SELECT login_details.user_id, user_details.user_email, user_details.user_image,login_details.last_activity FROM login_details 
  INNER JOIN user_details 
  ON user_details.user_id = login_details.user_id 
  WHERE last_activity <= DATE_SUB(NOW(), INTERVAL 5 SECOND) 
  AND user_details.user_type = 'user'
  ";
  $statement = $pdo->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $count = $statement->rowCount();
  $output .= '
  <div class="table-responsive">
   
   <table class="table table-bordered table-striped">
    <tr>
     <th>No.</th>
     <th>User Name</th>
     <th>Last Login</th>
    </tr>
  ';

  $i = 0;
  foreach($result as $row)
  {
   $i = $i + 1;
   $output .= '
   <tr> 
    <td>'.$i.'</td>
    <td>'.$row["user_email"].'</td>
	<td>'.$row["last_activity"].'</td>
   </tr>
   ';
  }
  $output .= '</table></div>';
  echo $output;
 }
}



?>
