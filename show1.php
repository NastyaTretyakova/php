<html>
   <head>   
      <script type = "text/javascript">
         <!--
            function getConfirmation() {
               var retVal = confirm("Вы хотите удалить директорию?");
               if( retVal == true ) {
                  document.write ("User wants to continue!");
				  a.href = "deldir.php";
                  return true;
               } else {
                  document.write ("User does not want to continue!");
                  return false;
               }
            }
         //-->
      </script>     
   </head>
   
   <body>
      <p>Click the following button to see the result: </p>      
      <form>
         <input type = "button" value = "Click Me" onclick = "getConfirmation();" />
      </form>      
   </body>
</html>