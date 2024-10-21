<?php
include('session_s.php');

if(!isset($login_session)){
  header('Location: adminlogin.php'); 
}
?>
