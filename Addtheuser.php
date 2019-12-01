<?php
$the_day= Date('Y-m-d');
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';
$name1=filter_input(INPUT_GET,'firstname',FILTER_SANITIZE_SPECIAL_CHARS);
$name2=filter_input(INPUT_GET,'lastname',FILTER_SANITIZE_SPECIAL_CHARS);
$email=filter_input(INPUT_GET,'email',FILTER_SANITIZE_SPECIAL_CHARS);
if(preg_match("[a-zA-Z0-9]{8,}",$_GET["password"])){
    $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $word=password_hash($_GET["password"],PASSWORD_DEFAULT);
    $stmt = $conn->query("INSERT INTO Users(id, firstname,lastname,password,email,date_joined)
    VALUES($name1,$name2,$word,$email,$the_day)");
}
else
    echo "Password does not meet all necessary requirements"
?>
