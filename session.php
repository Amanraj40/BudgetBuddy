<?php
include("config.php");
//Starts a new session or resumes the existing session.
session_start();
//Checks if the email session variable is set. If not, it redirects the user to the login page and exits the script.
if(!isset($_SESSION["email"])){
header("Location: login.php");
exit();
}
//Retrieves the email stored in the session and assigns it to $sess_email.
$sess_email = $_SESSION["email"];
$sql = "SELECT user_id, firstname, lastname, email FROM users WHERE email = '$sess_email'";
//Executes the query using the query method of the $con database connection object.
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  //If rows are returned, fetches each row as an associative array using fetch_assoc.
  //just fetching info of current session can put this info in profile section
  while($row = $result->fetch_assoc()) {
    $userid=$row["user_id"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $username =$row["firstname"]." ".$row["lastname"];
    $useremail=$row["email"];
  }
} else {
    $userid="798";
    $username ="SJEC";
    $useremail="mailid@domain.com"; 
}
?>