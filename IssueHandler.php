<?php
session_start();
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';

try{
    $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $currentuser=$_SESSION['user_id'];
        $Title = filter_input(INPUT_POST, 'Title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $Assigned = filter_input(INPUT_POST, 'Assigned To', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $Type = filter_input(INPUT_POST, 'Type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $Description = filter_input(INPUT_POST, 'Description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $Priority = filter_input(INPUT_POST, 'Priority', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $A_name=explode(" ",$Assigned);
        $the_day= Date('F j, Y');
        $time=Date('h:iA');
        $complete_time=$the_day." - ".$time;
        $firstquery="SELECT id FROM Users WHERE firstname= '$A_name[0]'";  
        $stmt=$conn->query($firstquery);
        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $detail){
            $Assigned=$detail['id'];
        }
        
        $Additionquery = "INSERT INTO Issue(title,description,type,priority,status,assigned_to,created_by,created,updated)
            VALUES('$Title','$Description','$Type','$Priority','open',$Assigned,$currentuser,'$complete_time','$complete_time')";
        $conn->query($Additionquery);

        include_once 'CreateIssue.html';
    }
}catch(PDOException $e) { 
    echo "Connection failed: " . $e->getMessage();
}
?>



