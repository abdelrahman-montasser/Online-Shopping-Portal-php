<?php
	//start PHP session
	session_start();
	
	//check if register form is submitted
	if(isset($_POST['register'])){
		//assign variables to post values
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		$username = $_POST['username'];
 
		//check if password matches confirm password
		if($password != $confirm){
			//return the values to the user
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			$_SESSION['confirm'] = $confirm;
			$_SESSION['username']= $username;
 
			//display error
			$_SESSION['error'] = 'Passwords did not match';
		}
		else{
			//include our database connection
			include 'functions.php';
			$pdo = get_connection();
 
			//check if the email is already taken
			$stmt = $pdo->prepare('SELECT * FROM admin WHERE email = :email');
			$stmt->execute(['email' => $email]);
 
			if($stmt->rowCount() > 0){
				//return the values to the user
				$_SESSION['username']= $username;
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$_SESSION['confirm'] = $confirm;
 
				//display error
				$_SESSION['error'] = 'Email already taken';
			}
			else{
				//encrypt password using password_hash()
				$password = password_hash($password, PASSWORD_DEFAULT);
 
				//insert new user to our database
				$stmt = $pdo->prepare('INSERT INTO admin (email, password,username) VALUES (:email, :password,:username)');
 
				try{
					$stmt->execute(['email' => $email, 'password' => $password,'username'=>$username]);
 
					$_SESSION['success'] = 'User verified. You can <a href="index.php">login</a> now';
				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
				}
 
			}
 
		}
 
	}
	else{
		$_SESSION['error'] = 'Fill up registration form first';
	}
 
	header('location: register_form.php');
?>