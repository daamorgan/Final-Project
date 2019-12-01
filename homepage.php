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
      $filterOption =$_GET["filter"];
      if (!(empty($filterOption)) &&  isset($filterOption)) {
        if ($filterOption==="all"|| $filterOption==="startup"){
        	result("SELECT I.id, I.title, I.type, I.status, U.firstname ,U.lastname, I.created FROM Issue I Join Users U ON I.assigned_to=U.id",$conn);
        }elseif ($filterOption==="open"){
          result("SELECT I.id, I.title, I.type, I.status, U.firstname ,U.lastname, I.created FROM Issue I Join Users U ON I.assigned_to=U.id AND status='open';",$conn);  //need to fix
        }elseif ($filterOption==="mytickets"){
        	$user= $_SESSION['firstname']." ". $_SESSION['lastname'];//MAY NEED TOp CHANGE THIS
          result("SELECT I.id, I.title, I.type, I.status, U.firstname ,U.lastname, I.created FROM Issue I Join Users U ON I.assigned_to=U.id AND assigned_to='$user'" ,$conn);
        }else{
          $_SESSION['id']=$_GET['filter'];
        }
          
        }
    }
}catch(PDOException $e) { 
    echo "Connection failed: " . $e->getMessage(); 
}
function result($querysql,$pdo){
    $stmt = $pdo->query($querysql);
    $list=$stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table>
      <tr>
        <th><?= "Title";?></th>
        <th><?= "Type";?></th>
        <th><?= "Status";?></th>
        <th><?= "Assigned to";?></th>
        <th><?= "Created";?></th>
      </tr>
        <?php foreach ($list as $row):?>
        <tr>
          <td>
            <?php 
            $id=$row["id"];
            $title=$row["title"];
            echo "<p>#$id <a class=issueTitle href=JobDetails.html id=$id>$title</span></a>"; ?></td>
          <td><?= $row["type"];?></td>
          <td>
            <?php $status=strtoupper($row["status"]);
if ($status=="OPEN"){
   echo "<p class=green>$status </p>";
}elseif ($status=="CLOSED"){
  echo "<p class=red >$status </p>";
}else{
   echo "<p class=yellow>$status </p>";
}?></td>
          <td><?=$row["firstname"]." ".$row["lastname"];?></td>
          <td><?php
          $created=$row['created'];
          $arr=explode("-",$created);
          $date=$arr[0];
          $s=date_create($date);
          echo date_format($s,"Y-m-d");
          ?></td>
        </tr>
        <?php endforeach; ?>
    </table><?php
};

