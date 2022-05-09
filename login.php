<?php
session_start();

if (isset($_POST['submit'])){
    
    $_SESSION['loginEmail']=$_POST['loginEmail'];
    $_SESSION['loginPassword']=$_POST['loginPassword'];
    $adminEmail_correct=true;
    $adminPass_correct=true;

    foreach ($_SESSION['array'] as $key => $value) {
        //Check Email
        if($key == 'Email'){
            if($_SESSION['loginEmail']==($value||'admin@gmail.com')){
                $loginEmail_result="<span style=' color:green'>Correct Email</span><br>";
                $loginEmail_correct=true;
            }else{
                $loginEmail_result="<span style=' color:red'>Incorrect Email</span><br>";
                $loginEmail_correct=false;
            }
        }
        //Check Password
        if($key == 'Password Confirmation'){
            if($_SESSION['loginPassword']==$value){
                $loginPassword_result="<span style=' color:green'>Correct Password</span><br>";
                $loginPassword_correct=true;
            }else{
                $loginPassword_result="<span style=' color:red'>Incorrect Password</span><br>";
                $loginPassword_correct=false;
            }
        }
    }
    if($loginEmail_correct && $loginPassword_correct)
	{
        header('location:welcome.php');
		$_SESSION["arr"][$key]["Last-Login-Date"]= date("d-m-Y - h:i:sa");
        $_SESSION["arr"];
	}	
    else
    echo '<script language="javascript">';
    echo 'alert("Incorrect Information")'; 
    echo '</script>';
     
    // cHeck Admin information 
    if($_SESSION['loginEmail']=="admin"){
		if($_SESSION['loginPassword']== "admin"){
            $loginEmail_result="<span style=' color:green'>Correct Email</span><br>";
			$adminEmail_correct=true;
			$adminPass_correct=true;
	
		}else{
			$loginPassword_result="<span style=' color:red'>Incorrect Password</span><br>";
	    	$adminPass_correct=false;
		}
	}else{
		$loginEmail_result="<span style=' color:red'>Incorrect Email</span><br>";
		$adminEmail_correct=false;
	}
	if ($adminEmail_correct && $adminPass_correct ){
		header('location:admin.php');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<!-- <div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div> -->
			</div>
			<div class="card-body">
				<form method="post">
                <?php if(isset($loginEmail_result)){echo $loginEmail_result;}?>

					<div class="input-group form-group">
						<div class="input-group-prepend">
                        
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="loginEmail" class="form-control" placeholder="E-mail" required>
						
					</div>
                    <?php if(isset($loginPassword_result)){echo $loginPassword_result;}?>

					<div class="input-group form-group">
						<div class="input-group-prepend">

							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="loginPassword" class="form-control" placeholder="password" required>
					</div>
                    <br>
					<div class="form-group  ">
                    <!-- <input type="submit" class="btn btn-warning btn-lg ms-2" name="submit" value="submit"> -->
						<input type="submit" value="Login" name="submit" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="Register.php">Sign Up</a>
				</div>
				<!-- <div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div> -->
			</div>
		</div>
	</div>
</div>
</body>
</html>