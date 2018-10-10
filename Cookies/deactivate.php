<?php
session_start();

$display="";
if(isset($_SESSION['user']))
{   
    $userName=$_SESSION['user'];

    if($_SESSION['DeactivateTime'] > time())
    {
        

            $currentSessiomID=session_id();
            $IDinSession=$_SESSION['sessionId'];
            $token=$_SESSION['token'];

            if($_POST['token'])
            {

                    //check for token
                    //remove user
                    //

                    $recivedToken=$_POST['token'];
                    if($recivedToken==$token)
                    {
                        
                        $display="Your Account Reoved Succesfully! ProfileUser :{$userName}";
                        RemoveUserFromDB();
                        session_destroy();



                    }else
                    {

                              $display="No Permission for this Action!";

                    }


            }else
            {

                $display="No token Recived!";

            }



    }else
    {
        session_destroy();

       

    }




}else
{

  $display="You are not logged in";


}




function RemoveUserFromDB()
{

$file = fopen("DATABASE/userTable.txt", "w") or die("Unable connect to DATABASE!");
$txt = "userName:removed#password:removed#END\n";
fwrite($file, $txt);
fclose($file);


}

function WriteToDB($userName="user1",$password="password1")
{

$file = fopen("DATABASE/userTable.txt", "w") or die("Unable connect to DATABASE!");
$txt = "userName:{$userName}#password:{$password}#END\n";
fwrite($file, $txt);
fclose($file);


}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Remove Your Account</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
    
  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
         </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading"></h1>
        <p class="lead"><?php echo $display?></p>
        <p class="lead">
        <a class="btn btn-light" href="login.php" class="btn btn-lg btn-secondary" >     ---Log in---     </a>
        </p>
      </main>
    
     

      <footer class="mastfoot mt-auto">
        <div class="inner">
        </div>
      </footer>
    </div>



   

  </body>
</html>



