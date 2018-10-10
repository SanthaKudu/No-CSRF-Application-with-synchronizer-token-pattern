
<?php
session_cache_limiter('private_no_expire');
Session_set_cookie_params(300);
session_start();


//lets Assume This is a Dummy data Base!(It has 2 record)//

$output="";


$file = fopen("DATABASE/userTable.txt", "r") or die("Unable connect to DATABASE!");
$string= fread($file,filesize("DATABASE/userTable.txt"));
fclose($file);
$records=explode("#",$string);
$recordCount=count($records);

if($recordCount==3)
{

    $userNameARR = preg_split("/:/", $records[0]);
    $passwordARR = preg_split("/:/", $records[1]);
    
    
    
    $userNameDB=$userNameARR[1];
    $passwordDB=$passwordARR[1];
    


}else
{
    exit;

}






 //Simple Check for Valid user

if(isset($_POST["submit"]))
{

$userName=$_POST["userName"];
$password=$_POST["password"];
$output="";




	if($userNameDB==$userName && $passwordDB == $password)
	{
	
		Redirect($userName);
    		
						

			


	}else
							{

    								$output="Sorry Your Not a Valid User!";

										}



}
if(isset($_SESSION['user']))
{


	
	header('Location: https://localhost/COOKIES/account.php');
	exit;







}



function Redirect($userName)
{



	setcookie("sessionID",session_id(),time()+$minutes*60,'/','localhost',true);
	
	$minutes=1;

	$time=time();
	
	$_SESSION['user']=$userName;
	$_SESSION['ActivetedTime']=$time;
	$_SESSION['DeactivateTime']=$_SESSION['ActivetedTime']+(60+$minutes);
	

	$_SESSION['token']=bin2hex(random_bytes(32));
	$_SESSION['sessionId']=session_id();

	header('Location: https://localhost/COOKIES/account.php');
	exit;

}












?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V10</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" action="login.php" method="post">
					<span class="login100-form-title p-b-51">
						Login
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="userName" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
						

						
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<?php 
	
	
	if($output=="")
	{
		
		echo "<span class=\"login100-form-title p-b-51\" id=\"customLog\">COOKIE EXAPLE! </span>";
	
	}else
	{

		echo "<span class=\"login100-form-title p-b-51\" id=\"customLog\">{$output}</span>";
		echo $output;


	}
	
	
	
	
	?>


	
	


	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>