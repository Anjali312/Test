<?php

    include('connection.php');
    if(isset($_POST['submit'])){

       
    	 extract($_POST);
    	 $hobby=implode (',', $_POST['hobby']);
    	 //$image=$_POST['image'];
         $target = "upload/"; 
         $target = $target . basename( $_FILES['image']['name']); 

//This gets all the other information from the form 
         $image = ($_FILES['image']['name']); 
         if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) { 
        //Tells you if its all ok 
         echo "The file ". basename( $_FILES['image']['name']). " has been uploaded, and your information has been added to the directory"; 
         } else { 
    //Gives an error if its not 
         echo "Sorry, there was a problem uploading your file.";
       }


    	 $sql="INSERT INTO `task`(`name`, `email`, `gender`, `hobby`, `city`,`image`) VALUES ('$name','$email','$gender','$hobby','$city','$image')";
    	 $run = mysqli_query($conn,$sql);
    	 if($run){
    	 	echo "data inserted";
    	 	header("location:display.php");
    	 }else{
    	 	echo "data not inserted";
    	 }
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
    	<form method="POST" action="#" enctype="multipart/form-data">
    	<table border="2" height="500" width="500" bgcolor="skyblue">
    		<tr>
    			<td>name</td>
    			<td><input type="text" name="name" ></td>
    		</tr>
    		<tr>
    			<td>email</td>
    			<td><input type="text" name="email"></td>
    		</tr>
    		<tr>
    			<td>gender</td>
    			<td><input type="radio" name="gender" value="male">male
    				<input type="radio" name="gender" value="female">female</td>
    		</tr>
    		<tr>
    	        <td>hobby</td>
    	        <td><input type="checkbox" name="hobby[]" value="singing">singing
    	        	<input type="checkbox" name="hobby[]" value="dancing">dancing
    	        	<input type="checkbox" name="hobby[]" value="playing">playing
    	        	<input type="checkbox" name="hobby[]" value="flying">flying
    	        	<input type="checkbox" name="hobby[]" value="cooking">cooking</td>
    		</tr>
    		<tr>
    			<td>city</td>
    			<td><select name="city">
    				<option value="rajkot">rajkot</option>
    				<option value="surat">surat</option>
    				<option value="dhoraji">dhoraji</option>
    				<option value="baroda">baroda</option>
    				<option value="mumbai">mumbai</option>
    			</select></td>
    		</tr>
    		<tr>
    			<td><input type="file" name="image" /></td>
    		</tr>
    		<tr>
    			<td><input type="submit" name="submit"></td>
    		</tr>
    		
    	</table>
    	</form>
    </center>
</body>
</html>