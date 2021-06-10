<?php
include(__DIR__."./header.php");


$status=$this->status;

?>

<div class="accountContainer">

<?php if (isset($_POST['editAccount'])):?>
<form method="POST">
<fieldset class="accountForm">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?=$connectedUser['user_email']?>" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" value="<?=$connectedUser['user_password']?>"required>
    <label for="lastname">Nom :</label>
    <input type="text" id="lastname" name="lastname" value="<?=$connectedUser['user_lastname']?>"required>
    <label for="firstname">Prénom :</label>
    <input type="text" id="firstname" name="firstname" value="<?=$connectedUser['user_firstname']?>"required>
    <label for="status">Statut :</label>
    <input type="text" id="status" name="status" value="<?=$status?>" disabled>
    </fieldset>
   <input type="hidden" name="id" value="<?=$connectedUser['user_id']?>">
   <button class="validButton" type="submit" name="validAccount">Valider</button>
</form>

<?php else:?>
<form method="POST">
<fieldset class="accountForm" disabled>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?=$connectedUser['user_email']?>">
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" value="<?=$connectedUser['user_password']?>">
    <label for="lastname">Nom :</label>
    <input type="text" id="lastname" name="lastname" value="<?=$connectedUser['user_lastname']?>">
    <label for="firstname">Prénom :</label>
    <input type="text" id="firstname" name="firstname" value="<?=$connectedUser['user_firstname']?>">
    <label for="status">Statut :</label>
    <input type="text" id="status" name="status" value="<?=$status;?>">
</fieldset>
<button class="editButton" type="submit" name="editAccount">Modifier</button>
</form>

<?php endif;?>
</div>


<?php
include(__DIR__."./footer.php");