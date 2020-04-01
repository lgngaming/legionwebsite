<?php
include('../includes/header.php');
include_once('../log.php');
$configarr = $config['app'];
$adminemail = $configarr['adminEmail'];
$email = $_REQUEST['email'];
echo '<h1>Removing User</h1>';
$sthandler = $db->prepare("SELECT email FROM users WHERE email = :email");
$sthandler->bindParam(':email', $email);
$sthandler->execute();


//IF EMAIL IS ADMIN EMAIL
if ( $email == $adminemail ) 
{
echo "<script type='text/javascript'>alert(\"Error: Cannot remove admin email\")</script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../secure/memberlist.php">';

}

//ELSE, EXECUTE DELETE
else {
$stmt = $db->prepare("DELETE FROM `users` WHERE `email` = :email");
if($stmt->execute( array( ":email" => $email ) )){
logMsg("Login User: ".$email ."has been deleted");
}
else {
throw new Exception("Error deleting login user" .$email);	
}

if($GLOBALS['debug'] == 1) {
echo 'Click <a href="./index.php">Here</a> to return';	
}
else {
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
}

}
?>
