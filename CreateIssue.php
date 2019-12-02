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
        <link rel="stylesheet" type="text/css" href="styling.css">
        <title> Create New Issue</title>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <div class="Container">
     
     <div class="Top">
       <h3> <i class="fa fa-bug" id="bugIcon"></i>BugMe Issue Tracker</h3>
     </div>
     
     <div class="sides">
        <ul>
            <li> <a href="homepage.html"><i class="fa fa-fw fa-home"></i>Home </a></li>
            <br>
            <li> <a href="adminLogin.html"><i class="fa fa-fw fa-plus"></i>Add User</a></li>
            <br>
            <li> <a href="CreateIssue.php"><i class="fa fa-fw fa-plus"></i>New Issue</a></li>
            <br>
            <li> <a href="Logout.php"> <i class="fa fa-power-off" id="powericon"></i>  Logout</a></li>
        </ul>
     </div>
     
     <div class="Main" id="mainContent">
         <h1>Create Issue</h1>
         <br>
         
         <form action="IssueHandler.php" method="POST" >
        <label for="Title">Title</label>
        <input type="text" id="Title" name="Title" required>
         <br>
         
        <label for="Description">Description</label>
        <textarea name="Description" id="Description" rows="4" cols="50" required> </textarea>
        <br>
        
        <label for="Assigned To">Assigned To</label>
        <select name="Assigned To" id = "Assigned To" required>
         <?php foreach($result as $row):?>
         <option><?=$row['firstname']." ".$row['lastname']?></option>
          <?php endforeach;?>         
        </select>
       <br>
        
        <label for="Type">Type</label>
        <select name = "Type" id="Type" required>
            <option value = "Bug">Bug</option>
            <option value  = "Proposal">Proposal</option>
            <option value = "Task">Task</option>
        </select>
        <br>
 
        <label for="Priority">Priority</label>
        <select name = "Priority" id="Priority" required>
            <option value = "Major">Major</option>
            <option value  = "Minor">Minor</option>
            <option value = "Critical">Critical</option>
        </select>
        <br>
        <button type="submit" id="submitBtn" id=name="submitBtn" class="btn">Submit</button>
         </form>
     </div>
  
</html>
