<?php
include(__DIR__."./header.php");

$socialNetworks=$this->socialNetworksList;
?>

<div class="socialNetworksContainer">
<table class=socialNetworksTable>
<thead>
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Icône</th>
    </tr>
</thead>
<tbody>
<?php foreach($socialNetworks as $socialNetwork):?>
    
        <?php if (isset($_POST["edit"]) && ($_POST["id"] === $socialNetwork['social_network_id'])):?>
        <tr>
        <form method="POST">
        <td><input type=text name="name1" value=<?=$socialNetwork['social_network_name']?>></td>
        <td><input type=url name="icon1" value=<?=$socialNetwork['social_network_icon']?>></td>
        <td><button class="button-icon" type=submit name="editSocialMedia"><img src="src/public/images/fi-cwluxl-check.svg"></button>
        <input type="hidden" name="id" value="<?=$socialNetwork['social_network_id']?>">
        </form>
        </tr>
    <?php else:?>
        <tr>
        <td><?=$socialNetwork['social_network_name']?></td>
        <td><img class="social-icon" src="<?=$socialNetwork['social_network_icon']?>"></td>
        <form method="POST">
        <td><button class="button-icon" type="submit" name="edit"><img src="src/public/images/fi-cwluxl-pen.svg"></button></td>
        <input type="hidden" name="id" value="<?=$socialNetwork['social_network_id']?>">
        </form>
        <td>
        <form method="POST">    
        <button class="button-icon" type=submit name="delete"><img src="src/public/images/fi-cwluxl-times-wide.svg"></button>
        <input type="hidden" name="id" value="<?=$socialNetwork['social_network_id']?>">
        </form>
        </td>
        </tr>
        <?php endif;?> 
    
<?php endforeach;?>
<?php if (isset($_POST['add'])):?>
    <tr>
        <form method="POST">
        <td><input type="text" name="name"></td>
        <td><input type="url" name="icon"></td>
        <td><button class="button-icon" type=submit name="addSocialMedia"><img src="src/public/images/fi-cwluxl-check.svg"></button> 
        </form>  
        </td> 
    </tr>
    <?php endif;?>
    <tr>
        <td>
        <form method="POST">
        <button class="button-icon" type="submit" name="add"><img src="src/public/images/fi-cwluxl-plus-wide.svg"></button>
        </form>
        </td>
    </tr>
</tbody>
</table>
</div>



<?php

include(__DIR__."./footer.php");