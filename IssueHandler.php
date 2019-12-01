<?php
$currentuser=$_GET['username'];
$text=$_POST["text"];
$Assigned=$_POST["Assigned to"];
$A_name=explode(" ",$Assigned);
$Type=$_POST["Type"];
$Priority=$_POST["Priority"];
$description=$_POST["description"];
$the_day= Date('F j, Y');
$time=Date('h:iA');
$complete_time=$the_day." - ".$time;
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';
    $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $firstquery="SELECT id FROM Users WHERE firstname= $A_name[0]";  
    $secquery="SELECT id FROM Users WHERE email= $currentuser";
    $stmt=$conn->query($firstquery);
    $stmt2=$conn->query($secquery);
    $Additionquery = "INSERT INTO Issue(title,description,type,priority,status,assigned_to,created_by,created,updated)
    VALUES($text,$description,$Type,$Priority,open,$Assigned,$currentuser,$complete_time,$complete_time);";
    $stmt3= $conn->query($checkLoginQuery);
?>
