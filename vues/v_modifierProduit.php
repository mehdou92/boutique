<?php

/*Vue du formulaire de modification du produit */
/* recupération de l'id produit dans la barre form action = */ 
  $idProduit = $produit->getId();
  $description = $produit->getDescription();
  $image = $produit->getImage();
  $prix = $produit->getPrix();
echo"
<div id='modifierProduit'>
<form method='POST' action='index.php?uc=administrer&action=verifModifierProduit&idCategorie=$idCategorie&idProduit=$idProduit'> 
   <fieldset>
     <legend>Modifier de Produit</legend>
      
	     <p>
       <label for='description'>description *</label>
       <input id='description' type='text' name='description' value='$description' size='30' maxlength='45'>
       </p>

       <p>
       <label for=''>image*</label>
       <input id='image' type='text' name='image' value='$image' size='30' maxlength='45'>
       </p>

       <p>
       <label for='prix '>Prix *</label>
       <input id='prix' type='text' name='prix' value='$prix' size='30' maxlength='45'>
       </p>
       


        <p>
         <input type='submit' value='Valider' name='valider'>
          
      </p>
</form>
</div>
";
?>