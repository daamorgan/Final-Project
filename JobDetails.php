<?php
	session_start();
	$host = getenv('IP');
	$username = 'admin';
	$password = 'Bugme123';
	$dbname = 'ProjectFinal';

    try{ 
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_SERVER['REQUEST_METHOD']==='GET'){
        $issue_id=$_SESSION['id'];
        $id=(int)$issue_id;
      if(!(empty($issue_id)) &&  isset($issue_id)&& empty($_GET['status'])) {
         $results= getResults($conn,$id);
        displayContent($results,$conn);
      }else if($_GET['status']==="Closed") {
        updateStatusDate($_GET['status'],$id,$conn);
        $results=getResults($conn,$id);
        displayContent($results,$conn);
      }else if ($_GET['status']==="Progress"){
        updateStatusDate($_GET['status'],$id,$conn);
        $results=getResults($conn,$id);
        displayContent($results,$conn);
      }    
    }
    }catch(PDOException $e) { 
    echo "Connection failed: " . $e->getMessage(); 

}

function getResults($db,$issueID){
   $stmt = $db-> query("SELECT * FROM Issue WHERE id=$issueID");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $results;
}

function updateStatusDate($status,$id,$db){
    if($status==="Progress"){
        $status="In ".$status;
    }
    $db-> query("UPDATE Issue SET status='$status' WHERE id=$id");
    $update=date('F j, Y')." - ".date('h:iA');
    $db-> query("UPDATE Issue SET updated='$update' WHERE id=$id");
}

  
 function displayContent($content,$db){
     foreach ($content as $details){
        $arr=assignVariables($details,$db);
        ?>
        
        <h1 id=title><?= $arr['title'];?> </h1>
        <h4><?="Issue#".$arr['id'];?> </h4>
        <div id=flex>
            <div id=description>
                <p id=JobDetails><?=$arr['description'];?></p>  
                 <p><?=">Issue created on ".$arr['dateTimeCreated']. " by ".$arr['createdBy']?></p>
                 <p id=update><?=">Last updated on ".$arr['dateTimeUpdated'];?> </p>
             </div>
            <div id=rightSide> 
                <ul id=sidebox>
                    <li><?="<span>Assigned To</span><br>".$arr['assigned_to'];?></li>
                    <li><?="<span>Type:</span><br>".$arr['type'];?></li>
                    <li><?="<span>Priority:</span><br>".$arr['priority'];?></li>
                    <li><?="<span>Status:</span><br>".$arr['status'];?></li>
                </ul>
                <button id=closed class=btn>Mark as Closed</button>
                <br>
                <button id=progress class=btn>Mark in Progress</button>
            </div>
        </<div>     

         <?php
     }

 }
 
 function assignVariables($details,$db){
     $i=0;
     $arr=array();
     while($i===0){
        $arr['title']=$details['title'];
        $arr['id']=$details['id'];
        $arr['description']=$details['description'];
        
        (int)$assign=$details['assigned_to'];
        $assigned_to=getUserNames($assign,$db);
        $arr['assigned_to']=$assigned_to;
        
        $arr['type']=$details['type'];
        $arr['priority']=$details['priority'];
        $arr['status']=$details['status'];
        
        $created=$details['created'];
        $arrayCreated=explode("-",$created);
        $dateTimeCreated=addAt($arrayCreated);
        $arr['dateTimeCreated']=$dateTimeCreated;
        
        (int)$created_by=$details['created_by'];
        $createdBy=getUserNames($created_by,$db);
        $arr['createdBy']=$createdBy;
        
        $updated=$details['updated'];
        $arrayUpdated=explode("-",$updated);
        $dateTimeUpdated=addAt($arrayUpdated);
        $arr['dateTimeUpdated']=$dateTimeUpdated;
        
        $i=$i+1;
     }
     return $arr;
 }
 
 function addAt($arr){
     $date=$arr[0];
     $time=$arr[1];
     $new=$date." at ".$time;
     return $new;
 }
 
 function getUserNames($user_id,$pdo){
    $stmt1=$pdo->query("SELECT firstname,lastname FROM Users WHERE id=$user_id");
    $results=$stmt1->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $details){
        $first_name=$details['firstname'];
        $last_name=$details['lastname'];    
    }
    return $first_name." ".$last_name;

 }

 
