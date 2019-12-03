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
      $id = $_SESSION['user_id'];
      if (!(empty($filterOption)) &&  isset($filterOption)) {
        if ($filterOption==="all"|| $filterOption==="startup"){
        	result("SELECT I.id, I.title, I.type, I.status, U.firstname ,U.lastname, I.created FROM Issue I Join Users U ON I.assigned_to=U.id",$conn);
        }elseif ($filterOption==="open"){
          result("SELECT I.id, I.title, I.type, I.status, U.firstname ,U.lastname, I.created FROM Issue I Join Users U ON I.assigned_to=U.id AND status='open';",$conn);  //need to fix
        }elseif ($filterOption==="mytickets"){
        	result("SELECT * from Issue WHERE assigned_to=$id", $conn);
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
            echo "<p>#$id <a class=issueTitle href=# onclick=JobDetails(event) id=$id> $title </a>"; ?> </td>
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
          <?php if ($_SESSION["admin"]){
      ?> <td> <?=$_SESSION["firstname"]." ".$_SESSION["lastname"];?> </td> <?php
    }else{
  ?><td><?=$row["firstname"]." ".$row["lastname"];?></td><?php
}
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

if ($_SESSION["admin"]){
  ?> <td> <?=$_SESSION["firstname"]." ".$_SESSION["lastname"];?> </td> <?php
}else{
  ?><td><?=$row["firstname"]." ".$row["lastname"];?></td><?php
}
