<?php
session_start();
//call destroy session to close session
if(session_destroy())
{
header("Location: login.php");
}
?>