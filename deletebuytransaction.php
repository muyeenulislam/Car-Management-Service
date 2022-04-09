<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: adminlogin.php");
    die();
}
include 'config.php';


$transaction_id=$_GET['transaction_id'];


        $newsql= "DELETE FROM buy_transactions where transaction_id='$transaction_id'";
        $newquery= mysqli_query($conn,$newsql);
        if($newquery){
        
            header('location: viewbuytransactions.php ');
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

?>