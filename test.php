

<html>
<head>
<Title>Login Page</Title>
</head>
<body>
<form action="" method="post">
Username:<input type="text" name="username" required/>
<br/>
password:<input type="password" name="password" required/>
</br>
<input type="submit" value="LOGIN" name="submit"/>
<br/>
<a href="Users.php">New User</a>
<a href="">forgot password</a>
</form>
</body>
</html>

<?php

if(isset($_POST["submit"])){
	
	$name=$_POST["username"];
	$pass=$_POST["password"];
	$user='root';
	$password='';
	$db='testdb';
	$conn  = mysqli_connect('localhost',$user,$password,$db);
	$login="select NAME,PASSWORD from user where NAME='$name'";
	$result=mysqli_query($conn,$login);
	if(!$result)
	{
		die("Query Failed: ". mysql_error());
	}
	else
	{
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($row["PASSWORD"]==$pass){
		
		header('Location: /tutorial/Users.php');
		
	}
	else{
		echo "validation failed";
	}
		
}
}
?>