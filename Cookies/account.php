<?php
session_start();
$output="";

if(isset($_SESSION['user']))
{   
    $userName=$_SESSION['user'];

    if($_SESSION['DeactivateTime'] > time())
    {
      $output="<h1 class=\"cover-heading\"><p class=\"lead\">"."This is {$userName} Account.</p>
      <p class=\"lead\"></p></main>
      <form action=\"deactivate.php\"   id=\"frm\" method=\"post\">
       
      <input type=\"hidden\" name=\"token\" value=\"\" id=\"hidden\">
      <button   class=\"btn btn-light\" type=\"submit\" form=\"frm\" value=\"Submit\" id=\"dbutton\">Deavtivate Account</button>
      </form></h1><footer class=\"mastfoot mt-auto\"><div class=\"inner\"></div></footer></div><script src=\"js/scriptJS.js\"></script>";




      



  
/*class=\"btn btn-light\" *//*action=\"deactivate.php\"    */ 
    }else
    {
        session_destroy();
       
        $output="<p class=\"lead\">"."Seesion Expired.</p><p class=\"lead\"><a class=\"btn btn-light\" href=\"login.php\" class=\"login100-form-btn\" >log in</a></p></main><footer class=\"mastfoot mt-auto\"><div class=\"inner\"></div></footer></div>";
  



       // <button class=\"login100-form-btn\" >
       //Deavtivate Account
       //</button>

    }




}else
{

    session_destroy();
    $output="<p class=\"lead\">You are not logged in.</p><p class=\"lead\"><a class=\"btn btn-light\" href=\"login.php\" class=\"login100-form-btn\" >log in</a></p></main><footer class=\"mastfoot mt-auto\"><div class=\"inner\"></div></footer></div>";


}





?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <title>Your Account</title>

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
        <?php echo $output;?>
   
      
			
     

    

  </body>
</html>



