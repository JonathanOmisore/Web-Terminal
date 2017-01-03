<?php
session_start();
$_SESSION['home'] = getcwd();
if($_SERVER['REQUEST_METHOD'] == "POST")

{

if(isset($_SESSION["dir"]))
{
echo $_SESSION['dir'];
}
else{
	
	echo $_SESSION['home'];
	
}
}
?>
