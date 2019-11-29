<?php
$the_day= Date('Y-m-d');
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';
if(preg_match("[a-zA-Z0-9]",$_GET["password"])){
    $connect=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $word=password_hash($_GET["password"],PASSWORD_DEFAULT);
    $stmt = $conn->query("INSERT INTO Users(id, firstname,lastname,password,email,date_joined)
    VALUES($_GET[firstname],$_GET[lastname],$word,$_GET[email],$the_day)");
}
else
    echo "Password does not meet all necessary requirements"

?>
