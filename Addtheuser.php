<?php
$the_day= date('Y-m-d');
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';
$name1=filter_input(INPUT_GET,'firstname',FILTER_SANITIZE_SPECIAL_CHARS);
$name2=filter_input(INPUT_GET,'lastname',FILTER_SANITIZE_SPECIAL_CHARS);
$email=filter_input(INPUT_GET,'email',FILTER_SANITIZE_SPECIAL_CHARS);

    $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $word=password_hash($_GET["password"],PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO Users(firstname,lastname,password,email,date_joined)
    VALUES(?,?,?,?,?)");
    $stmt->execute([$name1, $name2, $password, $email, $the_day]);


?>
