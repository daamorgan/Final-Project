<?php 
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';
    $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $checkLoginQuery = "SELECT `firstname`, `lastname` FROM `Users`";
    $stmt = $conn->query($checkLoginQuery);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <<link rel="stylesheet" type="text/css" href="styling.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    </head>
    <body>
         <h1>Create Issue</h1>
         <br>
         
         <form action="IssueHandler.php" method="POST">
        <label for="Title:">Title</label>
        <input type="text" required>
         <br>
         
        <label for="Description:">Description</label>
        <textarea rows="4" cols="50" required> </textarea>
        <br>
        
        <label for="Assigned To:">Assigned To</label>
        <select id = "Assigned to" required>
         <?php foreach($result as $row):?>
         <option><?=$row['firstname'].$row['lastname']?></option>
          <?php endforeach;?>         
        </select>
       <br>
        
        <label for="Type:">Type</label>
        <select id = "Type" required>
            <option value = "Bug">Bug</option>
            <option value  = "Proposal">Proposal</option>
            <option value = "Task">Task</option>
        </select>
        <br>
 
        <label for="Priority:">Priority</label>
        <select id = "Priority" required>
            <option value = "Major">Major</option>
            <option value  = "Minor">Minor</option>
            <option value = "Critical">Critical</option>
        </select>
        <br>
        <button id="click" type="submit">Submit</button>
         </form>
     </div>
    </body>
</html>
