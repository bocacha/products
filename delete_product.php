<?php
//Removed Session due to mandatory instructions, denying alerts/messages to be displayed
//session_start();
include("db.php");

if(isset($_POST['mass_delete'])) {
  $all_id = $_POST['check_list'];
  $extract_id = implode(",",$all_id);
  $query = "DELETE FROM products WHERE id IN ($extract_id)";
  $result = mysqli_query($conn, $query);
  if($result){
    //$_SESSION['status'] = "Products Deleted Successfully";
    header("Location: index.php");
  }else{
    //$_SESSION['status'] = "Products Deletion Failed";
    header("Location: index.php");
  }


}

?>