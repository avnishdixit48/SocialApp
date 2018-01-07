<?php

$server_name = "localhost"; //servername
$user_name = "root"; //username
$password = ""; //password
$db= 'vertice'; //database name
$conn = mysqli_connect($server_name, $user_name, $password,$db);
 
if(!$conn){
 die("Error Connection");
}
 
//include("connection.php")
if(isset($_POST["email"]) && isset($_POST["password"]))
{
    
   $email=$_POST["email"];
    
   $password=$_POST["password"];
  //  $encrypted_password=md5($_POST["password"]);
  
   $stmt =$conn->prepare("select ID, email, user_id, Name from loginexample where (email='$email'||user_id='$email') && password='$password'");
    $stmt->execute();
	$stmt->bind_result($ID,$email,$user_id,$Name);
	$tb_login=array();
	
	while($stmt->fetch()){
	$temp=array();
	$temp['ID']=$ID;
	$temp['email']=$email;
	$temp['user_id']=$user_id;
	$temp['Name']=$Name;
	
	array_push($tb_login,$temp);
	echo json_encode($tb_login);
	
}

}
echo "invalid credentials" ;
?>
