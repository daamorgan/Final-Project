<?php
session_start();
$user=$_GET['user'];
$pass=$_GET['password'];
function verifyMe($name,$password){
    $host = getenv('IP');
$username = 'lab7_user';
$password = 'Info2180-7';
$dbname = 'ProjectFinal';
    $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $checkLoginQuery = "SELECT `id`, `firstname`, `lastname` FROM `Users` WHERE `username`='$username";
    $stmt = $conn->query($checkLoginQuery);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result)
    {
        $_SESSION["user_id"] = $result['id'];
        $_SESSION["firstname"] = $result['firstname'];
        $_SESSION["lastname"] = $result['lastname'];
    }
    else 
    {
        return false;
    }
}
if(verifyMe($user,$pass)){
    echo "Welcome  to the  BugMe Tracker Application";
}
else{
    echo "Attempt has failed please try again";
}
?>