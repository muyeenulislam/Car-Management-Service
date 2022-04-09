<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
    header("Location: adminlogin.php");
    die();
}
include 'config.php';


$userid=$_GET['userid'];


        $newsql= "DELETE FROM deleteid where $userid=userid";
        $newquery= mysqli_query($conn,$newsql);
        if($newquery){
        
            header('location: viewusers.php ');
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        

?>