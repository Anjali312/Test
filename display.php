<?php
    include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="index.php">base to dasebord</a>
	<center>
		<table border="2" bgcolor="pink">
			<tr>
				<td>name</td>
				<td>email</td>
				<td>gender</td>
				<td>hobby</td>
				<td>city</td>
				<td>image</td>
				<td>action</td>
			</tr>
			<?php
			     $sql = "SELECT * FROM `task` ORDER BY id DESC LIMIT 10";
			     $run = mysqli_query($conn,$sql);
			     while($row =mysqli_fetch_array($run) ){
			     	
			  //    	$file = 'upload/'.$row["image"];

					// if (!unlink($file)) {
					//   echo ("Error deleting $file");
					// } else {
					//   echo ("Deleted $image");
					// }
			    
            ?>
            <tr>
            	<td><?php echo $row['name']?></td>
            	<td><?php echo $row['email']?></td>
            	<td><?php echo $row['gender']?></td>
            	<td><?php echo $row['hobby']?></td>
            	<td><?php echo $row['city']?></td>
            	<td><?php echo $row['image']; ?></td>
            	<td><img src="<?php echo 'upload/' . $row["image"]; ?>" width="100" height="100" /></td>
            	<td><a href="delete.php?delid=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">delete</a>
            	<a href="update.php?upid=<?php echo $row['id']; ?>">update</a></td>
            </tr>
            <?php  }  
            ?>
		</table>
	</center>
</body>
</html>