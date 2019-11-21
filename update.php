<?php
    include('connection.php');
    
         $id = $_GET['upid'];
         $que = "SELECT * FROM `task` WHERE `id`='$id'";
         $record=mysqli_query($conn,$que);
         $row=mysqli_fetch_array($record);  
            // $id = $row['$id'];
            $name = $row['name'];
            $email = $row['email'];
            $gender = $row['gender'];
            $hobby = $row['hobby'];
            $city = $row['city'];
     if(isset($_POST['submit'])){

     	extract($_POST);
    	 $hobby=implode (',', $_POST['hobby']);
    	 $sql = "UPDATE `task` SET `name`='$name',`email`='$email',`gender`='$gender',`hobby`='$hobby',`city`='$city' WHERE `id`='$id'";

         mysqli_query($conn, $sql);
         header("location:display.php");
     }
    

?> 



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <center>
    	<h1>Registration</h1>
    	<form method="POST" action="update.php" enctype="multipart/form-data">
    	<table border="2" height="500" width="500" bgcolor="skyblue">
    		<tr>
    			<td><input type="hidden" name="id" value="<?php echo $id;?>"></td>
    		</tr>
    		<tr>
    			<td>name</td>
    			<td><input type="text" name="name" value="<?php echo $name;?>"></td>
    		</tr>
    		<tr>
    			<td>email</td>
    			<td><input type="text" name="email" value="<?php echo $email;?>"></td>
    		</tr>
    		<tr>
    			<td>gender</td>
<td><input type="radio" name="gender"  value="male"<?php if ($gender=="male") { echo "checked";} ?>>male
 <input type="radio" name="gender" value="female" <?php if ($gender=="female") { echo "checked";} ?>>female</td>
    		</tr>
    		<tr>
    	        <td>hobby</td>
    	        <?php
                $hobby = $row['hobby'];
		        $hob = explode(',', $hobby);
		       
		        ?>
    	        <td><input type="checkbox" name="hobby[]" value="singing" <?php if (in_array('singing',$hob) ) { echo "checked";} ?>>singing
    	        	<input type="checkbox" name="hobby[]" value="dancing" <?php if (in_array('dancing',$hob) ) { echo "checked";} ?> >dancing
    	        	<input type="checkbox" name="hobby[]" value="playing" <?php if (in_array('playing',$hob) ){ echo "checked";} ?>>playing
    	        	<input type="checkbox" name="hobby[]" value="flying" <?php if (in_array('flying',$hob) ){ echo "checked";} ?>>flying
    	        	<input type="checkbox" name="hobby[]" value="cooking" <?php if (in_array('cooking',$hob) ){ echo "checked";} ?>>cooking</td>
    		</tr>
    		<tr>
    			<td>city</td>
    			<td><select value="city">
    				<option value="rajkot" <?php if ($city=="rajkot") { echo "selected";} ?> >rajkot</option>
    				<option value="surat" <?php if ($city=="surat") { echo "selected";} ?> >surat</option>
    				<option value="dhoraji" <?php if ($city=="dhoraji") { echo "selected";} ?>>dhoraji</option>
    				<option value="baroda" <?php if ($city=="baroda") { echo "selected";} ?> >baroda</option>
    				<option value="mumbai" <?php if ($city=="mumbai") { echo "selected";} ?> >mumbai</option>
    			</select></td>
    		</tr>
    		<tr>
    			<td><a href="index.php"><input type="submit" name="submit" value="submit"></a></td>
    		</tr>
    		
    	</table>
    	</form>
    </center>
</body>
</html>