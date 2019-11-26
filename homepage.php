<?php
//	session_start();
	$host = getenv('IP');
	$username = 'admin';
	$password = 'Bugme123';
	$dbname = 'ProjectFinal';

    try{ 
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_SERVER['REQUEST_METHOD']==='GET'){
      if (!(empty($_GET["filter"])) &&  isset($_GET["filter"])) {
        $filterOption =$_GET["filter"];
        if ($filterOption==="all"){
        	$a=result("SELECT title, type, status, assigned_to, created FROM Issue",$conn);
        	echo $a;
        }else if ($filterOption==="open"){
          result("SELECT title, type, status,assigned_to, created FROM Issue WHERE status='open'",$conn);  //need to fix
        }else{
        	$user= $_SESSION['firstname']." ". $_SESSION['lastname'];//MAY NEED TOp CHANGE THIS
          result("SELECT title, type, status,assigned_to,created FROM Issue WHERE assigned_to='$user'" ,$conn);

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
            $id="#".$row["id"];//id not showing FIX
            $title=$row["title"];
            echo "<p>$id<span class=blueTitle>$title</span></p>"; ?></td>
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
          <td><?= $row["assigned_to"];?></td>
          <td><?= $row["created"];?></td>
        </tr>
        <?php endforeach; ?>
    </table><?php
};

