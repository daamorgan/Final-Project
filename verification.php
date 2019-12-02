<?php
session_start();
$user=filter_input(INPUT_GET,'user',FILTER_SANITIZE_EMAIL);
$pass=filter_input(INPUT_GET,'password',FILTER_SANITIZE_SPECIAL_CHARS);
$host = getenv('IP');
$username = 'admin';
$password = 'Bugme123';
$dbname = 'ProjectFinal';
$conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$checkLoginQuery = "SELECT id, firstname, lastname, email, password FROM Users WHERE email='$user'";
$stmt = $conn->query($checkLoginQuery);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!(empty($result)) && password_verify($pass,$result['passowrd'])){
      if ($user==="admin@bugme.com"){
        $_SESSION["admin"]=true;
      }else{
          $_SESSION["admin"]=false;
      }
      $_SESSION["user_id"] = $row['id'];
      $_SESSION["firstname"] = $row['firstname'];
      $_SESSION["lastname"] = $row['lastname'];
       return true;
    }else{
      echo "Invalid username or password";
       return false;
      
  }
}
