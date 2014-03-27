<?php

/*Vue du formulaire de connexion */
$i = 2;
echo"
<div id='connexion'>
<form method='POST' action='index.php?uc=administrer&action=verifconnexion'>
   <fieldset>
     <legend>connexion</legend>
	   <p>
       <label for='nom'>Nom *</label>
       <input id='nom' type='text' name='nom' value='$nom' size='30' maxlength='45'>
       </p>
       <p>
       <label for='mdp '>Mdp *</label>
       <input id='mdp' type='password' name='mdp' value='$mdp' size='30' maxlength='45'>
       </p>
        <p>
         <input type='submit' value='Valider' name='valider'>
          
      </p>
</form>
</div>
";
?>