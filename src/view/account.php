<?php
include(__DIR__."./header.php");


$status=$this->status;

?>

<div class="accountContainer">

<?php if (isset($_POST['editAccount'])):?>
<form method="POST">
<fieldset class="accountForm">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?=$connectedUser->getEmail()?>" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" value="<?=$connectedUser->getPassword()?>"required>
    <label for="lastname">Nom :</label>
    <input type="text" id="lastname" name="lastname" value="<?=$connectedUser->getLastname()?>"required>
    <label for="firstname">Prénom :</label>
    <input type="text" id="firstname" name="firstname" value="<?=$connectedUser->getFirstname()?>"required>
    <label for="status">Statut :</label>
    <input type="text" id="status" name="status" value="<?=$status?>" disabled>
    </fieldset>
   <input type="hidden" name="id" value="<?=$connectedUser->getId()?>">
   <button class="validButton" type="submit" name="validAccount">Valider</button>
</form>

<?php else:?>
<form method="POST">
<fieldset class="accountForm" disabled>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?=$connectedUser->getEmail()?>">
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" value="<?=$connectedUser->getPassword()?>">
    <label for="lastname">Nom :</label>
    <input type="text" id="lastname" name="lastname" value="<?=$connectedUser->getLastname()?>">
    <label for="firstname">Prénom :</label>
    <input type="text" id="firstname" name="firstname" value="<?=$connectedUser->getFirstname()?>">
    <label for="status">Statut :</label>
    <input type="text" id="status" name="status" value="<?=$status;?>">
</fieldset>
<button class="editButton" type="submit" name="editAccount">Modifier</button>
</form>

<?php endif;?>
</div>


<?php
include(__DIR__."./footer.php");