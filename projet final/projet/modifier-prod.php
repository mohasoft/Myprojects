<?php

echo '

<html>
<head></head>

<title>Modification du produit</title>
<link rel="stylesheet"  href="style.css">
<body>

<fieldset >
<legend><h1>Modification du produit :</h1></legend>

	   

Quantite :<form action="modifier-qte.php"  method="post">
  <input type="hidden" name="id_prod" value="'.$_POST['id_prod'].'"/>
  <input type = "text" name = "qte" value = ""/> 
          <input class="btn default" type="submit" value="Modifier" />
       </form>

	   
Prix :<form action="modifier-prix.php"  method="post">
  <input type="hidden" name="id_prod" value="'.$_POST['id_prod'].'"/>
  <input type = "text" name = "prix" value = ""/>
          <input class="btn default" type="submit" value="Modifier" />
       </form>
	   
	   
	     
	   
	   
	  
</fieldset >
</body>

</html>
';

?>