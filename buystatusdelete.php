<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php");
    die();
}

include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM user WHERE email='{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query); 
}


$client_id=$_GET['client_id'];


        $newsql= "DELETE FROM client_buy where $client_id=client_id";
        $newquery= mysqli_query($conn,$newsql);
        if($newquery){
        
            header('location: buystatus.php ');
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

?>