<?php
    include('connection.php');
    $id = $_GET['delid'];
    $que = "SELECT * FROM `task` WHERE `id`='$id'";
    $record=mysqli_query($conn,$que);
    $row=mysqli_fetch_array($record);
 
	unlink('upload/'.$row['image']);
	$sql = "DELETE FROM `task` WHERE `id` = '$id'";
   
    mysqli_query($conn, $sql);
    header("location:display.php");
?>