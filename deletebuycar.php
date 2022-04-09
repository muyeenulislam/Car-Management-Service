<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: adminlogin.php");
    die();
}
include 'config.php';


$id=$_GET['id'];


        $newsql= "DELETE FROM buy_car where $id=id";
        $newquery= mysqli_query($conn,$newsql);
        if($newquery){
        
            header('location: viewbuycars.php ');
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

?>