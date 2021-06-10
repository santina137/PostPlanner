<?php
include(__DIR__."./header.php");
?>

<div class="accountContainer">


<form method="POST">
<fieldset class="accountForm">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <label for="lastname">Nom :</label>
    <input type="text" id="lastname" name="lastname" required>
    <label for="firstname">Prénom :</label>
    <input type="text" id="firstname" name="firstname" required>
    </fieldset>
    <fieldset class="accountStatus">
    <p>Statut :</p>
    <input type="radio" id="administrateur" name="status" value="1"required>
    <label for="administrateur">Administrateur</label>
    <input type="radio" id="lecteur" name="status" value="2"required>
    <label for="lecteur">Lecteur</label>
    </fieldset>

<button class="createAccountButton" type="submit" name="validCreateAccount">Créer un compte</button>
</form>
</div>


<?php
include(__DIR__."./footer.php");