<?php
$currentuser=$_GET['username'];
$text=$_POST["text"];
$Assigned=$_POST["Assigned to"];
$Type=$_POST["Type"];
$Priority=$_POST["Priority"];
$description=$_POST["description"];
$the_day= Date('Y-m-d');
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';
    $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $checkLoginQuery = "INSERT INTO Issue(id,title,description,type,priority,status,assigned_to,created_by,created,updated)
    VALUES(1,$text,,$Type,$Priority,open,$Assigned,$currentuser,$the_day,$the_day);";
    $stmt = $conn->query($checkLoginQuery);
?>