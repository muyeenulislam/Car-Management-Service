<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: adminlogin.php");
    die();
}
include 'config.php';


$client_id=$_GET['client_id'];


        $newsql= "DELETE FROM client_rent where $client_id=client_id";
        $newquery= mysqli_query($conn,$newsql);
        if($newquery){
        
            header('location: viewrenters.php ');
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

?>