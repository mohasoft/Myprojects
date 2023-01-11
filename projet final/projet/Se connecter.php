<?php 

echo '
<html>
<head>
<title>Se connecter</title>
<link rel="stylesheet"  href="style.css">
</head>
<body>
<div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Se connecter</b></div>
				
            <div style = "margin:30px">
               
               <form action = "loggg.php" method = "post" >
                  <label>Email  :</label><input type = "text" name = "email" class = "box"/><br /><br />
                  <label>mot de passe  :</label><input type = "password" name = "motdepasse" class = "box" /><br/><br />
                  <input type = "submit" value = "Connecter"/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>


        

</body>
</html>';
?>