<?php
$currentuser=$_GET['username'];
$text=$_POST["text"];
$Assigned=$_POST["Assigned to"];
$Type=$_POST["Type"];
$Priority=$_POST["Priority"];
$description=$_POST["description"];
$the_day= Date('Y-m-d');
$time=Date('h:ia');
$complete_time=$the_day.$time;
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';
    $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $checkLoginQuery = "INSERT INTO Issue(id,title,description,type,priority,status,assigned_to,created_by,created,updated)
    VALUES(1,$text,$description,$Type,$Priority,open,$Assigned,$currentuser,$complete_time,$complete_time);";
    $stmt = $conn->query($checkLoginQuery);
?>
