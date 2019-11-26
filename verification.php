<?php
session_start();
$user=$_GET['user'];
$pass=$_GET['password'];
function verifyMe($name,$pass){
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';
    $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $checkLoginQuery = "SELECT `id`, `firstname`, `lastname`,'email' FROM `Users` WHERE `email`='$username";
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
if(verifyMe($user,$pass)&& $user=="admin@bugme.com"){
    header("Location:localhost:8080/Issue.php?Admin=true");
}
elseif(verifyMe($user,$pass)&& $user!="admin@bugme.com"){
    header("Location:localhost:8080/Issue.php?Admin=false");
}
else{
    echo "Attempt has failed please try again";
}
?>