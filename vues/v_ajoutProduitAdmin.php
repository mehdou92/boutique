<?php

/*Vue du formulaire d'ajout de produit */

echo"
<div id='ajoutProduitAdmin'>
<form enctype='multipart/form-data' method='POST' action='index.php?uc=administrer&action=ajoutProduitAdmin&idCategorie=$idCategorie'>
   <fieldset>
     <legend>Ajout de produit</legend>
      
	     <p>
       <label for='description'>description </label>
       <input id='description' type='text' name='description' value='$description' size='30' maxlength='45'>
       </p>

       <p>           
      <input type='hidden' id='image' name='MAX_FILE_SIZE' value='10000000'/>        
        <label for='image'>Rechercher image </label> <input type='file' id='image' name='mon_fichier' size='50'/>                  
       </p>

       <p>
       <label for='prix'>Prix </label>
       <input id='prix' type='text' name='prix' value='$prix' size='30' maxlength='45'>
       </p>     

        <p>
         <input type='submit' value='Valider' name='valider'>
          
      </p>
</form>
</div>
";
?>