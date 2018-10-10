<?php



setcookie("TestCookie", "===SEX===");



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>













<body>
<script>                       

function getcookie(name)
{
   
    var results= (document.cookie).split('; ');
    //var a = results.indexOf("cookiename");
    for(var i=0;i < results.length;i++) 
    {
        var item= results[i];
        var cname=item.split('=')[0];
        var value=item.split('=')[1];

     if(cname===name)
     {
            console.log(value);
            break;
      }
               



    }
   
    //'part1/part2'.split('/')[0]



            
    

}

getcookie('TestCookie');
//console.log(getcookie());





</script>
    </body>

</html>