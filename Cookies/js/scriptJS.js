
/*document.getElementById('dbutton').addEventListener('click',TokenSetter);*/

function TokenSetter()
{
   console.log("Test");
    var xhr=new XMLHttpRequest();
    xhr.open('GET','gettoken.php',true);
    xhr.onload=function()
    {
            if(this.status==200)
            {
               document.getElementById("hidden").setAttribute('value',this.responseText);

                
            }   

    }

    xhr.send();


//.addEventListener('click',TokenSetter)


}

TokenSetter();





