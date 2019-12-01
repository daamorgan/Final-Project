<?php
session_start();
$user=filter_input(INPUT_GET,'user',FILTER_SANITIZE_SPECIAL_CHARS);
$pass=filter_input(INPUT_GET,'password',FILTER_SANITIZE_SPECIAL_CHARS);
function verifyMe($name,$pass){
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';
    $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $checkLoginQuery = "SELECT `id`, `firstname`, `lastname`,'email' FROM `Users` WHERE `email`='$user'";
    $stmt = $conn->query($checkLoginQuery);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    header("Location:localhost:8080/homepage.html?username="+$user+"&Admin=true");
    echo"You have been properly verified";
}
elseif(verifyMe($user,$pass)&& $user!="admin@bugme.com"){
    header("Location:localhost:8080/homepage.html?username="+$user+"&Admin=false");
}
else{
    echo "Attempt has failed please try again";
}
?>
