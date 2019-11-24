<?php
	session_start();
	$host = getenv('IP');
	$username = 'lab7_user';
	$password = 'Info2180-7';
	$dbname = 'ProjectFinal';

    try{ 
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_SERVER['REQUEST_METHOD']==='GET'){
      if (!(empty($_GET["filter"])) &&  isset($_GET["filter"])) {
        $filterOption =$_GET["filter"];
        if ($filterOption==="all"){
        	$result("SELECT title, type, status, assigned_to FROM Issue",$conn);
        }else if ($filterOption==="open"){
        $result("SELECT title, type, status,assigned_to FROM Issues WHERE status='open'",$conn);  //need to fix
        }else{
        	$user= $_SESSION['firstname']." ". $_SESSION['lastname'];
        $result("SELECT title, type, status,assigned_to FROM Issues WHERE assigned_to=" . $user,$conn);

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
      </tr>
        <?php foreach ($list as $row):?>
        <tr>
          <td><?= $row["title"];?></td>
          <td><?= $row["type"];?></td>
          <td><?= $row["status"];?></td>
          <td><?= $row["assigned_to"];?></td>
        </tr>
        <?php endforeach; ?>
    </table><?php
};
