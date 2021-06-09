<?php
include(__DIR__."./header.php");

$hashtags=$this->hashtagsList;
?>

<div class="hashtagsContainer">
<table class="hashtagsTable">
<thead>
    <tr>
        <th scope="col">Hashtag</th>
    </tr>
</thead>
<tbody>
<?php foreach($hashtags as $hashtag):?>
    
        <?php if (isset($_POST["edit"]) && ($_POST["id"] === $hashtag['hashtag_id'])):?>
        <tr>
        <form method="POST">
        <td><input type=text name="name1" value=<?=$hashtag['hashtag_name']?>></td>
        <td><button class="button-icon" type=submit name="editHashtag"><img src="src/public/images/fi-cwluxl-check.svg"></button>
        <input type="hidden" name="id" value="<?=$hashtag['hashtag_id']?>">
        </form>
        </tr>
    <?php else:?>
        <tr>
        <td><?=$hashtag['hashtag_name']?></td>
        <form method="POST">
        <td><button class="button-icon" type="submit" name="edit"><img src="src/public/images/fi-cwluxl-pen.svg"></button></td>
        <input type="hidden" name="id" value="<?=$hashtag['hashtag_id']?>">
        </form>
        <td>
        <form method="POST">    
        <button class="button-icon" type=submit name="delete"><img src="src/public/images/fi-cwluxl-times-wide.svg"></button>
        <input type="hidden" name="id" value="<?=$hashtag['hashtag_id']?>">
        </form>
        </td>
        </tr>
        <?php endif;?> 
    
<?php endforeach;?>
<?php if (isset($_POST['add'])):?>
    <tr>
        <form method="POST">
        <td><input type="text" name="name" value="#"></td>
        <td><button class="button-icon" type=submit name="addHashtag"><img src="src/public/images/fi-cwluxl-check.svg"></button> 
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