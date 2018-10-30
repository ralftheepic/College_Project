<?php
include("dbConnection.php");
?>

<html>
<head>
<Title>New User</Title>
</head>
<body>
<form action="" method="GET">
Name:<input type="text" name="newUser" required/>
</br>
Password:<input type="password" name="newPassword" required/>
</br>
ReType Password:<input type="password" name="reType" required/>
</br>
emailID:<input type="email" name="email" required/>
</br>
contact no:<input type="number" name="no" required/>
</br>
<input type="submit" name="btn1" value="submit"/>
</form>
</body>
</html>

<?php

if(isset($_GET["btn1"])){
	
	$name=$_GET['newUser'];
	$pass=$_GET['newPassword'];
	$cpass=$_GET['reType'];
	$email=$_GET['email'];
	$cont=$_GET['no'];
	echo $name."".$pass." ".$cpass."".$email."".$cont;
	$emailquery="select email from user where email='$email'";
	$result=mysqli_query($conn,$emailquery);
	if(mysqli_num_rows($result)>0){
		
		$msg="Email already exists";
		echo $msg;
	}
	else if($pass!=$cpass){
		
		echo "Password doesn't match";
	}else{
		
		$query="insert into user (NAME,PASSWORD,EMAIL,CONTNO) values ('$name','$pass','$email','$cont')";
		$result=mysqli_query($conn,$query);
		if($result){
			$msg="Data inserted successfull";
		}else{
			echo "Data not inserted";
		}
	}	
}

?>
